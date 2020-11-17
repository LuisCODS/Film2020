<?php

	define("USAGER","root");
	define("PASSE","");
	try {
	  $dns = 'mysql:host=localhost;dbname=bdfilms_spa';
	  $options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	  );
	  $connexion = new PDO( $dns, USAGER, PASSE, $options );
	} catch ( Exception $e ) {
	    //echo $e->getMessage();
		echo "Probleme de connexion au serveur de bd";
		exit();
	}




  // function getAllMovies($connexion)  
  // {
  //       $sql = 'select PK_ID_Film,titre,prix,realisateur,categorie,pochette,description from Film';
		// $stmt = $this->cn->prepare($sql);
		// $stmt->execute();
		// $rs = $stmt->fetch(PDO::FETCH_OBJ); 
		// return($rs);
  // }




?>