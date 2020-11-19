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
		<div class="row">
		    <div class="col-sm col-md col-lg col-xl">      		  	
				  	<h2> <i class="fas fa-film"></i>   Liste des membres </h2>
		    </div>
		</div>
	    <!-- ROW 2 -->
		<div class="row">
			<!--COL 1-->
			<div class="col-md-12">
				<!-- TABLE -->
			    <table class="table table-hover ">
			        <thead class="thead-dark">
			            <tr>
			                <th>Nom</th>
			                <th>Prenom</th>
			                <th>Profil</th>
			            </tr>
			        </thead>
	                <tbody>  
		                <tr>
		                    <td><?php echo "data 1"?></td>
		                    <td><?php echo "data 1"?></td>
		                    <td><?php echo "data 1"?></td>                       
		                </tr>
	                </tbody>
			    </table>
			    <!-- FIN TABLE -->
			</div>
			<!-- FIN COL 1 -->            	
		</div>
	</div>
 <?php include_once("../../includes/footer.php");?>
</body>
</html>
