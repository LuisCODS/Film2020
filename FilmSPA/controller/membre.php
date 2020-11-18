<?php
session_start();
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';
// --------------------------------------------------------------
// 				CONTROLLEUR - Membre  
//--------------------------------------------------------------- 

	//GLOBAL
	extract($_POST);
	$membreDAO = new MembreDAO();	


	switch ($action) 
	{
		case 'insert':

				//Cree un Objet bidon
				$membre = new Membre(null,$nom,$prenom,$profil,$courriel,$MDP_membre);	
				//L'ajoute dans la BD et retourne son ID
				$lastID = $membreDAO->insert($membre);//Si ok return 1
				//print_r($lastID);//test get last id
				unset($membre);//clean memoire

				creatSession($lastID);

		    break;

		case 'update':
			$membre = new Membre($PK_ID_Membre,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);
			echo $membreDAO->update($membre);//Si ok return 1
			break;

		case 'delete':
				echo $membreDAO->delete($id);//Si ok return 1
			break;

		case 'select':
			echo $membreDAO->select($input);//Si ok return 1
			break;
			
		default:
			echo "Aucun action trouvée";
			break;

	}//fin switch

	

	//Recoit un objet recuperé par son ID et cree une session avec ses données 
	function creatSession($lastID)
	{
		global $membreDAO;

		//Recupere le dernier objet crée
		$membre = $membreDAO->selectById($lastID);
		//print_r($membre->PK_ID_Membre); //Test get objet id

		//CREE LA SESSION 
		$_SESSION["membreID"] = $membre->PK_ID_Membre;
		$_SESSION["membreCourriel"] = $membre->courriel;
		//print_r($_SESSION["membreID"]);
		//Send to index page
		header('Location: ../view/membre/index.php');		
	}


?>

