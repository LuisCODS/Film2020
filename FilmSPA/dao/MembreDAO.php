<?php
include_once'../includes/Connection.class.php';

	Class MembreDAO 
	{

		/*GLOBAL*/
		private $connection;

		function __Construct()
		{
			$pdo = new Connection();
			$this->connection = $pdo->getConnection();
		}

	// ______________________________ CDRUD ___________________________

		function insert(Membre $membre)
		{
			try {
					$sql = 'insert into Membre 
							(nom,
							prenom,
							profil,
							courriel,
							tel_membre,
							MDP_membre)
							values(?,?,?,?,?,?)';

					$stmt = $this->connection->prepare($sql);

					$stmt->bindValue(1, $m->getNom() );
					$stmt->bindValue(2, $m->getPrenom() );
					$stmt->bindValue(3, $m->getProfil() );
					$stmt->bindValue(4, $m->getCourriel() );
					$stmt->bindValue(5, $m->getTelMembre() );
					$stmt->bindValue(6, $m->getMdpMembre() );

					return $stmt->execute();

			} catch (PDOException $e) {
				echo 'Erro: '. $e;
			}finally{
				unset($connection);//close  connexion
				unset($stmt);//clean memoire
			}
		}

		function update(Membre $membre)
		{
			try {
				   $sql =  'update Membre set
							nom = ?,
							prenom = ?,
							profil = ?,
							courriel = ?,
							tel_membre = ?,	
							MDP_membre = ?	
							where PK_ID_Membre = ?';

					$stmt = $this->connection->prepare($sql);

					$stmt->bindValue(1, $m->getNom() );
					$stmt->bindValue(2, $m->getPrenom() );
					$stmt->bindValue(3, $m->getProfil() );
					$stmt->bindValue(4, $m->getCourriel() );
					$stmt->bindValue(5, $m->getTelMembre() );
					$stmt->bindValue(6, $m->getMdpMembre() );
					$stmt->bindValue(7, $m->getMembreID() );

					return $stmt->execute();

			} catch (PDOException $e) {
				echo "Erro: ". $e;
			}finally{
				unset($connection);
				unset($stmt);
			}
		}

		function delete($id)
		{			
			try {
					$sql = 'delete from Membre 
							where PK_ID_Membre = ? ';
					$stmt = $this->connection->prepare($sql);
					$stmt->bindValue(1, $id);
					return $stmt->execute();	

			} catch (PDOException $e) {
				echo "Erro: ". $e;
			}finally{
				unset($connection);
				unset($stmt);
			}
		}

		function select($input)
		{
			$sql = "select * from Membre
				    WHERE nom like '%$input%'  
				    ORDER BY nom ASC  ";

			$stmt = $this->connection->prepare($sql);
			$stmt->execute();
			$rs = $stmt->fetchall(PDO::FETCH_ASSOC);  			
			 return json_encode($rs);//Retourn un json
		}
		
		
	}//End class
?>