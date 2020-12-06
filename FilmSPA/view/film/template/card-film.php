
<?php
extract($_POST);
$total = json_decode($chaine,true);
    
// ZONE MESSAGE
echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
                   <h2>Total de films: (".count($total).")</h2>
                  </div>";

foreach( json_decode($chaine) as $film)  
{
?>          
    <!-- TEMPLATE CARD FILM -->
     <div  style="display: inline-block" >
        <div class="card" style="width: 20rem;">            
        <a> 
            <img class="card-img-top" 
                onClick="displayModal('<?php echo $film->url; ?>');" 
                src="../../img/<?php echo $film->pochette; ?>"width="200" height="300">                 
        </a> 
         <div class="card-body">
            <h5 class="card-title">Titre: <?php echo $film->titre; ?></h5>
             <p class="card-text" >Realisateur: <?php echo $film->realisateur; ?></p>
             <p class="card-text">Prix: <?php echo $film->prix; ?>$</p>
             <p class="card-text">Categorie: <?php echo $film->categorie; ?></p>
             <a id="addPanier" href="#" class="btn btn-primary">Ajouter Panier</a>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

        <iframe width="310"
                height="300" 
                src="https://www.youtube.com/embed/Gd9wSNRcbco" 
                frameborder="0" 
                style="margin: auto; padding-top: 5px"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe> 

          <!-- VIDEO -->
<!--           <video  id="preview"   
                 width="300" 
                 height="300"
                 poster="../../img/<?php echo $film->pochette; ?>"
                 controls 
                 muted>
                <source src="../../apercus/Intouchables.mp4" type="video/mp4"/>
                This browser does not support the HTML5 video element.
         </video> --> 
      </div>
    </div>
  </div>
</div>