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
				echo 'Probleme de connexion au serveur de bd '.$e;
				//exit();
			}
			return $this->connection;
		}		
	}//FIN CLASS
?>