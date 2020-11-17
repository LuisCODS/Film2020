<?php
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';
// --------------------------------------------------------------
 // 				CONTROLLEUR - Membre  
 //--------------------------------------------------------------- 


	// Get data(action/txtInput) from moduleFunction.js
	extract($_POST);
	//GLOBAL
	$membreDAO = new MembreDAO();	


	switch ($action) 
	{
		case 'insert':
			$membre = new Membre(null,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);	
			echo $membreDAO->insert($membre);//Si ok return 1
			//unset($membre);//clean memoire
			//header('Location: ../view/login/index.php');
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
