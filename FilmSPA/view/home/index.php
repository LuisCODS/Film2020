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
                <!-- AFFECTE LE PROFIL DEFAULT-->
                <input type="hidden" id="profil" name="profil" value="membre">
                
                <!-- CONTROLLER ACTION-->
                <input type="hidden" readonly="true" id="action" name="action" value="insert">

                <!-- NOM -->
                <div class="form-group">
                      <label for="nom">Nom</label>
                      <input autofocus 
                            type="text" 
                            class="form-control" 
                            name="nom" 
                            id="nom" 
                            placeholder="Max 40 caracteres"
                            pattern="[a-zA-z0-9]{2,40}"
                            required>
                      <p id="erreurNom" style='color:red'></p>
                </div>

                <!-- PRENOM -->
                <div class="form-group">
                      <label for="prenom">Prenom</label>
                      <input  type="text" 
                              class="form-control" 
                              name="prenom" 
                              placeholder="Max 40 caracteres"
                              pattern="[a-zA-z0-9]{2,40}"
                              required>
                      <p id="erreurIsVide" style='color:red'></p>
                </div>

                <!-- COURRIEL -->
                <div class="form-group">
                      <label for="courriel">Courriel</label>
                      <input  id="courriel" 
                              type="email" 
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
<!--                 <div class="form-group">
                    <input type="button" value="Returner" class="btn btn-primary btn-block" 
                    onClick="listerFilmsCards();"></input>
                </div> -->
            </form>     
        </div>
      </div>
</div> 

<!-- action="../../controller/loginController.php" novalidate onSubmit="return valideForm(this)" -->
 <!-- __________________________ LOGIN ______________________________ --> 

<div class="container text-center" id="divFormLogin">

    <form id="formLogin" method="POST" novalidate action="../../controller/loginController.php" > 
          <div class="icone"><i class="fas fa-film"></i></div> 
          <h1 class="mb-4">Page connection</h1> 

          <!-- ============= CONTROLLER ACTION ============= -->
          <input type="hidden" readonly="true" 
                id="action" name="action" value="login"> 

          <!-- ============= COURRIEL ============= -->
          <div class="form-group">   
              <input type="email"
                      autofocus 
                      placeholder="Courriel" 
                      name="courriel" 
                      id="courriel" 
                      required
                      class="form-control mb-4">               
               <p id="messageCourriel" 
                      style="font-weight: bold"></p>
          </div>

          <!-- ============= MOT DE PASSE ============= -->
          <div class="form-group">
              <input type="password"  
                    placeholder="Mot de passe" 
                    class="form-control mb-4" 
                    name="MDP_membre" 
                    required
                    pattern="[a-zA-Z0-9]{4}"
                    id="MDP_membre"                     
                    autocomplete>
               <p id="messagePassword" 
                      style="font-weight: bold"></p>
          </div>

          <div class="form-group">
            <!--  onClick="envoyerLogin(formLogin)" -->
            <button type="submit" 
                    name="btnLogin"  
                    id="btnLogin"                      
                    class="form-control btn btn-primary">Connexion</button>             
         </div>
         <p id="messageError" name="messageError"></p>
    </form> 
</div> 



 <?php include_once("../../includes/footer.php");?>
</body>
</html>
