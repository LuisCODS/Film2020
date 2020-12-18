<?php
include '../model/Film.php';
include '../dao/FilmDAO.php';

//GLOBAL 
extract($_POST);
$filmDAO = new FilmDAO();

// =================== CONTROLLEUR - film ===================

switch ($action) 
{	
	case 'insert':		
		    enregistrer();
		break;
	case 'showForm':
			echo $filmDAO->showFormEditer($idFilm);
			unset($filmDAO);//clean memoire
		 break;
	case 'update':
			echo EditerFilm($PK_ID_Film);
		 break;
	case 'delete':
		    sendToDelete($idFilm);
		break;
	case 'select':
		  echo $filmDAO->selectFilms();
		  unset($filmDAO);//clean memoire
		break;
	case 'listerCards':
		  echo $filmDAO->selectFilms();
		  unset($filmDAO);//clean memoire
		break;
	case 'listerByCategorie':
		   echo $filmDAO->getByCategorie($cat);
		   unset($filmDAO);//clean memoire
		break;
	case 'ajouterAuPanier':
		   echo $filmDAO->getOne($idFilm);//Return un film selon l'id demandée
		   unset($filmDAO);//clean memoire	
			//echo "";
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

	$filmDAO->insert($film);	
	unset($filmDAO);//clean memoire
}

function sendToDelete($idFilm)
{
	//print_r($idFilm);
	 global $filmDAO;
	 $filmDAO->findById($idFilm);
	 unset($filmDAO);//clean memoire
}

function EditerFilm($idFilm)
{
	//GET ALL FORM DATA
	global $filmDAO;
	extract($_POST);
	 // recupere la pochette courrante
	 $film = $filmDAO->getFilm($idFilm);
	 $anciennePochette = $film->pochette;
	 unset($film);//clean memoire
	 $pochette = $filmDAO->verserFichier("img","pochette",$anciennePochette, $titre);   
	$filmDAO->update(trim($titre),trim($prix),trim($realisateur),trim($categorie),trim($pochette),trim($description),trim($url),$PK_ID_Film);	
	unset($filmDAO);//clean memoire
}