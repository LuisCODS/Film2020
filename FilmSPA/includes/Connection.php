<?php
	Class Connection
	{
		private $connection;

		function getConnection()
		{
			try	{
				  $this->connection = new PDO('mysql:host=localhost;dbname=bdfilms_SPA','root','');
				  $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} 
			catch(PDOException $e){
			    // echo $e->getMessage();
				echo 'Probleme de connection au serveur de bd '.$e;
				//exit();
			}
			return $this->connection;
		}	

	}//FIN CLASS

// class Connection{

// 	private $serveur;
// 	private $usager;
// 	private $motPasse;
// 	private $baseDonnees;
// 	private $connection;
	
// 	function __construct($serveur, $usager, $motPasse, $baseDonnees)
// 	{
// 		$this->serveur=$serveur;
// 		$this->usager=$usager;
// 		$this->motPasse=$motPasse;
// 		$this->baseDonnees=$baseDonnees;
// 	}
	
// 	function getconnection(){
// 		return $this->connection;
// 	}
	
// 	function connecter()
// 	{
// 	   try {
// 			  $dns = "mysql:host=$this->serveur;dbname=$this->baseDonnees";
// 			  $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
// 		  	  $this->connection = new PDO( $dns, $this->usager, $this->motPasse, $options );

// 		} catch ( Exception $e ) {
// 			//echo $e->getMessage();
// 			echo "Probleme de connection au serveur de bd";
// 			exit();
// 		}
// 	}
// }


?>