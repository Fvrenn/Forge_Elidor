<!DOCTYPE html>
<html>
<head>
  <title>Connexion Admin</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <div class="login-container">
    <h1>Connexion Admin</h1>
    <?php include_once "script_login.php" ?>
    <?php if(isset($erreur)){echo $erreur;} ?>
    <form action="" method="POST">
      <input type="text" name="username" placeholder="Nom d'utilisateur" >
      <input type="password" name="password" placeholder="Mot de passe" >
      <button type="submit" name="submit">Se connecter</button>
    </form>
  </div>
</body>
</html>
