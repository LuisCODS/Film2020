<?php
session_start();
?>

  <!-- ROW 1 -->
  <div class="row mb-3">    
      <!--  COL 1 -->
      <div class="col-md-3">
          <h2><i class="fas fa-cart-arrow-down"></i>   Votre Panier</h2> 
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
$data = json_decode($dataJson);
// echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
//                       <h4>Total de films (".count($data).")</h4>
//                 </div>";

// echo "<pre>";
// print_r($_SESSION['panier']);
// echo "<pre>";
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
