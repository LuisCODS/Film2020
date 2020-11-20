<?php
session_start();
include_once '../../model/Membre.php';

// SI LA SESSION EXISTE
if (isset ($_SESSION["membre"]) )
 {
	 $membre = unserialize($_SESSION["membre"]);
 }
else {
	header("location: ../login/login.php");
	exit();
 }

 ?>

<!doctype html>
<html lang="en">
<head>
<?php
include_once '../../includes/head.php'; 
include_once '../../includes/interfaceAdmin.php';

?>
</head>
<body class="text-center">
	<div class="container">
	    <!-- ROW 1 -->
	    <div class="row mb-2">
	        <!--  COL 1 -->
	        <div class="col-md-4">
	            <h2 > <i class="fas fa-film"></i>   Liste des Membres </h2> 
	        </div>  
	        <!--  COL 2 -->
	        <div class="col-md-8">
	        </div> 
	    </div> 
	    <!-- ROW 2 -->
		<div class="row">
			<!--COL 1-->
			<div class="col-md-12" id="showTable">				
			<!-- ========================================================================  
								CHARGE TEMPLATE TABLE ICI 
			======================================================================== -->
			</div>
			<!-- FIN COL 1 -->            	
		</div>
	</div>
 <?php include_once("../../includes/footer.php");?>
</body>
</html>
