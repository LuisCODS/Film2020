

<div class="container">
  <!-- ROW 1 -->
  <div class="row mb-3">
      <!--  COL 1 -->
      <div class="col-md-3">
          <h2 > <i class="fas fa-film"></i>   Liste des Film </h2> 
      </div>  
      <!--  COL 2 -->
      <div class="col-md-6">

      </div> 
      <!--  COL 3 -->
      <div class="col-md-3">
            <a class="btn btn-outline-success" 
               href="../film/create.php" 
               role="button">Nouveau
            </a>
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
                      <th>Categorie</th>
                      <th>Realisateur</th>
                      <th>Action</th> 
                      <th></th>                                
                  </tr>
              </thead>
                  <tbody>  

<?php 
  extract($_POST);
    // var_dump($chaine);
  foreach (json_decode($chaine) as $ligne) {
?>
    <tr>
        <td><img src="../../img/<?php echo($ligne->pochette)?>" width=80 height=80></td>
        <td><?php echo($ligne->titre) ?></td>
        <td>$ <?php echo($ligne->prix)?></td>
        <td><?php echo($ligne->categorie)?></td>  
        <td><?php echo($ligne->realisateur)?></td>   
        <td>
          <a 
            class="btn btn-outline-primary " 
            href="../film/editer.php?id=<?php echo ($ligne->PK_ID_Film); ?>"
            role="button">Editer
          </a>                         
        </td>                              
        <td>              
          <a 
          class="btn btn-outline-danger " 
          href="../../controller/film.php?delete=<?php echo ($ligne->PK_ID_Film); ?>"
          role="button">Supprimer
          </a>
        </td>                         
    </tr>  
<?php
} 
?>
                  </tbody>
          </table>
          <!-- FIN TABLE -->
      </div>
  </div>
</div>