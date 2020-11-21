<!-- _________________  FORM AJOUTER FILM _________________ --> 
<div class="container" id="divFormFilm" style="display: flex;justify-content: center;">    
     <!-- <form id="formCreateFilm" enctype="multipart/form-data" style="width: 30%;" method="POST"> -->  
     <form>        
        <h2>Nouveau Film</h2>
        <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
<!--         <div class="form-group">
              <input 
                type="hidden" 
                class="form-control" 
                readonly="true"
                id="action" 
                name="action"
                value="insert" > -->
        </div>
        <div class="form-group">
            <label for="PK_ID_Film"></label>
            <input 
                type="hidden"
                class="form-control" 
                id="PK_ID_Film"
                name="PK_ID_Film" >
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
            <label for=realisateur"">Realisateur</label>
            <input type="text" class="form-control" id="realisateur" required  name="realisateur" placeholder="">
        </div>
        <div class="form-group">
            <label for=description"">Description</label>
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
        <button id="btnEnregistrer" 
                type="submit"        
                onClick="enregistrerFilm();"                                      
                class="btn btn-primary">Enregistrer
        </button>
      </form> 
</div>  
