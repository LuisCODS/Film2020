<?php
include '../model/Film.php';
include '../dao/FilmDAO.php';

//GLOBAL 
extract($_POST);
//$action=$_POST['action'];
$filmDAO = new FilmDAO();
//$tabRes=array();
//print_r($action);

// =================== CONTROLLEUR - film ===================

switch ($action) 
{	
	case 'insert':		
		    enregistrer(); // envois 1 si ok
		break;

	case 'update':
		// break;

	case 'delete':
			//print_r($idFilm);//get id from action into supprimerFilm()
		    sendToDelete($idFilm);
		break;

	case 'select':
		  echo $filmDAO->selectFilms();//Si ok return 1
		  unset($filmDAO);//clean memoire
		break;

	case 'listerCards':
		  echo $filmDAO->selectFilms();//Si ok return 1
		  unset($filmDAO);//clean memoire
		break;

	default:
		echo "Aucun action trouvée";
		break;

}//fin switch



// =================== METHODES ===================

function enregistrer()
{
	global $filmDAO;	 
	
	extract($_POST);

	$dossier="../img/";
	$nomPochette=sha1($titre.time());
	$pochette="avatar.jpg";
	
	//Si une photo a été choisie
	if($_FILES['pochette']['tmp_name']!=="")
	{
		// chargé sur le serveur le nom temporaire du fichier
		$tmp = $_FILES['pochette']['tmp_name'];
		$fichier= $_FILES['pochette']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}

	$film = new Film(null,
				trim($titre),
				trim($prix),
				trim($realisateur),
				trim($categorie),
				trim($pochette),
				trim($description),
				trim($url) );

	$filmDAO->insert($film);//Si ok return 1	
	unset($filmDAO);//clean memoire
}

function sendToDelete($idFilm)
{
	//print_r($idFilm);
	 global $filmDAO;
	 $filmDAO->findById($idFilm);
}