<?php
session_start();
include_once '../dao/MembreDAO.php';

// =================== CONTROLEUR LOGIN =======================

extract($_POST);
$membreDAO = new MembreDAO();

//CAS LOGIN
if ( isset($_POST["action"])  &&  $_POST["action"] == "login"){

	 $membreDAO->login($courriel,$MDP_membre);
}
else{ 
	header("location: ../view/home/index.php");
	//echo "$('#divFormLogin').show();";
	//echo "$('#divFormLogin').html();";

}


?>

