<?php
session_start();
include_once '../dao/MembreDAO.php';
// include_once '../model/Membre.php';

// =================== CONTROLEUR LOGIN =======================

extract($_POST);
$membreDAO = new MembreDAO();

//CAS LOGIN
if ( isset($_POST["action"])  &&  $_POST["action"] == "login"){

	 //print_r($MDP_membre);
	 $membreDAO->login($courriel,$MDP_membre);
}
else{ 
	header("location: ../view/login/login.php");
}


?>

