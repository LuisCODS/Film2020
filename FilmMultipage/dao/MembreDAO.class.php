<?php
include '../includes/Connection.class.php';
include '../model/membre.class.php';


Class MembreDAO 
{
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
						tel_membre,
						MDP_membre)
						values(?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);

				$stmt->bindValue(1, $m->getNom() );
				$stmt->bindValue(2, $m->getPrenom() );
				$stmt->bindValue(3, $m->getProfil() );
				$stmt->bindValue(4, $m->getCourriel() );
				$stmt->bindValue(5, $m->getTelMembre() );
				$stmt->bindValue(6, $m->getMdpMembre() );

				return $stmt->execute();//true /false

				unset($cn);//close  connexion
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


	function upDate(Membre $m)
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
		}
	}

	function delete($PK_ID_Membre)
	{
		try {
				$sql = 'delete  from membre where PK_ID_Membre = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $PK_ID_Membre);					
				return $stmt->execute();// true/False					
		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	function getMembre($courriel, $MDP_membre )
	{
		try {
			$sql = "select * from Membre WHERE courriel like'$courriel' AND MDP_membre like'$MDP_membre' ";			
			$stmt = $this->cn->prepare($sql);
			$stmt->execute();
			//return count($rs = $stmt->fetchall(PDO::FETCH_OBJ));
			$rs = $stmt->fetchall(PDO::FETCH_OBJ);// return 1 si ok
			return ($rs);	

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


}