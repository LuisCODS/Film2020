
<?php
extract($_POST);
$total = json_decode($chaine,true);
//echo count($total);
echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
                   <h2>Total de films: (".count($total).")</h2>
                  </div>";

foreach( json_decode($chaine) as $film)  
{
?>          
    <!-- TEMPLATE CARD FILM -->
     <div  style="display: inline-block" >
        <div class="card" style="width: 20rem;  ">
                <a href="#" target="_blank">
                    <img class="card-img-top"  src="../../img/<?php echo $film->pochette; ?>"width="200" height="300">
                </a>
                 <div class="card-body">
                    <h5 class="card-title">Titre: <?php echo $film->titre; ?></h5>
                     <p class="card-text" >Realisateur: <?php echo $film->realisateur; ?></p>
                     <p class="card-text">Prix: <?php echo $film->prix; ?>$</p>
                     <p class="card-text">Categorie: <?php echo $film->categorie; ?></p>
<!--                      <p class="card-text">Description: <?php echo $film->description; ?></p>
 -->                     <!-- <a href="#" class="btn btn-primary">Ajouter Panier</a> -->
                </div>
        </div>
    </div>
    <!--  FIN TEMPLATE CARD FILM -->
<?php  } ?>    


