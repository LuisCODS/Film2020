<?php
session_start();
include_once '../dao/MembreDAO.php';
// include_once '../model/Membre.php';

// =================== CONTROLEUR LOGIN =======================

extract($_POST);
$membreDAO = new MembreDAO();

//CAS LOGIN
if ( isset($_POST["action"])  &&  $_POST["action"] == "login"){
	//Send in parm extracted post data
	 $membreDAO->login($courriel,$MDP_membre);
}
else{ 
	header("location: ../view/login/login.php");
}


?>

