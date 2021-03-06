<div class="container" id="templateTableFilm">  
  <!-- ROW 1 -->
  <div class="row mb">  
  </div>
  <!-- ROW 2 -->
  <div class="row mb-3">    
      <!--  COL 1 -->
      <div class="col-md-3">
          <h2 > <i class="fas fa-film"></i>Liste des Films </h2> 
      </div>  
      <!--  COL 2 -->
      <div class="col-md-6">
      </div> 
      <!--  COL 3 -->
      <div class="col-md-3">
           <a class="btn btn-outline-success" 
              onClick="openFormCreate('templateTableFilm')"
               role="button">Nouveau
            </a>
      </div> 
  </div> 
  <!-- ROW 3 -->
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
  $array = json_decode($data);
  echo  $inerHtml = "<div id='totalCat' style='text-align:center' class='alert alert-info' role='alert'>
                        <h4>Total de films (".count($array).")</h4>
                  </div>";
  foreach ($array as $ligne) {
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
             onClick="showFormEditer(<?php echo ($ligne->PK_ID_Film); ?>);"
            role="button">Editer
          </a>                         
        </td>                              
        <td>              
          <a 
          onClick="supprimerFilm(<?php echo ($ligne->PK_ID_Film); ?>);"
          class="btn btn-outline-danger"          
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