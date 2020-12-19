<?php
session_start();
?>

<!-- =========================== HTML ZONE =========================== -->
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
      <div class="col-md-3" id="divTotalPanier">
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
<!-- =========================== HTML ZONE =========================== -->

<?php
extract($_POST);
$data = json_decode($dataJson,true);

if (isset ($_SESSION['panier']) && count($_SESSION['panier']) != 0  )
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
     
       }  // foreach

} //if
else{
   echo  $inerHtml = "<div id='panierVide' style='text-align:center' class='alert alert-info' role='alert'>
                      <h2>Votre panier est vide!</h2>
                      </div>";
    echo"<script language='javascript'>
            document.getElementById('divTotalPanier').style.display='none';
            setInterval(function(){document.getElementById('panierVide').style.display='none';}, 4000 ); 
       </script>
    ";
}
?>
           </tbody>
          </table>
          <!-- FIN TABLE -->
      </div>
  </div>