<?php
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['admin'])) {
  header("Location: ../inc/admin.php");
  exit();
}

?>
<?php
// modifier_ligne.php

require 'connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Récupérer les informations de la ligne correspondante en utilisant l'ID
    $query = "SELECT * FROM produits WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Pré-remplir le formulaire avec les informations récupérées
    $name = $row["name"];
    $description = $row["description"];
    $prix = $row["prix"];
    $type = $row["type"];
}

if (isset($_POST["submit"])) {
    $id = $_POST["product_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $type = $_POST["type"];

    // Vérifier si une nouvelle image a été téléchargée
    if ($_FILES["image"]["error"] != 4) {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension');</script>";
        } else if ($fileSize > 1000000) {
            echo "<script>alert('Image Size Is Too Large');</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'img/' . $newImageName);

            // Mettre à jour les informations du produit avec la nouvelle image
            $query = "UPDATE produits SET name = '$name', description = '$description', prix = '$prix', type = '$type', image = '$newImageName' WHERE id = '$id'";
            mysqli_query($conn, $query);
        }
    } else {
        // Mettre à jour les informations du produit sans changer l'image
        $query = "UPDATE produits SET name = '$name', description = '$description', prix = '$prix', type = '$type' WHERE id = '$id'";
        mysqli_query($conn, $query);
    }

    echo "<script>alert('Successfully Updated');</script>";
    echo "<script>document.location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <title>Modifier un Produit</title>
</head>

<body>

<section class="page-global">
    <aside>
      <nav class="sidebar">
        <header>
          <div class="image-text">
            <span class="image">
              <img src="ressources/logo.png" alt="" />
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
              <li class="nav-link">
                <a href="index.php">
                  <i class="bx bx-home-alt icon"></i>
                  <span class="text nav-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-link active">
                <a href="add-card.php">
                  <i class="bx bx-bar-chart-alt-2 icon"></i>
                  <span class="text nav-text">Couteau en stock</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class="bx bx-photo-album icon"></i>
                  <span class="text nav-text">Galerie Photo</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class="bx bx-pie-chart-alt icon"></i>
                  <span class="text nav-text">Analytics</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class="bx bx-heart icon"></i>
                  <span class="text nav-text">Likes</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class="bx bx-wallet icon"></i>
                  <span class="text nav-text">Wallets</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="bottom-content">
            <li class="">
              <a href="../inc/logout.php">
                <i class="bx bx-log-out icon"></i>
                <span class="text nav-text">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </nav>
    </aside>
  <section class="contenu-form-add" style="margin-top: 100px;">
    <h2 class="title-section">Modifier un Produit</h2>
    <form action="modifier_ligne.php" method="POST" enctype="multipart/form-data">
        <div class="formcol1">
            <div class="div-input-label">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="name" placeholder="Nom du Couteau" value="<?php echo $name; ?>" required />
            </div>
            <div class="div-input-label">
                <label for="type">Type :</label>
                <select id="type" name="type" required>
                    <option value="cuisine" <?php if ($type == "cuisine") echo "selected"; ?>>Cuisine</option>
                    <option value="chasse" <?php if ($type == "chasse") echo "selected"; ?>>Chasse</option>
                    <option value="poche" <?php if ($type == "poche") echo "selected"; ?>>Poche</option>
                    <option value="survie" <?php if ($type == "survie") echo "selected"; ?>>Survie</option>
                </select>
            </div>
            <div class="div-input-label">
                <label for="description">Description :</label>
                <textarea id="description" name="description" rows="4" cols="50" placeholder="Information Couteau" required><?php echo $description; ?></textarea>
            </div>
        </div>
        <div class="formcol2">
            <div class="div-input-label">
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" placeholder="Prix du Couteau" value="<?php echo $prix; ?>" required />
            </div>
            <div class="upload">
                <div class="upload-btn">
                    <i class="bx bx-cloud-upload"></i>
                    <p>Parcourir les fichiers</p>
                    <input name="image" type="file" id="file-upload" accept=".jpg, .jpeg, .png" onchange="handleImageUpload(event)" />
                </div>
                <p id="file-name"><i class="bx bxs-file-image img"></i><span id="nom-file-name">Pas de fichier sélectionné</span> <i id="delete-btn" onclick="deleteImage()" class="bx bxs-trash-alt trash"></i></p>
            </div>
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Modifier le couteau" class="input-submit-forms" />
        </div>
    </form>
</section>
</section>

<script>
    function handleImageUpload(event) {
      const file = event.target.files[0];
      const fileName = file.name;
      const fileReader = new FileReader();

      fileReader.onload = function(e) {
        const imageSrc = e.target.result;
        const uploadBtn = document.querySelector(".upload-btn");
        const fileNameElem = document.querySelector("#nom-file-name");
        const deleteBtn = document.querySelector("#delete-btn");
        const iconElem = document.querySelector(".upload-btn i");
        const paragraphe = document.querySelector(".upload-btn p");

        uploadBtn.style.backgroundImage = `url(${imageSrc})`;
        fileNameElem.textContent = fileName;
        deleteBtn.style.display = "block";
        iconElem.style.display = "none";
        paragraphe.style.display = "none";
      };

      fileReader.readAsDataURL(file);
    }

    function deleteImage() {
      const uploadBtn = document.querySelector(".upload-btn");
      const fileNameElem = document.querySelector("#nom-file-name");
      const deleteBtn = document.querySelector("#delete-btn");
      const fileInput = document.querySelector("#file-upload");
      const iconElem = document.querySelector(".upload-btn i");
      const paragraphe = document.querySelector(".upload-btn p");

      // Réinitialiser l'état du bouton d'upload
      uploadBtn.style.backgroundImage = "";
      fileNameElem.textContent = "Pas de fichier sélectionné";
      fileInput.value = "";
      iconElem.style.display = "block"; // Afficher à nouveau l'icône
      paragraphe.style.display = "block"; // Afficher à nouveau l'icône
    }
  </script>
</body>

</html>
