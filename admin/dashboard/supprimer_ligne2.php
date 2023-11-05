<?php
// supprimer_ligne.php

require 'connection.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Supprimer la ligne de la base de données en utilisant l'ID
    $query = "DELETE FROM galerie WHERE id = '$id'";
    mysqli_query($conn, $query);
}
?>
