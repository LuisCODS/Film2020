<?php
session_start();
include_once '../../includes/head.php'; 
include_once '../../includes/interfaceAdmin.php';
include_once '../../model/Membre.class.php';
?>
 

  <main role="main">
    <div class="col main pt-5 mt-3">
      <div class="row justify-content-center ">
      	<!-- LIGNE 1 -->
        <div class="col-12">
          <div class="jumbotron bg-info">
          	<!-- LIGNE 2 -->
            <div class="row m-5">
              <div class="col main pt-5 mt-3">

                <h1 class="display-4 d-none d-sm-block text-center text-white">
                  Bienvenue Admin
                </h1>

                <h4 class="text-center text-white m-5">Vous vous trouvez sur le Tableau de Gestion des Films</h4>

                <!-- LIGNE 3 -->
                <div class="row mb-3 justify-content-center">
                  <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                      <div class="card-body bg-success">
                        <div class="rotate">
                          <i class="fa fa-user fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Membres</h6>
                        <h1 class="display-4"><?php   ?></h1>
                      </div>
                    </div>
                  </div>

                  <!-- LIGNE 4 -->
                  <div class="col-xl-4 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                      <div class="card-body bg-danger">
                        <div class="rotate">
                          <i class="fa fa-film fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Films</h6>
                        <h1 class="display-4"><?php  ?></h1>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<?php include_once '../../includes/footer.php'; ?></body>
