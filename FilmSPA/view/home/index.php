<?php
 session_start();
?>

<!doctype html>
<html lang="en" style="height: 100%">
<head>
    <?php
    include_once '../../includes/head.php'; 
    include_once '../../includes/interfaceVisiteur.php';
    ?>
</head>
<body>
<!-- __________________________  TEMPLATE  __________________________ -->

<div class="container"  id="contenu">
			<!-- ZONE AFFICHAGE -->
</div> 

 <!-- __________________________  CREATE __________________________ --> 

 <div class="container" id="dviFormCreateUser">
      <!--  MSG -->
      <div class="alert alert-success" role="alert" style="display: none;">
          Compte enregistré avec succes! Veuillez vous loguer.
      </div>
      <!--  LIGNE 1 -->
      <div class="row ">
        <div class="col-md">               
            <form id="formCreateNewUser" method="post" action="../../controller/membreController.php">
                 <h2>Formulaire d'inscription</h2>
                <div class="form-group">
                      <label for="profil"></label>
                      <input type="hidden" id="profil" 
                      name="profil" value="membre">
                </div>
                
                <!-- CONTROLLER ACTION-->
                <div class="form-group">
                      <input type="hidden" readonly="true" id="action" name="action" value="insert">
                </div>

                <!-- NOM -->
                <div class="form-group">
                      <label for="nom">Nom</label>
                      <input autofocus type="text" class="form-control" 
                      name="nom" id="nom" required>
                      <p id="erreurNom" style='color:red'></p>
                </div>

                <!-- PRENOM -->
                <div class="form-group">
                      <label for="prenom">Prenom</label>
                      <input  type="text" class="form-control" 
                      name="prenom" required>
                      <p id="erreurIsVide" style='color:red'></p>
                </div>

                <!-- COURRIEL -->
                <div class="form-group">
                      <label for="courriel">Courriel</label>
                      <input  id="courriel" type="email" 
                              class="form-control" 
                              name="courriel" 
                              pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}$"
                              placeholder="courriel@quelquechose.com"
                              required>
                              <p id="msgEmail"></p>
                </div>

                <!-- MOT DE PASSE -->
                <div class="form-group">
                      <label for="MDP_membre">Mot de passe</label>
                      <input type="password" class="form-control" 
                            id="MDP_membre" name="MDP_membre" 
                            required
                            placeholder="4 caracteres"
                            pattern="[a-zA-z0-9]{4}"
                            autocomplete>
                      <p id="erreurPassword" style='color:red'></p>
                </div>

                <!-- PASSWORD CONFIRM -->
                <div class="form-group">
                      <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                      <input type="password" 
                      class="form-control" 
                      id="MDP_membreConfirm" 
                      placeholder="4 caracteres"
                      pattern="[a-zA-z0-9]{4}"
                      required 
                      autocomplete>
                       <p id="erreurPasswordConfirm" style='color:red'></p>
                </div> 

                <!-- BUTTON  onClick="envoyerEnreg(this)" -->
                <div class="form-group">
                    <button type="submit" 
                            onClick="envoyerEnreg(this)"
                            value="Envoyer" 
                            class="btn btn-primary btn-block">Valider</button>      
                </div>

                <!-- RETOUR -->
                <div class="form-group">
                    <input type="button" value="Returner" class="btn btn-primary btn-block" 
                    onClick="listerFilmsCards();"></input>
                </div>
            </form>     
        </div>
      </div>
</div> 

<!-- action="../../controller/loginController.php" onSubmit="return valideForm(this)" -->
 <!-- __________________________ LOGIN ______________________________ --> 

<div class="container text-center" id="divFormLogin">

    <form id="formLogin" method="POST"  action="../../controller/loginController.php"> 
          <div class="icone"><i class="fas fa-film"></i></div> 
          <h1 class="mb-4">Page connection</h1> 
          <!-- ============= CONTROLLER ACTION ============= -->
          <input type="hidden" readonly="true" 
                id="action" name="action" value="login"> 
          <!-- ============= COURRIEL ============= -->
          <div class="form-group">   
              <input type="text" 
                      placeholder="Courriel" 
                      name="courriel" 
                      id="courriel" 
                      required
                      class="form-control mb-4">               
          <span id="messageCourriel" style="font-weight: bold"></span>
          </div>
          <!-- ============= MOT DE PASS ============= -->
          <div class="form-group">
              <input type="password"  
                    placeholder="Mot de passe 4 caracteres" 
                    class="form-control mb-4" 
                    name="MDP_membre" 
                    required
                    pattern="[a-zA-Z0-9]{4}"
                    id="MDP_membre"                     
                    autocomplete>
          <p id="msgErrorPassword" style="font-weight: bold"></p>
          </div>
           <p style='color:red'>
             <?php if (isset ($_SESSION["invalidImput"])){ echo $_SESSION["invalidImput"]; }  ?>
           </p>  
          <!--  onClick="login()" -->
          <button type="submit" 
                  name="btnLogin" 
                  onClick="return valideForm()"
                  id="btnLogin"                      
                  class="form-control btn btn-primary">Login</button>            
          <hr>
          <span id="message"></span>
    </form> 
</div> 


 <?php include_once("../../includes/footer.php");?>
</body>
</html>
