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
<body>

<!-- ==================== MSG SUCCES ====================-->
<div id="divMsg" class="col-md-12 alert alert-success" role="alert">
    <p id="emsg"></p>      
</div>

<!-- ==================== ZONE TEMPLATES ====================-->
<div class="container" id="contenu" >
		<!-- CHARGE LES TEMPLATES ICI -->
</div>

<!--  ==================== FORM CREATE FILM ====================   -->
<div class="container" id="divFormFilm">    
	<form id="formEnreg" name="formEnreg" onSubmit="return validerForm();">
    <h2>Nouveau Film</h2>
    <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
    <div class="form-group">
          <input type="hidden" readonly="true" id="action" name="action" value="insert">
    </div>
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" required size="40" maxlength="40">
      <p id="msgErreur" style='color:red'></p>
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix" required size="40">
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
        <textarea required type="textarea" class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="form-group" >                        
        <label for="pochette">Pochette</label>
        <input type="file" class="form-control" id="pochette" name="pochette">
    </div>    
        <div class="form-group" >                        
        <label for="url">Url</label>
        <input type="url" class="form-control" 
                id="url" 
                placeholder="http://www.nomdusite.com"
                pattern="^((http[s]?|ftp):\/)?\/?([^:\/\s]+)((\/\w+)*\/)([\w\-\.]+[^#?\s]+)(.*)?(#[\w\-]+)?$"
                name="url" 
                required>
    </div>     
    <!-- onClick="return validerForm();" -->
    <button id="btnEnregistrer" type="submit"  onClick="return enregistrerFilm();" class="btn btn-primary">Enregistrer</button>
  </form> 
</div> 





 <?php include_once("../../includes/footer.php");?>
</body>
</html>