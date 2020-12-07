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
			// echo '<script type="text/javascript">alert("Mot de passe ou courriel invalide");</script>';
			header("location: ../view/home/index.php");
		// echo  $inerHtml = "<div style='text-align:center' class='alert 	alert-info' role='alert'>
			  // <h2>Courriel ou mot de passe invalides!</h2>
			  // </div>";
	}else{		
		//echo "Valide!";
		$membreDAO->login($courriel,$MDP_membre);
	}
}

// if ( isset($_POST["action"])  &&  $_POST["action"] == "logout")
// {
// 	//$membreDAO->validerLogin($courriel,$MDP_membre) ;
// 	//echo "logout";
// 	//session_start();
// 	session_destroy();
// 	//header("Refresh:0");
// 	header("location: ../view/home/index.php");
// }

?>


