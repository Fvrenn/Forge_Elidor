<?php
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['admin'])) {
  header("Location: admin.php");
  exit();
}

echo "Bonjour ", $_SESSION['admin'];
?>
