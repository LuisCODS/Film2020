<?php
session_start();
include_once '../../model/Membre.php';
include_once '../../includes/interfaceMembre.php'; 

// SESSION
if (isset ($_SESSION["membre"]) ) {
 	$membre = new Membre(null,null,null,null,null,null);
	$membre = unserialize($_SESSION["membre"]);	
	//print_r($membre);	
 }
else {
	header("location: ../login/login.php");
	exit();
 }
 ?>

 <!-- SHOW SESSION -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>


<!doctype html>
<html lang="en">
<head>
    <?php include_once '../../includes/head.php'; ?>
</head>
<body class="text-center">
	  <div class="container-fluid">
	      <div class="row ">
	          <div class="col-md-12">

	          </div>
	          <div class="col-md">               
	   			
	          </div>
	     </div>
	  </div>    
  <?php include_once("../../includes/footer.php");?>
</body>
</html>