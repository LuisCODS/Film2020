<?php
session_start();
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';
include_once '../dao/FilmDAO.php';

 /* =================== CONTROLLEUR - ADMIN  ===================*/

extract($_POST);
$membreDAO = new MembreDAO();	
$filmDAO   = new FilmDAO();

switch ($action) 
{

	case 'literMembres':
		//echo $membreDAO->selectMembres();//Si ok return 1
		break;

	case 'literFilms':
		 //echo $filmDAO->selectFilms();//Si ok return 1
		break;
		
	default:
		echo "Aucun action trouvée";
		break;

}//fin switch

	
?>

