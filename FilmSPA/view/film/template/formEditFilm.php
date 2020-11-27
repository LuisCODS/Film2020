<?php 
  extract($_POST);
  
    $film = json_decode($data); 
    // var_dump($film);      
    //echo $film[0]->prix; 
?>

<!-- _________________  FORM EDITER FILM _________________ --> 
<!--  LIGNE 2 -->
<div class="row mb-3"> 
  <div class="col-md-10">
  </div>  
 <!--  Retour page -->
  <div class="col-md-2">
       <a class="btn btn-primary"
       href="../admin/index.php" 
       role="button">
       <i class="fas fa-backward"></i>  Retourner  </a>
  </div> 
</div> 
<form id="formEditer">     

    <h2>Editer film</h2>

    <!-- GIVES TYPE OF ACTION TO CONTROLLER -->
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
        <label for="PK_ID_Film"></label>
        <input 
            type="hidden" 
            class="form-control"
            id="PK_ID_Film" 
            name="PK_ID_Film"
            value="<?php echo $film[0]->PK_ID_Film ?>"> 
    </div>

    <div class="form-group">
        <label for="titre">Titre</label>
        <input 
            type="text"
            class="form-control" 
            id="titre"
            name="titre"
            value="<?php echo $film[0]->titre ?>"
            size="40">
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input 
            type="text" 
            class="form-control"
            id="prix"
            name="prix" 
            size="40" 
            value="<?php echo $film[0]->prix ?>">
    </div>

    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" id="categorie" name="categorie">
            <option selected><?php echo $film[0]->categorie ?></option>
            <option value="Romance">Romance</option>
            <option value="Horreur">Horreur</option>
            <option value="Comedie">Comedie</option>
            <option value="Action">Action</option>
        <option value="Drame">Drame</option>
        </select>
    </div>

    <div class="form-group">
        <label for="realisateur">Realisateur</label>
        <input
            type="text" 
            class="form-control"
            id="realisateur" 
            name="realisateur"
            value="<?php echo $film[0]->realisateur ?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea 
            type="textarea" 
            class="form-control"
            id="description"
            name="description" 
            value="<?php echo $film[0]->description ?>"  >
         </textarea>
    </div>

    <div class="form-group" >                        
        <label for="pochette">Pochette</label>
        <input 
            type="file" 
            class="form-control" 
            id="pochette" 
            name="pochette"
            value="<?php echo $film[0]->pochette ?>">
    </div>

        <div class="form-group">
          <input
                type="hidden" 
                class="form-control" 
                readonly="true" 
                id="url" 
                name="url" 
                value="<?php echo $film[0]->url ?>">
       </div>

       <button
             id="btnEnregistrer"
             type="submit" 
             value="Envoyer"
             class="btn btn-primary">Enregistrer
     </button>

     </form> 

