<?php
//session_start();
session_destroy(); //Supprime la session
session_unset(); //Décharge de la memoire
header("location: ../home/index.php");
?>