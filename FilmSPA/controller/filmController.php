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
		   // echo "ok";
		break;

	case 'showForm':
			echo $filmDAO->showFormEditer($idFilm);
			unset($filmDAO);//clean memoire
		 break;

	case 'update':
			echo EditerFilm($PK_ID_Film);
		 break;

	case 'delete':
			//print_r($idFilm);//get id from action into supprimerFilm()
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

	// ce select est necessaire pour recuperer la pochette courrante
	$film =  $filmDAO->getFilm($idFilm);
	 //unset($filmDAO);//clean memoire
	 $anciennePochette = $film->pochette;
	 unset($film);//clean memoire

	 $pochette = $filmDAO->verserFichier("img","pochette",$anciennePochette, $titre);
   
	$filmDAO->update(trim($titre),trim($prix),trim($realisateur),trim($categorie),trim($pochette),trim($description),trim($url),$PK_ID_Film);	
	unset($filmDAO);//clean memoire

	// //CAS NOUVELLE IMAGE
	// if($_FILES['pochette']['tmp_name']!=="")
	// {
	// 	//enlever ancienne pochette
	// 	if($pochette!="avatar.jpg")
	// 	{
	// 		$rmPoc='../img/'.$pochette;
	// 		$tabFichiers = glob('../img/*');
	// 		//print_r($tabFichiers);
	// 		// parcourir les fichier
	// 		foreach($tabFichiers as $fichier)
	// 		{
	// 		  if(is_file($fichier) && $fichier==trim($rmPoc)) {
	// 			// enlever le fichier
	// 			unlink($fichier);
	// 			break;
	// 		  }
	// 		}
	// 	}

	// 	$nomPochette=sha1($titre.time());
	// 	//Upload de la photo
	// 	$tmp = $_FILES['pochette']['tmp_name'];
	// 	$fichier= $_FILES['pochette']['name'];
	// 	$extension=strrchr($fichier,'.');
	// 	$pochette=$nomPochette.$extension;
	// 	@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
	// 	// Enlever le fichier temporaire chargé
	// 	@unlink($tmp); //effacer le fichier temporaire
	// }


}