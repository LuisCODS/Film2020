<?php
session_start(); 


    // GESTION SESSION

// SI LA SESSION EXISTE
if (isset ($_SESSION["membreID"]) && isset ($_SESSION["membreCourriel"]) )
 {
  //print_r($_SESSION["membreCourriel"]); //Test get data 
  //$("#emailMembre").val($_SESSION["membreCourriel"]);
 }
else {
  header("location: ../login/login.php");
  exit();
 }
 ?>


    <?php
include_once '../../includes/interfaceVisiteur.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once '../../includes/head.php'; ?>
</head>
<body class="text-center">
<div class="container-fluid">
    <div class="row">
          <!-- _________________  FORM EDITER MEMBRE _________________ --> 
 <form id="formCreate" action="../../controller/membre.php" method="POST" ">
           <h2>Formulaire d'édition</h2>
                <input
                 type="hidden" 
                 id="PK_ID_Membre" 
                 value=""
                 name="PK_ID_Membre" >
                <input
                 type="hidden" 
                 id="profil" 
                 value=""
                 name="profil" >
           <div class="form-group">
                <label for="profil"></label>
                <input
                 type="hidden" 
                 class="form-control" 
                 id="profil" 
                 name="profil" 
                 value="membre">
          </div>
          <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
          <div class="form-group">
                <input 
                type="hidden" 
                class="form-control"
                readonly="true" 
                id="action" 
                name="action" 
                value="update" >
          </div>
          <div class="form-group">
                <label for="nom">Nom</label>
                <input
                 value=""
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
                value=""
                size="40"
                type="text" 
                class="form-control" 
                name="prenom" 
                required>
          </div>
          <div class="form-group">
                <label for="courriel">Courriel</label>
                <input
                value="" 
                required
                id="courriel"
                size="40"
                type="email" 
                class="form-control" 
                name="courriel">
          </div>
          <div class="form-group">
                <label for="telephone">Telephone</label>
                <input 
                size=""
                value=""
                class="form-control" 
                id="tel_membre" 
                name="tel_membre">
                <p id="erreurPassword" style='color:red'></p>
          </div>
          <div class="form-group">
                <label for="MDP_membre">Mot de passe</label>
                <input 
                size=""
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
                type="password"
                class="form-control" 
                id="MDP_membreConfirm" 
                name="MDP_membreConfirm" 
                required>
                 <p id="erreurPasswordConfirm" style='color:red'></p>
          </div> 
          <button             
              type="submit" 
              onclick="return validerForm( )" 
              class="btn btn-primary">
              Editer
          </button>
    </form> 
    </div>
</div>
 <?php include_once("../../includes/footer.php");?>
</body>
</html>