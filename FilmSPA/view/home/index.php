<?php
 session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    include_once '../../includes/head.php'; 
    include_once '../../includes/interfaceVisiteur.php';
    ?>
</head>
<body >
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
            <form id="formCreateNewUser" method="post"                    
                  action="../../controller/membreController.php">
                 <h2>Formulaire d'inscription</h2>
                <div class="form-group">
                      <label for="profil"></label>
                      <input type="hidden" id="profil" name="profil" value="membre">
                </div>
                <!-- CONTROLLER ACTION-->
                <div class="form-group">
                      <input type="hidden" class="form-control" readonly="true" id="action" name="action" value="insert">
                </div>
                <!-- NOM -->
                <div class="form-group">
                      <label for="nom">Nom</label>
                      <input autofocus type="text" class="form-control" name="nom" id="nom" required>
                      <p id="erreurNom" style='color:red'></p>
                </div>
                <!-- PRENOM -->
                <div class="form-group">
                      <label for="prenom">Prenom</label>
                      <input  type="text" class="form-control" name="prenom" required>
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
                    <input type="button" value="Returner" class="btn btn-primary btn-block" onClick="listerFilmsCards();"></input>
                </div>
            </form>     
        </div>
      </div>
</div> 

<!-- action="../../controller/loginController.php" -->
 <!-- __________________________ LOGIN ______________________________ --> 

<div class="container text-center" id="divFormLogin">
    <form id="formLogin" method="POST" action="../../controller/loginController.php"> 
          <div class="icone"><i class="fas fa-film"></i></div> 
          <h1 class="mb-4">Page connection</h1> 
          <input type="hidden" readonly="true" id="action" name="action" value="login" > 
          <div class="form-group">   
              <input type="text" 
                      placeholder="Courriel" 
                      name="courriel" 
                      id="courriel" 
                      class="form-control mb-4">               
          <span id="messageCourriel" style="font-weight: bold"></span>
          </div>
          <div class="form-group">
              <input type="password"  
                    placeholder="Mot de passe" 
                    class="form-control mb-4" 
                    name="MDP_membre" 
                    id="MDP_membre" 
                    autocomplete>
          <p id="msgErrorPassword" style="font-weight: bold"></p>
          </div>
           <p style='color:red'>
             <?php if (isset ($_SESSION["invalidImput"])){ echo $_SESSION["invalidImput"]; }  ?>
           </p>  
          <button type="submit" 
                  name="btnLogin" 
                  id="btnLogin" 
                  onClick="return valideForm(formLogin);"
                  class="form-control btn btn-primary">Login</button>  
          
          <!-- <button type="button" class="btn btn-link" onClick="displayDivForm();">Pas encore membre?</button> -->
          <hr>
          <span id="message"></span>
         <!--  <a href="../home/index.php" role="button"><i class="fas fa-backward"></i>   Retourner</a> -->
     </form> 
</div> 


 <?php include_once("../../includes/footer.php");?>
</body>
</html>
