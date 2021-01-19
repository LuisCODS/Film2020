<?php
session_start();
?>

<!-- =========================== HTML ZONE =========================== -->
  <!-- ROW 1 -->
  <div class="row mb-3">    
      <!--  COL 1 -->
      <div class="col-md-4">
          <h3>
            <i class="fas fa-cart-arrow-down"></i>   
            Total itens panier( <?php   
            if(isset ($_SESSION['panier'])){echo count($_SESSION['panier']); } ?>)
         </h3> 
      </div>  
      <!--  COL 2 -->
      <div class="col-md-5"></div> 
      <!--  COL 3 -->
      <div class="col-md-2" id="divTotalPanier">
           <a class="btn btn-outline-danger" onClick="viderPanier()" role="button">Vider panier</a>
      </div> 
  </div> 

<!-- ROW 2 -->
<div class="row" id="divTablePanier">
    <!--COL 1-->
    <div class="col-md-12">
        <!-- /////////////// TABLE /////////////// -->
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>Pochette</th>
                    <th>Titre</th>
                    <th>Prix Unité</th>
                    <th>Quantite</th>
                    <th>Total</th>
                    <th>ACTION</th>                                
                </tr>
            </thead>
            <tbody>  
<!-- =========================== HTML ZONE =========================== -->

<?php
extract($_POST);
// $data = json_decode($dataJson,true);
var_dump($_SESSION['panier']);

  $total = 0;
  $grandTotal = 0;

if (isset ($_SESSION['panier']) && count($_SESSION['panier']) != 0  )
{ 
        // CREATE CONNECTION
        $connection = new PDO('mysql:host=localhost;dbname=bdfilms_SPA','root','');
        
        //Parcour le panier et affiche certains données
        foreach ($_SESSION['panier'] as $idFilm => $quantite) 
        {
            $select = $connection->prepare('select * from Film where PK_ID_Film = ? ');
            $select->bindValue(1,$idFilm);
            $select->execute();
            $films = $select->fetchAll();
?>
    <tr>
        <td><img src="../../img/<?php echo($films[0]['pochette'])?>" width=80 height=80></td>
        <td><?php echo               $films[0]['titre']; ?></td>
        <td>$ <?php echo             $films[0]['prix'];?></td>
        <td> <?php echo  $quantite;  ?></td>  
        <td>$ <?php echo $quantite * $films[0]['prix']; ?></td>     
        <td>              
            <a 
            onClick="deleteItemPanier(<?php echo ($films[0]['PK_ID_Film']); ?>);"
            class="btn btn-outline-danger"          
            role="button">Supprimer
            </a>
        </td>                  
    </tr>  
         <?php $total =  $total + $quantite * $films[0]['prix']; ?>
<?php 
     
       }  // foreach

} 
else{
   echo  $inerHtml = "<div id='msnPanierVide' style='text-align:center' class='alert alert-warning' role='alert'>
                      <h2>Votre panier est vide!</h2>
                      </div>";
    echo"<script language='javascript'>
            document.getElementById('divTotalPanier').style.display='none';
            document.getElementById('recapitulatif').style.display='none';
            setInterval(function(){document.getElementById('msnPanierVide').style.display='none';}, 4000 ); 
       </script>
    ";
}
?>
           </tbody>
          </table>
          <!-- FIN TABLE -->
      </div>
  </div>

<div class="row mb-4" id="recapitulatif">
  <div class="col-md-2 ml-auto">
      <h4>Récapitulatif</h4>
      <?php
        $tvq = ($total * 9.975) / 100;
       $tps = ($total * 5) / 100;
        $grandTotal = $total + $tvq + $tps;
      ?>
      <p>
        Sous-Total:$ <?php echo $total; ?> <br />
        TVQ: $ <?php echo round($tvq,2); ?><br />
        TPS: $ <?php echo round($tps,2); ?>$<br />
        Total: $ <?php echo round($grandTotal,2); ?><br />
      </p>
  </div>
</div>