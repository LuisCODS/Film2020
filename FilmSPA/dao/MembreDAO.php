<?php
include_once'../includes/Connection.php';

	Class MembreDAO 
	{

		/*GLOBAL*/
		private $cn;

		function __Construct()
		{
			$pdo = new Connection();
			$this->cn = $pdo->getConnection();
		}

	// ______________________________ CDRUD ___________________________

		function insert(Membre $m)
		{
			try {
					$sql = 'insert into Membre 
							(nom,
							prenom,
							profil,
							courriel,							
							MDP_membre)
							values(?,?,?,?,?)';

					$stmt = $this->cn->prepare($sql);

					$stmt->bindValue(1, $m->getNom() );
					$stmt->bindValue(2, $m->getPrenom() );
					$stmt->bindValue(3, $m->getProfil() );
					$stmt->bindValue(4, $m->getCourriel() );
					$stmt->bindValue(5, $m->getMdpMembre() );

					return $stmt->execute();//return 1

			} catch (PDOException $e) {
				echo 'Erro: '. $e;
			}finally{
				unset($cn);//close  connexion
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

					$stmt = $this->cn->prepare($sql);

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
				unset($cn);
				unset($stmt);
			}
		}

		function delete($id)
		{			
			try {
					$sql = 'delete from Membre 
							where PK_ID_Membre = ? ';
					$stmt = $this->cn->prepare($sql);
					$stmt->bindValue(1, $id);
					return $stmt->execute();	

			} catch (PDOException $e) {
				echo "Erro: ". $e;
			}finally{
				unset($cn);
				unset($stmt);
			}
		}

		function select_All()
		{
			//global $cn;

			try {
				$sql = "SELECT * FROM membre";
				$stmt = $this->cn->prepare($sql);
				$stmt->execute();
				$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);  
				return $rs;		

			} catch (Exception $e) {
				echo 'Erro: '. $e;

			}finally{
				unset($cn);//close  connexion
				unset($stmt);//clean memoire
			}
		}

		// function select_One($input)
		// {
		// 	$sql = "select * from Membre
		// 		    WHERE nom like '%$input%'  
		// 		    ORDER BY nom ASC  ";

		// 	$stmt = $this->cn->prepare($sql);
		// 	$stmt->execute();
		// 	$rs = $stmt->fetchall(PDO::FETCH_ASSOC);  			
		// 	 return json_encode($rs);//Retourn un json
		// }

		function select_One($courriel, $MDP_membre)
		{
			global $cn;

			try {
				$sql="SELECT * FROM membre WHERE courriel=? AND MDP_membre=? ";
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $courriel );
				$stmt->bindValue(2, $MDP_membre);
				$stmt->execute();
				$rs = $stmt->fetch(PDO::FETCH_OBJ);  
				//print_r($rs);

				return $rs;	

			} catch (Exception $e) {
				echo 'Erro: '. $e;

			}finally{
				unset($cn);//close  connexion
				unset($stmt);//clean memoire
			}

		}

		
		
	}//End class
?>