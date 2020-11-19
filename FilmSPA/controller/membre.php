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

				//hash the password extracted from form
				$hashed_password = password_hash($MDP_membre, PASSWORD_DEFAULT);
				//var_dump($hashed_password);

				$trimmed = trim();
				var_dump($trimmed);


				//Cree un Objet bidon
				$membre = new Membre(null,
					          trim($nom),
					          trim($prenom),
					          trim($profil),					   
					          trim($courriel),
					          trim($hashed_password) );	

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

	

	/*
	 Recoit un objet recuperé par son ID et cree une
	 session en serializant l'objet dans la session
	 */
	function creatSession($lastID)
	{
		global $membreDAO;

		//Last obj added into DB
		$membre = $membreDAO->getOneById($lastID);
		//print_r($membre->PK_ID_Membre); //Test get data of objet
		

		//CREE LA SESSION 
		$_SESSION["membre"] = serialize($membre);
		//var_dump($_SESSION["membre"]);

		//Send to index page
		header('Location: ../view/membre/index.php');		
	}


?>

