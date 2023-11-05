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
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $prix = $_POST["prix"];
  $type = $_POST["type"];

  if ($_FILES["image"]["error"] == 4) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    } else if ($fileSize > 1000000) {
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO produits (name, description, prix, type, image) VALUES ('$name', '$description', '$prix', '$type', '$newImageName')";

      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'index.php';
      </script>
      ";
    }
  }
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
  <title>Document</title>
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
              <li class="nav-link ">
                <a href="index.php">
                  <i class='bx bx-home-alt icon'></i>
                  <span class="text nav-text">Couteau Tableau</span>
                </a>
              </li>
              <li class="nav-link active">
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
                <i class="bx bx-log-out icon"></i>
                <span class="text nav-text">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </nav>
    </aside>

    <section class="contenu-form-add" style="margin-top: 100px;">
      <h2 class="title-section">Ajouter un Produit</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="formcol1">
          <div class="div-input-label">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="name" placeholder="Nom du Couteau" required />
          </div>
          <div class="div-input-label">
            <label for="type">Type :</label>
            <select id="type" name="type" required>
              <option value="cuisine">Cuisine</option>
              <option value="chasse">Chasse</option>
              <option value="poche">Poche</option>
              <option value="survie">Survie</option>
            </select>
          </div>
          <div class="div-input-label">
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" cols="50" placeholder="Information Couteau" required></textarea>
          </div>
        </div>
        <div class="formcol2">
          <div class="div-input-label">
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" placeholder="Prix du Couteau" required />
          </div>
          <div class="upload">
            <div class="upload-btn">
              <i class="bx bx-cloud-upload"></i>
              <p>Parcourir les fichiers</p>
              <input name="image" type="file" id="file-upload" accept=".jpg, .jpeg, .png" onchange="handleImageUpload(event)" />
            </div>
            <p id="file-name"><i class="bx bxs-file-image img"></i><span id="nom-file-name">Pas de fichier sélectionné</span> <i id="delete-btn" onclick="deleteImage()" class="bx bxs-trash-alt trash"></i></p>
          </div>
          <input type="submit" name="submit" value="Ajouter le couteau" class="input-submit-forms" />
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
  <script src="app.js"></script>
</body>

</html>