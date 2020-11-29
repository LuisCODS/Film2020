<!-- ========================= DIV FORM CREATE USER ========================= -->
<div class="container-fluid" id="dviFormCreateUser">
    <!--  LIGNE 1 -->
    <div class="row ">
        <div class="col-md">               
            <form id="formCreateNewUser" onSubmit="return validerInputsForm(this);">
                 <h2>Formulaire d'inscription</h2>
                <div class="form-group">
                      <label for="profil"></label>
                      <input type="hidden" class="form-control" id="profil" name="profil" value="membre">
                </div>
                <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
                <div class="form-group">
                      <input type="hidden" class="form-control" readonly="true" id="action" name="action" value="insert">
                </div>
                <div class="form-group">
                      <label for="nom">Nom</label>
                      <input autofocus size="40" type="text" class="form-control" name="nom" id="nom" required="Champs obligatoire">
                      <p id="erreurNom" style='color:red'></p>
                </div>
                <div class="form-group">
                      <label for="prenom">Prenom</label>
                      <input  size="40" type="text" class="form-control" name="prenom" required title="Champs obligatoire">
                      <p id="erreurIsVide" style='color:red'></p>
                </div>
                <div class="form-group">
                      <label for="courriel">Courriel</label>
                      <input  id="courriel" type="email" class="form-control" name="courriel">
                      <p id="msgEmail"></p>
                </div>
                <div class="form-group">
                      <label for="MDP_membre">Mot de passe</label>
                      <input type="password" class="form-control" id="MDP_membre" name="MDP_membre" required autocomplete >
                      <p id="erreurPassword" style='color:red'></p>
                </div>
                <div class="form-group">
                      <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                      <input type="password" class="form-control" id="MDP_membreConfirm" name="MDP_membreConfirm" required autocomplete >
                       <p id="erreurPasswordConfirm" style='color:red'></p>
                </div> 
                <input type="button" value="Envoyer" class="btn btn-primary"></input>
                <input type="button" value="Returner" class="btn btn-primary" onClick="listerFilmsCards();"></input>
            </form>     
        </div>
    </div>
</div> 
<!-- ================================================================================ -->