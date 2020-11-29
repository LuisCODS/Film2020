 <!-- ========================= DIV FORM CREATE USER ========================= --> 
 <div id="SucessCompte" class="container-fluid" id="dviFormCreateUser">

    <!--  MSG -->
    <div class="alert alert-success" role="alert" style="display: none;">
      Compte enregistré avec succes! Veuillez vous loguer.
   </div>

<!--  LIGNE 1 -->
<div class="row ">
  <div class="col-md">               
      <form id="formCreateNewUser" method="post">
           <h2>Formulaire d'inscription</h2>
          <div class="form-group">
                <label for="profil"></label>
                <input type="hidden" class="form-control" id="profil" name="profil" value="membre">
          </div>
          <!-- CONTROLLER ACTION-->
          <div class="form-group">
                <input type="hidden" class="form-control" readonly="true" id="action" name="action" value="insert">
          </div>
          <!-- NOM -->
          <div class="form-group">
                <label for="nom">Nom</label>
                <input autofocus MAXLENTH="40" type="text" class="form-control" name="nom" id="nom" required="Champs obligatoire" titre="Champs obligatoire">
                <p id="erreurNom" style='color:red'></p>
          </div>
          <!-- PRENOM -->
          <div class="form-group">
                <label for="prenom">Prenom</label>
                <input  MAXLENTH="40" type="text" class="form-control" name="prenom" required title="Champs obligatoire">
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
                <input type="password" class="form-control" id="MDP_membre" name="MDP_membre" size="4" MAXLENGTH="4" required autocomplete >
                <p id="erreurPassword" style='color:red'></p>
          </div>
          <!-- PASSWORD CONFIRM -->
          <div class="form-group">
                <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                <input type="password" class="form-control"  size="4" MAXLENGTH="4" id="MDP_membreConfirm" name="MDP_membreConfirm" required autocomplete>
                 <p id="erreurPasswordConfirm" style='color:red'></p>
          </div> 
          <!-- BUTTON -->
          <div class="form-group">
              <button type="submit" value="Envoyer" class="btn btn-primary btn-block">Valider</button>      
          </div>
          <!-- RETOUR -->
          <!-- <div class="form-group">
              <input type="button" value="Returner" class="btn btn-primary btn-block" onClick="listerFilmsCards();"></input>
          </div> -->
      </form>     
  </div>
</div>
</div> 
<!-- ================================================================================