<?php
session_start();
include_once '../dao/MembreDAO.php';

// =================== CONTROLEUR LOGIN =======================

extract($_POST);
$membreDAO = new MembreDAO();

//var_dump($form);
if ( isset($_POST["action"])  &&  $_POST["action"] == "login")
{
	//echo $membreDAO->login($courriel,$MDP_membre);
	echo $membreDAO->validerLogin($courriel,$MDP_membre);

	// if($membreDAO->validerInputs($courriel,$MDP_membre) == false){
	// 	echo "Courriel ou mot de passse invalide!";
	// }else{		
	// 	echo "Valide!";
	// }
}
?>


