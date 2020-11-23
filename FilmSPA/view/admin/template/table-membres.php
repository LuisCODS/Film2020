
<!-- TABLE -->
<div class="container">
      <div class="row mb-3">
      <!--  COL 1 -->
      <div class="col-md-12">
          <h2 > <i class="fas fa-film"></i>   Liste des Membres </h2> 
      </div>  
  </div> 

    <table class="table table-hover ">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>  
    <?php 
    	extract($_POST);
        // var_dump($chaine);
    	foreach (json_decode($chaine) as $list) {
    ?>
    	<tr>
    	    <td><?php echo $list->nom;    ?></td>
    	    <td><?php echo $list->prenom; ?></td>
    	    <td><?php echo $list->profil; ?></td>                                 
            <td>              
              <a class="btn btn-outline-danger" 
    	          href="../../controller/admin.php?delete=<?php echo ($list->PK_ID_Membre); ?>" 
    	          role="button">Supprimer</a>
            </td>  
    	 </tr>
    <?php
    	} 
    ?>
        </tbody>
    </table>
     <hr>
    <!-- FIN TABLE -->
</div>