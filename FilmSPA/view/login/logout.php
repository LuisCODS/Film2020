<?php
session_start();

if ( isset ($_SESSION["panier"]) ) {
	$_SESSION['panier'] ="";
	session_unset($_SESSION['panier']); //Décharge de la memoire
	session_destroy(); //Supprime la session
 }

header("location: ../home/index.php");
?>