<?php
session_start();
include_once '../../model/Membre.php';


// SI LA SESSION EXISTE
if (isset ($_SESSION["membre"]) ) {
	 $membre = unserialize($_SESSION["membre"]);
}
else {
	header("location: ../login/login.php");
	exit();
 }
 ?>

<!-- ==================================================== -->

<!doctype html>
<html lang="en">
<head>
    <?php
     include_once '../../includes/head.php';
     include_once '../../includes/interfaceAdmin.php'; 
     ?>
</head>
<body>
	<div class="container-fluid" id="contenu" >
	<!-- =======================================
			CHARGE LES TEMPLATES ICI
	======================================= -->	</div>
 <?php include_once("../../includes/footer.php");?>
</body>
</html>