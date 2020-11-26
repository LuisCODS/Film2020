<?php
include '../model/Film.php';
include '../dao/FilmDAO.php';

// =================== CONTROLLEUR - film ===================

//extract($_POST);
$action=$_POST['action'];
$filmDAO = new FilmDAO();

switch ($action) 
{	
	case 'insert':
		    enregistrer(); // envois 1 si ok
		global $tabRes;
		//var_dump($action); ok
		  echo enregistrer(); // envois 1 si ok
		   //header("location:../view/admin/index.php");
		break;

	case 'update':
		break;

	case 'delete':
		 echo $filmDAO->selectFilms();//Si ok return 1
		break;

	case 'select':
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
	// $titre=$_POST['titre'];
	// $prix=$_POST['prix'];
	// $realisateur=$_POST['realisateur'];
	// $categorie=$_POST['categorie'];
	// $description=$_POST['description'];
	// $url=$_POST['url'];
	global $tabRes;

	$titre=$_POST['titre'];
	$prix=$_POST['prix'];
	$realisateur=$_POST['realisateur'];
	$categorie=$_POST['categorie'];
	$description=$_POST['description'];
	$url=$_POST['url'];

	$dossier="../img/";
	$nomPochette=sha1($titre.time());
	$pochette="avatar.jpg";
	
	//Si une photo a été choisie
	if($_FILES['pochette']['tmp_name']!=="")
	{
		//Upload de la photo
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

	$filmDAO = new FilmDAO();	
	return $filmDAO->insert($film);//Si ok return 1
	// $tabRes['action']="enregistrer";
	// $tabRes['msg']="Film bien enregistre";
	// 	echo $tabRes['action'];
	// }
	unset($filmDAO);//clean memoire
}





