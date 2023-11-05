<?php
// page2.php

require 'admin/dashboard/connection.php';

// Récupérer les informations des couteaux disponibles depuis la table "produits"
$queryProduits = "SELECT * FROM produits";
$resultProduits = mysqli_query($conn, $queryProduits);

// Récupérer les informations des couteaux de cuisine depuis la table "galerie"
$queryCuisine = "SELECT image FROM galerie WHERE categorie = 'Cuisine'";
$resultCuisine = mysqli_query($conn, $queryCuisine);

// Récupérer les informations des couteaux de exception depuis la table "galerie"
$queryException = "SELECT image FROM galerie WHERE categorie = 'Exception'";
$resultException = mysqli_query($conn, $queryException);

// Récupérer les informations des couteaux de outdor depuis la table "galerie"
$queryOutdor = "SELECT image FROM galerie WHERE categorie = 'Outdor'";
$resultOutdor = mysqli_query($conn, $queryOutdor);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!--=============== css ===============-->
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/gallery.css" />
  <title>Forge Elidor</title>
</head>

<body>
  <header class="header" id="header">
    <nav class="nav container">
      <a href="index.php" class="nav__logo">
        <h1>
          <span> JOEL MATTER</span><br>
          Coutelier depuis 14 ans
        </h1>
        <img src="ressources/img/logo.svg" alt="logo image" />
      </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link">Accueil</a>
          </li>

          <li class="nav__item">
            <a href="page2.php" class="nav__link">Couteau</a>
          </li>

          <li class="nav__item">
            <a href="index.php#form-contact" class="nav__link">Contact</a>
          </li>

          <li class="nav__item">
            <a href="about.php" class="nav__link">Atelier</a>
          </li>

          <li class="nav__item">
            <a href="#actualité" class="nav__link">Actualité</a>
          </li>
        </ul>

        <!-- Clase button -->
        <div class="nav__close" id="nav-close">
          <i class="ri-close-line"></i>
        </div>

        <img src="ressources/img//leaf-branch-4.png" alt="nav image" class="nav__img-1" />
        <img src="ressources/img//leaf-branch-3.png" alt="nav image" class="nav__img-2" />
      </div>

      <div class="nav__buttons">
        <!-- Theme chang button -->
        <!-- <i class="ri-moon-line change-theme" id="theme-button"></i> -->

        <!-- Toggle button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-4-line"></i>
        </div>
      </div>
    </nav>
  </header>

  <section id="gallery">
    <div id="background">
      <div class="tabs">
        <div class="tabs__head">
          <div class="tabs__toggle is-active">
            <span class="tabs__name">Couteau Disponibles</span>
          </div>
          <div class="tabs__toggle">
            <span class="tabs__name">Couteaux de Cuisine</span>
          </div>
          <div class="tabs__toggle">
            <span class="tabs__name">Couteaux Outdor</span>
          </div>
          <div class="tabs__toggle">
            <span class="tabs__name">Couteaux d’Exception</span>
          </div>
        </div>
        <div class="tabs__body">
          <div class="tabs__content is-active">
            <h2 class="tabs__title">Couteau Disponibles</h2>
            <div class="gallery">
              <?php

              // Parcourir les résultats et afficher les cards
              // Afficher les couteaux disponibles
              while ($row = mysqli_fetch_assoc($resultProduits)) {
                // Récupérer les informations du couteau disponible
                $image = $row["image"];
                $name = $row["name"];
                $prix = $row["prix"];
                $description = $row["description"];

                // Afficher la card du couteau disponible
                echo '
  <article data-product-id="' . $row['id'] . '" data-visible="false">
    <div class="shopping-card">
      <img src="admin/dashboard/img/' . $image . '" alt="' . $name . '" />
      <div class="text">
        <div class="product-name-container">
          <h3>€ ' . $prix . '</h3>
          <div class="tooltip">
            <i class="ri-information-line"></i>
            <span class="tooltiptext">' . $description . '</span>
          </div>
        </div>
        <div class="price-button-container">
          <p>' . $name . '</p>
          <button class="my-button">
            <i class="ri-shopping-basket-2-line"></i>
          </button>
        </div>
      </div>
    </div>
  </article>';
              }

              ?>
            </div>

          </div>
          <div class="tabs__content">
            <h2 class="tabs__title">Couteaux de Cuisine</h2>
            <ul class="gallery-responsive">
              <?php

              // Afficher les couteaux de cuisine
              while ($row = mysqli_fetch_assoc($resultCuisine)) {
                // Récupérer le chemin de l'image du couteau de cuisine
                $imagePath = "admin/dashboard/img-galerie/" . $row['image'];

                // Afficher l'image du couteau de cuisine
                echo '<li><img src="' . $imagePath . '" alt="" /></li>';
              }

              ?>
            </ul>
          </div>

          <div class="tabs__content">
            <h2 class="tabs__title">Couteaux Outdor</h2>
            <ul class="gallery-responsive">

              <?php

              // Afficher les couteaux de cuisine
              while ($row = mysqli_fetch_assoc($resultOutdor)) {
                // Récupérer le chemin de l'image du couteau de cuisine
                $imagePath = "admin/dashboard/img-galerie/" . $row['image'];

                // Afficher l'image du couteau de cuisine
                echo '<li><img src="' . $imagePath . '" alt="" /></li>';
              }

              ?>
            </ul>
          </div>
          <div class="tabs__content">
            <h2 class="tabs__title">Couteaux d’Exception</h2>
            <ul class="gallery-responsive">
              <?php

              // Afficher les couteaux de cuisine
              while ($row = mysqli_fetch_assoc($resultException)) {
                // Récupérer le chemin de l'image du couteau de cuisine
                $imagePath = "admin/dashboard/img-galerie/" . $row['image'];

                // Afficher l'image du couteau de cuisine
                echo '<li><img src="' . $imagePath . '" alt="" /></li>';
              }

              ?>


            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="popup" style="display: none">
      <div id="popup-close"><i class="close-icon fas fa-times"></i></div>
      <p>
        Désolée, la fonctionnalité de commande en ligne n'est pas encore
        disponible. Si un couteau vous intéresse, veuillez me contacter.
      </p>
      <a class="button-popup" href="index.php#form-contact">Me Contacter</a>
    </div>
  </section>



  <div id="un"></div>
  <div id="deux"></div>
  <div id="trois"></div>


  <section id="footer">

    <footer>
      <div class="container">
        <div class="content__footer">
          <div class="profil">
            <div class="logo__area">
              <img src="ressources/img/logo.png" alt="">
              <span class="logo__name">Joel Mater</span>
            </div>
            <div class="desc__area">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia possimus expedita rerum dolorum autem nam
                repellat enim laborum accusantium debitis est a recusandae, non harum cupiditate quaerat voluptatibus
                commodi dolores?</p>
            </div>
            <div class="social__media">
              <a href=""></a>
            </div>
            <div class="social__media">
              <a href=""><i class='bx bxl-facebook-circle'></i></a>
              <a href=""><i class='bx bxl-instagram-alt'></i></a>
            </div>
          </div>
          <div class="service__area">
            <ul class="service__header">
              <li class="service__name">Général</li>
              <li><a href="">Accueil</a></li>
              <li><a href="">Couteaux</a></li>
              <li><a href="">Contact</a></li>
              <li><a href="">ATELIER</a></li>
              <li><a href="">Actualité</a></li>
            </ul>
            <ul class="service__header">
              <li class="service__name">Produit</li>
              <li><a href="">Couteau Outdor</a></li>
              <li><a href="">Couteau Cuisine</a></li>
              <li><a href="">Couteau Cuisine</a></li>
              <li><a href="">Couteau d’Exception</a></li>
            </ul>
            <ul class="service__header">
              <li class="service__name">Social</li>
              <li><a href="">Instagram</a></li>
              <li><a href="">Facebook</a></li>

            </ul>
          </div>
        </div>
        <hr>
        <div class="footer__bottom">
          <div class="copy__right">
            <i class='bx bxs-copyright'></i>
            <span>2021 Hege Timothé </span>
          </div>
          <!-- <div class="tou">
            <a href="">blalvfg</a>
            <a href="">sdfsdfs</a>
            <a href="">sdfsdfsdf</a>
          </div> -->
        </div>
      </div>
    </footer>
  </section>

  
  <!-- <script src="js/app.js"></script> -->
  <script src="js/page2.js"></script>
</body>

</html>