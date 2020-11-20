<?php
session_start();
include_once '../model/Membre.php';
include_once '../dao/MembreDAO.php';

 /* =================== CONTROLLEUR - ADMIN  ===================*/

extract($_POST);
$membreDAO = new MembreDAO();	


switch ($action) 
{

	case 'lister':
		echo $membreDAO->select_All();//Si ok return 1
		break;

	case '':
		// $membreDAO->select();//Si ok return 1
		break;
		
	default:
		echo "Aucun action trouvée";
		break;

}//fin switch

	
?>

