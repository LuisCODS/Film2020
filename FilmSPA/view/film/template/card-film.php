<?php
session_start();
 include_once '../../../model/Membre.php';
/* =================== SESSION MEMBRE ===================*/
 $membre = new Membre(null,null,null,null,null, null,null ); 

  if ( isset ($_SESSION["membre"]) ) {

       $membre = unserialize($_SESSION["membre"]);
       var_dump($membre);
   }
  else {
    header("location: ../home/index.php");
    exit();
   }
/* =================== SESSION MEMBRE ===================*/

   
extract($_POST);
$total = json_decode($chaine,true);
    
// ZONE MESSAGE
echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
                   <h2>Total de films: (".count($total).")</h2>
                  </div>";

foreach( json_decode($chaine) as $film)  
{
?>          
<!-- CARD FILM -->
<div  style="display: inline-block;">
  <div class="card" style="width: 20rem;">            
  <a> 
      <img class="card-img-top" 
          onClick="displayModal('<?php echo $film->url; ?>');" 
          src="../../img/<?php echo $film->pochette; ?>"width="200" height="300">           
  </a> 
      <h5 class="card-title" style="text-align: center;"><?php echo $film->titre; ?></h5>
       <p class="card-text"  style="text-align: center;">Realisateur: <?php echo $film->realisateur; ?></p>
       <p class="card-text"  style="text-align: center;">Prix: <?php echo $film->prix; ?>$</p>
       <p class="card-text"  style="text-align: center;">Categorie: <?php echo $film->categorie; ?></p>

        <!-- BUTTON AJOUTER PANIER -->         
<!--         <form method='post' id="formPanier">
            <input type='hidden' name='action'   value="addPanier" />
            <input type='hidden' name='id_film'   value="<?php echo $film->PK_ID_Film; ?>" />
            <input type='hidden' name='idMembre'  value='<?php  echo $membre->getMembreID();?>'/>
            <button type='submit' 
                    onClick="ajouterAuPanier(formPanier)"
                    class=' btn-success'>Panier <i class="far fa-heart"></i></button>
        </form> -->
      <a id="addPanier" onClick="ajouterAuPanier('<?php echo $film->PK_ID_Film;?>');" class="btn btn-success ">Ajouter au <i class="fas fa-shopping-cart"></i></a> 

<!--       <a id="addPanier" href="index.php?add=panier&idFilm=<?php echo $film->PK_ID_Film;?>" 
        class="btn btn-success ">Ajouter au <i class="fas fa-shopping-cart"></i></a>  -->
 
  </div>
  </div>
</div>
    <!--  FIN TEMPLATE CARD FILM -->
<?php  } ?>    


<!--  ============================  MODAL ======================== --> 
<div class="modal fade modalVideo" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Preview</h5>
        <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- VIDEO -->
        <video  id="preview"   
                 width="300" 
                 height="300"
                 poster="../../img/<?php echo $film->pochette; ?>"
                 controls 
                 muted>
                <source src="../../apercus/Intouchables.mp4" type="video/mp4"/>
                This browser does not support the HTML5 video element.
         </video> 
      </div>
    </div>
  </div>
</div>