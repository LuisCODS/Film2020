<?php
session_start();
include_once'../../../includes/Connection.php';

var_dump($_SESSION["panier"] );
/* ================== SESSION PANIER ============================*/
//Si pas de panier
if (!isset ($_SESSION["panier"]) )
{
    //En cree une
    $_SESSION["panier"] = array();
}

extract($_POST);

//Il a pesé sur le bouton d'ajouter au panier
if ( isset($_POST["action"])  &&  $_POST["action"] == "addPanier")
{
    //SI ce produit, pour cette id donnée,  n'a pas ecnore été ajouté
    if(!$_SESSION["panier"][$idFilm]) {
        //Add quantité de ce produit à 1
        $_SESSION["panier"][$idFilm] = 1;
    }else{
       //Augumente la quantité du meme produit
       $_SESSION["panier"][$idFilm] += 1;
    }
}
 ?>

<div class="container">
    <!--   LIGNE 1 -->
  <div class="row ">
        <!--  QUANTITÉ PANIER -->
        <div class="col-md-10">
            <h2>Votre panier(<?php echo count($_SESSION['panier']); ?>)</h2>
        </div>  
        <!--===============  VIDER PANIER  ===============-->         
        <div class="col-md-2 mb-3">
            <form method='post' action='gestionPanier.php'>
                <input type='hidden' name='action'  value='videPanier'/>
                <button type='submit' class='btn btn-danger'>Vider panier</button>
            </form>
        </div> 
</div>

  <!-- LIGNE 1 -->
  <div class="row">
      <!-- COL 1 -->
      <div class="col-md-12"> 
            <!-- TABLE -->
           <table class="table">
            <thead class="thead-dark">
              <tr>
                  <th>Pochette</th>
                  <th>Titre</th>
                  <th>Quantite</th>
                  <th>Prix</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>

 <!-- // =========================== ZONE AFFICHAGE=========================== -->
  
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>ACTION</td>
              </tr>
            </tbody>
          </table>
      </div>
  </div>

  <hr>

  <!-- LIGNE 2 -->
  <div class="row">
    <div class="col-md-6">            
        Subtotal: $<br/>
        TPS: $<br/>
        TVQ: $<br/>
        Total:<br/>   
    </div>  
    <div class="col-md-6">
         <!-- === BOUTTON FINALIZER ET PAYER ======== -->         
        <form method='post' action=''>
            <input type='hidden' name='idFilm'    value=''/>
            <input type='hidden' name='idMembre'  value=''/>
            <button type='submit' class='btn btn-success'>Finalizer et payer</button> 
        </form> 
    </div>      
  </div>   
</div>