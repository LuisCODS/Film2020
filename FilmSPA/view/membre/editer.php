<?php
session_start(); 
include_once '../../model/Membre.php';

 /* =================== SESSION ===================*/

 $membre = new Membre(null,null,null,null,null, null,null ); 

    if (isset ($_SESSION["membre"]) ){
        
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
<div class="container-fluid">
        <!--  LIGNE 1 -->
        <div class="row mb-3">
             <div class="col-md-8">
             </div>  
             <div class="col-md-3">
                  <a class="btn btn-primary" 
                      href="../membre/index.php" 
                      role="button">
                      <i class="fas fa-backward">     Retourner</i>
                  </a>
            </div> 
        </div> 
    <div class="row">
          <!-- _________________  FORM EDITER MEMBRE _________________ --> 
           <form id="formCreate" action="../../controller/membreController.php" method="POST">
                     <h2>Formulaire d'édition</h2>
                          <input
                           type="hidden" 
                           id="PK_ID_Membre" 
                           value="<?php  echo $membre->getMembreID(); ?>"
                           name="PK_ID_Membre" >

                          <input
                           type="hidden" 
                           id="profil" 
                           value="<?php  echo $membre->getProfil();  ?>"
                           name="profil" >

                    <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
                          <input 
                          type="hidden" 
                          class="form-control"
                          readonly="true" 
                          id="action" 
                          name="action" 
                          value="update" >

                    <div class="form-group">
                          <label for="nom">Nom</label>
                          <input
                           value="<?php echo $membre->getNom();  ?>"
                           size="40"
                           type="text" 
                           class="form-control" 
                           name="nom"
                           id="nom" 
                           required>
                          <p id="erreurNom"></p>
                    </div>
                    <div class="form-group">
                          <label for="prenom">Prenom</label>
                          <input 
                          value="<?php echo $membre->getPrenom();  ?>"
                          size="40"
                          type="text" 
                          class="form-control" 
                          name="prenom" 
                          required>
                    </div>
                    <div class="form-group">
                          <label for="courriel">Courriel</label>
                          <input
                          value="<?php echo $membre->getCourriel(); ?>"
                          required
                          id="courriel"
                          size="40"
                          type="email" 
                          class="form-control" 
                          name="courriel">
                           <small id="isValideCourriel"> </small>
                    </div>
                    <div class="form-group">
                          <label for="tel_membre">Telephone</label>
                          <input 
                          value="<?php echo $membre->getTelMembre(); ?>"
                          class="form-control"
                          onchange="validerTelephone(this.value)"
                          id="tel_membre" 
                          name="tel_membre">
                          <small id="isValidetTelephone"> </small>
                    </div>
                    <div class="form-group">
                          <label for="MDP_membre">Mot de passe</label>
                          <input 
                          value=""
                          autocomplete
                          type="password" 
                          class="form-control" 
                          id="MDP_membre" 
                          name="MDP_membre" 
                          required>
                          <p id="erreurPassword" style='color:red'></p>

                    </div>
                    <div class="form-group">
                          <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                          <input 
                          size="40"
                          value=""
                          autocomplete
                          type="password"
                          class="form-control" 
                          id="MDP_membreConfirm" 
                          name="MDP_membreConfirm" 
                          required>
                          <p id="erreurPasswordConfirm" style='color:red'></p>

                    </div> 
                    <button             
                        type="submit" 
                        onclick="return validerPassword( )" 
                        class="btn btn-primary">
                        Editer
                    </button>
              </form> 
    </div>
</div>
 <?php include_once("../../includes/footer.php");?>
</body>
</html>
