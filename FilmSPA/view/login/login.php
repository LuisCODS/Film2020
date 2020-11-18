<?php
 session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once '../../includes/head.php'; ?>
</head>

<body class="text-center">
  <div class="container">
      <form id="formLogin" method="POST" action="../../controller/login.php" > 
            <div class="icone">  
                  <i class="fas fa-film"></i>
            </div> 
               <h1 class="mb-4">Page connection</h1> 
            <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
            <input type="hidden"
                 readonly="true" 
                 id="action" 
                 name="action" 
                 value="login" >         
            <input type="text" 
                required 
                placeholder="Courriel" 
                name="courriel" 
                id="courriel" 
                class="form-control mb-4">
            <input type="password"
                required 
                placeholder="Mot de passe" 
                class="form-control mb-4" 
                name="MDP_membre" 
                id="MDP_membre">
            <p style='color:red'>
              <?php if (isset ($_SESSION["loginErreur"])){ echo $_SESSION["loginErreur"]; }  ?>
             </p>
            <button type="submit" id="btnLogin" class="form-control btn btn-primary">Login</button>  
            <a href="../membre/create.php">Pas encore membre?</a>                   
    </form> 
  </div> 
  
      <?php include_once("../../includes/footer.php");?>
</body>
</html>