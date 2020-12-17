<?php
session_start();
include_once '../dao/MembreDAO.php';

// =================== CONTROLEUR LOGIN =======================

extract($_POST);
$membreDAO = new MembreDAO();

//print_r($courriel);

//var_dump($form);
if ( isset($_POST["action"])  &&  $_POST["action"] == "login")
{

	if($membreDAO->validerLogin($courriel,$MDP_membre) != "true"){
			header("location: ../view/home/index.php");

	}else{		
		//echo "Valide!";
		$membreDAO->login($courriel,$MDP_membre);
	}
}

if ( isset($_POST["action"])  &&  $_POST["action"] == "logout")
{
	session_unset(); //Décharge de la memoire
	session_destroy(); //Supprime la session
	//header("location: ../view/home/index.php");
	//exit();
	echo "logout done!";
}

?>


