<?php
session_start();

if (isset($_POST['submit'])) {
  if (isset($_POST['username']) && !empty($_POST['username'])) {
    if (filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
      if (isset($_POST['password']) && !empty($_POST['password'])) {
        require "server.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérifier le nombre de tentatives de connexion
        $getAttempts = $pdo->prepare("SELECT login_attempts FROM admin WHERE email = :username");
        $getAttempts->bindParam(':username', $username);
        $getAttempts->execute();
        $row = $getAttempts->fetch(PDO::FETCH_ASSOC);
        $loginAttempts = $row['login_attempts'] ?? 0;

        // Vérifier si le nombre de tentatives est supérieur à une certaine limite
        $maxAttempts = 5; // Définir le nombre maximum de tentatives autorisées

        if ($loginAttempts >= $maxAttempts) {
          $erreur = "Trop de tentatives de connexion. Veuillez réessayer plus tard.";
        } else {
          // Effectuer la vérification de l'authentification
          $getdata = $pdo->prepare("SELECT id_user, email, password FROM admin WHERE email = :username");
          $getdata->bindParam(':username', $username);
          $getdata->execute();

          $row = $getdata->fetch(PDO::FETCH_ASSOC);
          if ($row) {
            $hashedPassword = $row['password'];
            // Vérification du mot de passe en utilisant le hachage bcrypt
            if (password_verify($password, $hashedPassword)) {
              $_SESSION['admin'] = $row['email'];
              // Réinitialiser le nombre de tentatives de connexion en cas de succès
              $resetAttempts = $pdo->prepare("UPDATE admin SET login_attempts = 0 WHERE email = :username");
              $resetAttempts->bindParam(':username', $username);
              $resetAttempts->execute();

              header("Location: ../dashboard/index.php");
              exit();
            } else {
              $erreur = "Identifiants invalides";
              // Incrémenter le nombre de tentatives de connexion en cas d'échec
              $incrementAttempts = $pdo->prepare("UPDATE admin SET login_attempts = login_attempts + 1 WHERE email = :username");
              $incrementAttempts->bindParam(':username', $username);
              $incrementAttempts->execute();
            }
          } else {
            $erreur = "Identifiants invalides";
            // Incrémenter le nombre de tentatives de connexion en cas d'échec
            $incrementAttempts = $pdo->prepare("UPDATE admin SET login_attempts = login_attempts + 1 WHERE email = :username");
            $incrementAttempts->bindParam(':username', $username);
            $incrementAttempts->execute();
          }
        }
      } else {
        $erreur = "Veuillez saisir votre mot de passe";
      }
    } else {
      $erreur = "Veuillez saisir une adresse e-mail valide";
    }
  } else {
    $erreur = "Veuillez saisir un nom d'utilisateur";
  }
}
?>
