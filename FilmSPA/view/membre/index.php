<?php
session_start();
include_once '../../model/Membre.php';

 /* =================== SESSION ===================*/

   $membre = new Membre(null,null,null,null,null, null,null ); 

    if ( isset ($_SESSION["membre"]) ) {

         $membre = unserialize($_SESSION["membre"]);
         //var_dump($membre);
     }
    else {
      header("location: ../login/login.php");
      exit();
     }

 /* ==============================================*/
 ?>


<!doctype html>
<html lang="en">
<head>
    <?php
      include_once '../../includes/head.php'; 
      include_once '../../includes/interfaceMembre.php';
     ?>
</head>
<body class="text-center">
    <div class="container" id="contenu">
          <div class="row">
              <div class="col-sm col-md col-lg col-xl">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container-fluid">
                              <h2 class="display-4" >
                                  <?php echo $membre->getCourriel();  ?>
                                </h2>
                              <hr class="my-4">
                              <h3>Bienvenue !</h3>
                        </div>
                  </div>
              </div>
          </div>
    </div>
<?php include_once("../../includes/footer.php");?>
</body>
</html>

