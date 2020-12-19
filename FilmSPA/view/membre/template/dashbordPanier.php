<?php
session_start();
?>
  <!-- ROW 1 -->
  <div class="row mb-3">    
      <!--  COL 1 -->
      <div class="col-md-3">
          <h3>
            <i class="fas fa-cart-arrow-down"></i>   
            Total Panier( <?php   
            if(isset ($_SESSION['panier'])){echo count($_SESSION['panier']); } ?>)
         </h3> 
      </div>  
      <!--  COL 2 -->
      <div class="col-md-6">
      </div> 
      <!--  COL 3 -->
      <div class="col-md-3">
           <a class="btn btn-outline-danger" onClick="" role="button">Vider panier</a>
      </div> 
  </div> 
<!-- ROW 2 -->
<div class="row">
    <!--COL 1-->
    <div class="col-md-12">
        <!-- TABLE -->
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>Pochette</th>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th></th>                                
                </tr>
            </thead>
            <tbody>  
<?php
extract($_POST);
$data = json_decode($dataJson,true);

  

// echo "<pre>";
// print_r($_SESSION['panier']);
// echo "<pre>";
if(isset ($_SESSION['panier']))
{ 
  if(count($_SESSION['panier']) == 0 ){

    echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
                       <h2>Total de films: (".count($_SESSION['panier']).")</h2>
                       </div>";
  }
}      

if (isset ($_SESSION['panier']) )
{ 

        $connection = new PDO('mysql:host=localhost;dbname=bdfilms_SPA','root','');

        foreach ($_SESSION['panier'] as $idFilm => $quantite) 
        {
            $select = $connection->prepare('select * from Film where PK_ID_Film = ? ');
            $select->bindValue(1,$idFilm);
            $select->execute();
            $films = $select->fetchAll();
?>
    <tr>
        <td><img src="../../img/<?php echo($films[0]['pochette'])?>" width=80 height=80></td>
        <td><?php echo  $films[0]['titre']; ?></td>
        <td>$ <?php echo  $films[0]['prix'];?></td>
        <td> <?php echo  $quantite;  ?></td>     
        <td>              
            <a 
            onClick="deleteItemPanier(<?php echo ($films[0]['PK_ID_Film']); ?>);"
            class="btn btn-outline-danger"          
            role="button">Supprimer
            </a>
        </td>                  
    </tr>  
<?php 
       } 
} 
?>
           </tbody>
          </table>
          <!-- FIN TABLE -->
      </div>
  </div>
