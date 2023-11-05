<?php
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['admin'])) {
  header("Location: ../inc/admin.php");
  exit();
}

?>
<?php
require 'connection.php';

$query = "SELECT COUNT(*) AS total FROM produits";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<?php
require 'info-dashboard.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <section class="page-global">
        <aside>
            <nav class="sidebar">
                <header>
                    <div class="image-text">
                        <span class="image">
                            <img src="ressources/logo.png" alt="">
                        </span>
                        <div class="text logo-text">
                            <span class="name">Joel</span>
                            <span class="profession">Forge Elidor</span>
                        </div>
                    </div>
                </header>
                <div class="menu-bar">
                    <div class="menu">

                        <ul class="menu-links">
                            <li class="nav-link active">
                                <a href="index.php">
                                    <i class='bx bx-home-alt icon'></i>
                                    <span class="text nav-text">Couteau Tableau</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="add-card.php">
                                    <i class='bx bx-knife icon'></i>
                                    <span class="text nav-text">Ajouter Couteau</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="galerie-tab.php">
                                    <i class='bx bx-bar-chart-square icon'></i>
                                    <span class="text nav-text">Photo Tableau</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="galerie-add.php">
                                    <i class='bx bx-photo-album icon'></i>
                                    <span class="text nav-text">Ajouter photo</span>
                                </a>
                            </li>
                            
                            <!-- <li class="nav-link">
                                <a href="#">
                                    <i class='bx bx-heart icon'></i>
                                    <span class="text nav-text">Likes</span>
                                </a>
                            </li>
                            <li class="nav-link">
                                <a href="#">
                                    <i class='bx bx-wallet icon'></i>
                                    <span class="text nav-text">Wallets</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="bottom-content">
                        <li class="">
                            <a href="../inc/logout.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>
                    </div>
                </div>
            </nav>
        </aside>


        <section class="section-container-contenue">
            <section id="info">
            <div class="info">
                    <h2 class="info title-section">Info</h2>
                    <div class="card-info">
                        <div class="card1 card">
                            <div>
                                <h3>Nombre de couteau </h3>
                                <h1><?php echo $totalCouteaux; ?></h1>
                            </div>
                        </div>
                        <div class="card3 card">
                            <div>
                                <h3>Nombre d'image</h3>
                                <h1><?php echo $totalCouteauxphoto; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="tableau">
                <table>
                    <thead>
                        <tr>
                            <th class="sortable-header" onclick="sortTable(0, 'text')">Couteau</th>
                            <th class="sortable-header" onclick="sortTable(1, 'text')">Status</th>
                            <th class="sortable-header" onclick="sortTable(2, 'text')">Type</th>
                            <th>Texte</th>
                            <th class="sortable-header" onclick="sortTable(4, 'numeric')">Price USD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $rows = mysqli_query($conn, "SELECT * FROM produits ORDER BY id DESC");
                        ?>

                        <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td style="width: 250px;">
                                    <div class="couteau-td"><img src="img/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                                        <?php echo $row["name"]; ?></div>
                                </td>
                                <td class="status-td-online"><a href="#" onclick="toggleMode()">Online</a></td>

                                <td><?php echo $row["type"]; ?></td>
                                <td style="max-width: 300px;  word-wrap: break-word;" class="colonne-texte"><?php echo $row["description"]; ?></td>
                                <td style="width: 150px;"><?php echo $row["prix"]; ?>€</td>
                                <td>
                                    <a href="#"><i class='ri-more-fill action-icone' onclick="toggleMenu('<?php echo $row['id']; ?>')"></i></a>
                                    <div id="menutab-<?php echo $row['id']; ?>" class="menu-tab">
                                        <div class="content-menu">
                                            <button class="voir-btn" onclick="voir('<?php echo $row['id']; ?>')">Voir</button>
                                            <button class="edit-btn" onclick="modifier('<?php echo $row['id']; ?>')" data-id="<?php echo $row["id"]; ?>">Modifier</button>
                                            <button class="del-btn" onclick="supprimerCouteau('<?php echo $row['id']; ?>')">Supprimer</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </section>
        </section>
    </section>





    <script src="app.js"></script>
</body>

</html>