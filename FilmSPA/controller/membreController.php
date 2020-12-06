<?php
session_start();
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';

 /* =================== CONTROLLEUR - Membre ===================*/

//GLOBAL
extract($_POST);
$membreDAO = new MembreDAO();	

//var_dump($action);

switch ($action) 
{
	case 'insert':
		if($membreDAO->existeDeja($courriel))
			header("location: ../view/home/index.php");
		else
			enregistrer();
	    break;
	case 'update':
			 editer();
		break;
	case 'delete':
			echo $membreDAO->delete($idMembre);//Si ok return 1
		break;
	case 'select':
			echo $membreDAO->selectMembres();//Si ok return 1
		break;
	case 'afficherPanier':
			echo "Test";
		break;			
	default:
		echo "Aucun action trouvée";
		break;
}//fin switch	


 /* =================== METHODES ===================*/

function enregistrer()
{
	extract($_POST);
	global $membreDAO;

	//hash the password extracted from form
	$hashed_password = password_hash($MDP_membre, PASSWORD_DEFAULT);
	//var_dump($hashed_password);

	//Create a temporary object
	$membre = new Membre(null,
		          trim($nom),
		          trim($prenom),
		          trim($profil),					   
		          trim($courriel),
		         			 null,
		          trim($hashed_password) );	

	//Insert it into DB and bring back its ID
	$lastID = $membreDAO->insert($membre);//Si ok return 1
	//clean memoire
	unset($membre);
	//Go create a session
	$membreDAO->createSession($lastID);
}

function editer()
{
	extract($_POST);
	global $membreDAO;	

	//$hashed_password = password_hash($MDP_membre, PASSWORD_DEFAULT);
	
	//Create an objet with extract imputs from form
	$membre = new Membre($PK_ID_Membre,
						  trim($nom),
						  trim($prenom),
						  trim($profil),
						  trim($courriel),
						  trim($MDP_membre),
						  trim($tel_membre));

	echo $membreDAO->update($membre);//Si ok return 1
}

//PHP END
?>

