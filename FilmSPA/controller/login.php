<?php
session_start();
 include_once '../dao/MembreDAO.php';
 include_once '../model/Membre.php';

// =================== CONTROLEUR LOGIN =======================

//get all inputs form
extract($_POST);
$membreDAO = new MembreDAO();
//print_r($MDP_membre);//Test extract post
//print_r($courriel);//Test extract post


//CAS LOGIN
if ( isset($_POST["action"])  &&  $_POST["action"] == "login"){

	//Go find membre
	$membre = $membreDAO->selectToLogin($courriel, $MDP_membre);
	//echo $user->courriel;  //test post
	//print_r($membre);

	//Si le membre existe
	if ($membre == true) {

		//CREE LA SESSION 
		 $_SESSION["membreID"] = $membre->PK_ID_Membre;
		 $_SESSION["membreCourriel"] = $membre->courriel;

		//GESTION INTERFACE
		if ($membre->profil == "admin"){
			header("location: ../view/admin/index.php");
		}else{
			header("location: ../view/membre/index.php");
		}	

	}else{
		//$_SESSION['loginErreur'] = "Courriel ou mot de passe invalide!"
		header("location: ../view/login/login.php");
	}
}
else{
	header("location: ../view/login/login.php");
}

?>

