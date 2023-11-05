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

  <!-- TEXTE MILLIEU -->
  <section id="txt-center">
    <div>
      <main class="l-main dd-grid">
        <div class="home">
          <div class="home__information">
            <div class="border__button1">
              <span class="home__pressent anime-text">FORGE ELIDOR</span>
              <h1 class="home__title anime-text">FORGE DANS LA VALLÉE DE MUNSTER </h1>
              <span class="home__skill anime-text">CRÉATEUR DE COUTEAUX DEPUIS 2007 </span>
            </div>
            <div>
              <a href="page2.php" class="home__button_1 anime-text">Couteau disponible </a>
            </div>
          </div>

          <div class="home__img">
            <!-- <img src="ressources/img/Photo-Joel2.png" alt="" class="img-texte-center"> -->
          </div>

        </div>
      </main>
    </div>
    <section id="hide">
    <div class="home__scroll">
      <a href="#deux" class="home__scroll-button button--flex">
        <i class="uil uil-mouse-alt-2 home__scroll-mouse"></i>
        <span class="home__scroll-name">Scroll down</span>
        <i class="uil uil-arrow-down home__scroll-arrow"></i>
      </a>
    </div>
  </section>
  </section>



  <div id="un"></div>



  <!-- SLIDER -->
  <section id="slider">


    <div class="center">

      <div class="button_3">
        <h1 class="home__button_3 anime-text">Galerie des couteaux :</h1>
      </div>
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
          <img src="ressources/image_background/Couteau/couteau_1.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_2.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_3.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_4.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_5.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_6.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_7.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_8.jpg" alt="img" draggable="false">
          <img src="ressources/image_background/Couteau/couteau_9.jpg" alt="img" draggable="false">
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>


      </div>
    </div>
    <div class="button-1">
      <a href="page2.php" class="home__button_2 anime-text">Voir tous les couteaux</a>
    </div>

  </section>


  <div id="deux"></div>
<section id="glassmorphism">

  <div class="img-glass">
    <img src="ressources/about/DSC04848.JPG" alt="">
  </div>
  <div class="card">
    <div class="content">
      <h2>joel matter</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
        tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
        quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos </p>
    </div>
    <div id="age">
      <h1>14</h1>
      <h3>ANS</h3>
    </div>
  </div>
</section>

<div id="trois"></div>

  <section id="form-contact">
  <form action="contact/traitement.php" method="post">
  <div class="title">
    <h2>ME CONTACTER</h2>
  </div>
  <div class="half">
    <div class="item">
      <label for="name">Votre Nom </label>
      <input type="text" id="name" name="name">
    </div>
    <div class="item">
      <label for="email">Votre Email </label>
      <input type="text" id="email" name="email">
    </div>
  </div>
  <div class="full">
    <label for="message">Votre Message</label>
    <textarea id="message" name="message"></textarea>
  </div>
  <div class="action">
    <input type="submit" value="Envoyer votre message">
    <input type="reset" value="RÉINITIALISER">
  </div>
</form>

  </section>
  <div id="quatre"></div>

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
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia possimus expedita rerum dolorum autem nam repellat enim laborum accusantium debitis est a recusandae, non harum cupiditate quaerat voluptatibus commodi dolores?</p>
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
				<i class='bx bxs-copyright' ></i>
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

  <script>
function validateForm() {
  var name = document.forms["contactForm"]["name"].value;
  var email = document.forms["contactForm"]["email"].value;
  var message = document.forms["contactForm"]["message"].value;

  if (name == "" || email == "" || message == "") {
    alert("Veuillez remplir tous les champs obligatoires.");
    return false;
  }
}
</script>

  <script src="js/app.js"></script>
</body>

</html>