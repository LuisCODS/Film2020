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

 <!-- __________________________ DIV FORM CREATE USER __________________________ --> 

 <div class="container-fluid" id="dviFormCreateUser">
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
                      <input  id="courriel" type="email" class="form-control" name="courriel" required 
                      >
                      <p id="msgEmail"></p>
                </div>
                <!-- MOT DE PASSE -->
                <div class="form-group">
                      <label for="MDP_membre">Mot de passe</label>
                      <input type="password" class="form-control" id="MDP_membre" name="MDP_membre" required autocomplete >
                      <p id="erreurPassword" style='color:red'></p>
                </div>
                <!-- PASSWORD CONFIRM -->
                <div class="form-group">
                      <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                      <input type="password" class="form-control" id="MDP_membreConfirm" name="MDP_membreConfirm" required autocomplete>
                       <p id="erreurPasswordConfirm" style='color:red'></p>
                </div> 
                <!-- BUTTON -->
                <div class="form-group">
                    <button type="submit" value="Envoyer" class="btn btn-primary btn-block" 
                             onClick="envoyerEnreg(this)">Valider</button>      
                </div>
                <!-- RETOUR -->
                <!-- <div class="form-group">
                    <input type="button" value="Returner" class="btn btn-primary btn-block" onClick="listerFilmsCards();"></input>
                </div> -->
            </form>     
        </div>
      </div>
</div> 

 <?php include_once("../../includes/footer.php");?>
</body>
</html>
