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
      header("location: ../../home/index.php");
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
<body>
  <!-- __________________________ TEMPLATE __________________________ --> 
  <div class="container" id="contenu">
        <div class="row">
            <div class="col-sm col-md col-lg col-xl">
                  <div class="jumbotron jumbotron-fluid" id="jumbotron">
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
  <!-- __________________________ DIV FORM EDIT ____________________ --> 
  <div class="container-fluid" id="divFormEditer">
      <!--  LIGNE 1 -->
      <div class="row mb-3">
           <div class="col-md-8">
           </div>  
           <div class="col-md-3">
                <a class="btn btn-primary" href="" role="button">
                    <i class="fas fa-backward">     Retourner</i>
                </a>
          </div> 
      </div> 
      <div class="row">
      </div>
      <!-- onSubmit="return validerFormEditer()" -->
       <form id="formEditer" method="POST">
            <div id="msgEditeSucess" 
                  style="text-align:center" 
                  class="alert alert-info" 
                  role="alert">
                 <p><b>Sucess!</b> Donnes mis à jour!</p>
            </div>
             <h2>Formulaire d'édition</h2>
              <input type="hidden" id="PK_ID_Membre" 
                      value="<?php  echo $membre->getMembreID();?>" 
                      name="PK_ID_Membre">

              <input type="hidden" 
                      id="profil" 
                      value="<?php  echo $membre->getProfil();?>" 
                      name="profil">

              <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
              <input type="hidden" 
                    readonly="true" 
                    id="action" 
                    name="action" 
                    value="update"> 

              <div class="form-group">
                    <label for="nom">Nom</label>
                    <input value="<?php echo $membre->getNom();?>" 
                          type="text" 
                          class="form-control" 
                          name="nom" 
                          id="nom" 
                          required>
                    <p id="erreurNom"></p>
              </div>

              <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input value="<?php echo $membre->getPrenom();?>" 
                          type="text" 
                          class="form-control" 
                          name="prenom" 
                          required>
              </div>

              <div class="form-group">
                    <label for="courriel">Courriel</label>
                    <input value="<?php echo $membre->getCourriel();?>"              
                           readonly="true"
                           id="courriel" 
                           type="email" 
                           class="form-control" 
                           name="courriel">
              </div>

              <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input value="<?php echo $membre->getTelMembre();?>"
                           class="form-control" 
                           id="tel_membre" 
                           name="tel_membre" 
                           placeholder="000-000-0000"
                           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                          <p id="isValidetTelephone" style='color:red'></p>
              </div>

              <div class="form-group">
                    <label for="MDP_membre">Mot de passe</label>
                    <input type="hidden" 
                           value="<?php echo $membre->getMdpMembre();?>"
                           class="form-control"
                           id="MDP_membre"
                           placeholder="4 caracteres"
                           pattern="[a-zA-z0-9]{4}"
                           name="MDP_membre"
                           required>
                    <p id="erreurPassword" style='color:red'></p>
              </div>

<!--               <div class="form-group">
                    <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                    <input value="" 
                           type="password"
                           class="form-control"
                           id="MDP_membreConfirm"
                           name="MDP_membreConfirm"
                           placeholder="4 caracteres"
                           pattern="[0-9]{4}"
                           required>
                     <p id="erreurPasswordConfirm" style='color:red'></p>
              </div>  -->
              <!-- onClick=" editerMembre(formEditer )" -->
              <button type="submit"  onClick=" editerMembre(formEditer )" class="btn btn-primary btn-block">Editer</button>

          </form> 

      </div>
  </div>

<?php include_once("../../includes/footer.php");?>
</body>
</html>

