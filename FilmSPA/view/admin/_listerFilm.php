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

<!-- ========================================================= -->

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
    <div class="row mb-3">
        <!--  COL 1 -->
        <div class="col-md-3">
            <h2 > <i class="fas fa-film"></i>   Liste des Film </h2> 
        </div>  
        <!--  COL 2 -->
        <div class="col-md-6">

        </div> 
        <!--  COL 3 -->
        <div class="col-md-3">
              <a class="btn btn-outline-success" 
                 href="../film/create.php" 
                 role="button">Nouveau
              </a>
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
                        <th>Pochette</th>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Realisateur</th>
                        <th>Action</th> 
                        <th></th>                                
                    </tr>
                </thead>
                    <tbody>  
                      <tr>
                          <td><img src="../../img/avatar.jpg" width=80 height=80></td>
                          <td><?php echo "data 1"?></td>
                          <td><?php echo "data 1"?></td>                      
                          <td><?php echo "data 1"?></td>                      
                          <td><?php echo "data 1"?></td>                      
                          <td>
                            <a 
                              class="btn btn-outline-primary " 
                              href="../film/editer.php?id=<?php  ?>"
                              role="button">Editer
                            </a> 
                            <a 
                              class="btn btn-outline-danger " 
                              href="../../controller/film.php?delete=<?php  ?>"
                              role="button">Supprimer
                            </a>                        
                          </td>                                                   
                      </tr>
                    </tbody>
            </table>
            <!-- FIN TABLE -->
        </div>
    </div>
  </div>
<?php include_once("../../includes/footer.php");?>
</body>
</html>
