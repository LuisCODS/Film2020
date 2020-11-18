<?php
session_start();
include_once '../../model/Membre.php';
include_once '../../includes/interfaceMembre.php'; 

// SI LA SESSION EXISTE
if (isset ($_SESSION["membreID"]) && isset ($_SESSION["membreCourriel"]) )
 {
	//print_r($_SESSION["membreCourriel"]); //Test get data	
	//$("#emailMembre").val($_SESSION["membreCourriel"]);
 }
else {
	header("location: ../login/login.php");
	exit();
 }
 ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once '../../includes/head.php'; ?>
</head>
<body class="text-center">
	  <div class="container-fluid">
	      <div class="row ">
	          <div class="col-md-12">
          			<div class="jumbotron">
						  <h1 class="display-4"><?php if (isset ($_SESSION["membreCourriel"])){ echo $_SESSION["membreCourriel"]; }  ?></h1>
						  <hr class="my-4">
						  <h3>Bienvenue parmis nous !</h3>
					</div>
	          </div>
	          <div class="col-md">               
	   			
	          </div>
	     </div>
	  </div>    
  <?php include_once("../../includes/footer.php");?>
</body>
</html>