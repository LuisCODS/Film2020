<?php
session_start();
?>



<?php
extract($_POST);
$data = json_decode($dataJson);
// echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
//                       <h4>Total de films (".count($data).")</h4>
//                 </div>";

echo "<pre>";
print_r($_SESSION['panier']);
echo "<pre>";


if (isset ($_SESSION['panier']) )
{ 
    if(count($_SESSION['panier']) == 0)
    {
      echo "Votre panier est vide";
    }else{

        $connection = new PDO('mysql:host=localhost;dbname=bdfilms_SPA','root','');

        foreach ($_SESSION['panier'] as $idFilm => $quantite) 
        {
            $select = $connection->prepare('select * from Film where PK_ID_Film = ? ');
            $select->bindValue(1,$idFilm);
            $select->execute();
            $films = $select->fetchAll();

            echo  $films[0]['titre'];
            echo  $quantite."</br>";
        }
    }
}

 
  


 


   



