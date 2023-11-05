<?php
require 'connection.php';

$queryCouteaux = "SELECT COUNT(*) AS total FROM produits";
$resultCouteaux = mysqli_query($conn, $queryCouteaux);
$rowCouteaux = mysqli_fetch_assoc($resultCouteaux);
$totalCouteaux = $rowCouteaux['total'];

$queryPhotos = "SELECT COUNT(*) AS total FROM galerie";
$resultPhotos = mysqli_query($conn, $queryPhotos);
$rowPhotos = mysqli_fetch_assoc($resultPhotos);
$totalCouteauxphoto = $rowPhotos['total'];


?>