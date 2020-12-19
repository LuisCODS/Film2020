<?php
session_start();
?>



<?php
extract($_POST);
$data = json_decode($dataJson);


// echo "<pre>";
// print_r($_SESSION['panier']);
// echo "<pre>";


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


            echo  $films[0]['titre'];
            echo  $quantite."</br>";
        }
    }
}

 
  


 