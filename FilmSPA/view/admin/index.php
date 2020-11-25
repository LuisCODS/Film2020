<?php
session_start();
include_once '../../model/Membre.php';

// SI LA SESSION EXISTE
if (isset ($_SESSION["membre"]) ) {
	 $membre = unserialize($_SESSION["membre"]);
}
else {
	header("location: ../login/login.php");
	exit();
 }
 ?>
<!-- ============================================ -->
<!doctype html>
<html lang="en">
<head>
    <?php
     include_once '../../includes/head.php';
     include_once '../../includes/interfaceAdmin.php'; 
     ?>
</head>
       <!-- DIV MSG SUCCES-->
      <div class="row mb-3"  id="divMsg">
          <!-- COL 1 --> 
          <div  class="col-md-12 alert alert-success" role="alert">
              <p id="textMsg">Film enregistré avec sucess!</p>
          </div>
    </div>  
<body>
	<div class="container" id="contenu" >
	<!-- =======================================
			CHARGE LES TEMPLATES ICI
	======================================= -->	
	</div>

<!--  FORM AJOUTER FILM  -->
<div class="container" id="divFormFilm">    
	<form id="formEnreg" >

    <h2>Nouveau Film</h2>
    <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
    <div class="form-group">
          <input 
            type="hidden" 
            class="form-control" 
            readonly="true"
            id="action" 
            name="action"
            value="insert" >
    </div>
    <div class="form-group">
        <label for="titre">Titre</label>
        <input 
            type="text" 
            class="form-control"
            id="titre"
            name="titre"
            required
            size="40">
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input 
            type="text"
            class="form-control"
            id="prix"
            name="prix"
            required 
            size="40">
            <p id="onlyNumber"></p>
    </div>
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" id="categorie" name="categorie" required>
            <option value>Genre</option>
            <option value="Romance">Romance</option>
            <option value="Horreur">Horreur</option>
            <option value="Comedie">Comedie</option>
            <option value="Action">Action</option>
            <option value="Drame">Drame</option>
        </select>
    </div>
    <div class="form-group">
        <label for="realisateur">Realisateur</label>
        <input type="text" class="form-control" id="realisateur" required  name="realisateur" placeholder="">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea
            required
            type="textarea"  
            class="form-control"
            id="description"
            name="description" >
        </textarea>
    </div>
    <div class="form-group" >                        
        <label for="pochette">Pochette</label>
        <input type="file" class="form-control" id="pochette" name="pochette" >
    </div>    
        <div class="form-group" >                        
        <label for="url">Url</label>
        <input text="text" class="form-control" id="url" name="url" required>
    </div>     
    <button id="btnEnregistrer" 
            type="submit" 
            onClick="return valider();"                      
            class="btn btn-primary">Enregistrer
    </button>
       <!-- <input type="button" value="Envoyer" onClick="valider();"><br> -->

  </form> 
</div> 

 <?php include_once("../../includes/footer.php");?>
</body>
</html>