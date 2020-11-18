<?php
session_start();
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';
// --------------------------------------------------------------
 // 				CONTROLLEUR - Membre  
 //--------------------------------------------------------------- 


	extract($_POST);
	//GLOBAL
	$membreDAO = new MembreDAO();	


	switch ($action) 
	{
		case 'insert':

				$membre = new Membre(null,$nom,$prenom,$profil,$courriel,$MDP_membre);	
				$lastID = $membreDAO->insert($membre);//Si ok return 1

				//print_r($lastID);//test get last id
				$membre = $membreDAO->selectById($lastID);

				//CREE LA SESSION  
				//$_SESSION["membre"] = serialize($membre);
				print_r($membre);

				
				//unset($membre);//clean memoire
				//header('Location: ../view/membre/index.php');

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
	}


?>

