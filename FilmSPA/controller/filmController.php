<?php

// =================== CONTROLLEUR - film ===================

include '../model/Film.php';
include '../dao/FilmDAO.php';
// require_once("../includes/ConnectionPDO.php");

//GLOBAL
$filmDAO = new FilmDAO();

extract($_POST);

switch ($action) 
{

	case 'insert':
		break;

	case 'update':
		break;

	case 'delete':
		break;

	case 'select':
		 echo $filmDAO->selectFilms();//Si ok return 1
		break;

	default:
		echo "Aucun action trouvée";
		break;

}//fin switch


?>