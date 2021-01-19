<?php
session_start();
include_once '../../../model/Membre.php';

/* =================== SESSION MEMBRE===================*/
 $membre = new Membre(null,null,null,null,null, null,null ); 
  if ( isset ($_SESSION["membre"]) ) {
       $membre = unserialize($_SESSION["membre"]);
   }
  else {
    header("location: ../../home/index.php");
    exit();
   }


  /* =============== SESSION  PANIER =============== */

  //Si pas encore de session
  if (!isset ($_SESSION['panier']) )
  {
    //Cree un session 
    $_SESSION['panier'] = array();
  }

extract($_POST);
$filmChoisie = json_decode($dataJson); //recebe o filme escolhido
$idFilm = $filmChoisie[0]->PK_ID_Film;//Get film id


 /* ===================== ADD ID FILM INTO PANIER =========================*/

//Si le films n'est pas dans le panier
if (!isset ($_SESSION['panier'][$idFilm]) )
{  
  $_SESSION['panier'][$idFilm] = 1; //premiers fois dans le panier   

}else{

   $_SESSION['panier'][$idFilm] += 1;
} 



