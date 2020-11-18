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
        <div class="row ">
            <div class="col-md">               
                 <form id="formCreate" action="../../controller/membre.php" method="POST">
                       <h2>Formulaire d'inscription</h2>

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
                            value="insert" >
                      </div>

                      <div class="form-group">
                            <label for="nom">Nom</label>
                            <input
                            autofocus
                             size="40"
                             type="text" 
                             class="form-control" 
                             name="nom"
                             id="nom" 
                             required>
                            <p id="erreurNom" style='color:red'></p>
                      </div>

                      <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input 
                            size="40"
                            type="text" 
                            class="form-control" 
                            name="prenom" 
                            required>
                            <p id="erreurIsVide" style='color:red'></p>
                      </div>

                      <div class="form-group">
                            <label for="courriel">Courriel</label>
                            <input 
                            required
                            id="courriel"
                            size="40"
                            type="email" 
                            class="form-control" 
                            name="courriel">
                            <p id="erreurCourriel" style='color:red'></p>
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
                          onclick="return validerForm()" 
                          class="btn btn-primary">
                          Enregistrer
                      </button>
                </form>     
            </div>
       </div>
    </div>    
<?php include_once("../../includes/footer.php");?>
</body>
</html>