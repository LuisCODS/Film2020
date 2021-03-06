<?php
include_once'../includes/Connection.php';
include_once '../model/Membre.php';

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

	//Create a new objet and return son ID
	function insert(Membre $m)
	{
		global $cn;
		try {
				$sql = 'insert into Membre 
						(nom,prenom,profil,courriel,MDP_membre,tel_membre)
						values(?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $m->getNom() );
				$stmt->bindValue(2, $m->getPrenom() );
				$stmt->bindValue(3, $m->getProfil() );
				$stmt->bindValue(4, $m->getCourriel() );
				$stmt->bindValue(5, $m->getTelMembre() );
				$stmt->bindValue(6, $m->getMdpMembre() );
				$stmt->execute(); // return true /false
				
				//Return last ID added
				return $LAST_ID  = $this->cn->lastInsertId(); 

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	function update(Membre $m)
	{
		global $cn;
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
			    $stmt->execute(); // si ok return 1

			//Send the updated Membre's ID to update a new session 
			$this->createSession($m->getMembreID());	

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

	/*Return a select of all membres as a json string*/
	function selectMembres()
	{
		global $cn;

		try {
			$sql = "select * FROM membre";
			$stmt = $this->cn->prepare($sql);
			$stmt->execute();
			$rs = $stmt->fetchAll(PDO::FETCH_ASSOC); 
			return json_encode($rs);		

		} catch (Exception $e) {
			echo 'Erro: '. $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	/*
	 Verifie dans la bd si un courriel et password existent.
	 Retourn true ou false.
	*/
	function validerLogin($courriel,$MDP_membre)
	{
		global $cn;

		try {
				//VERIFIE SI LE COURRIEL EXISTE
				$sql="SELECT * FROM membre WHERE courriel=? ";
				$stmt  = $this->cn->prepare($sql);
			   	$stmt->execute(array($courriel)); 
				$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);//return false si pas d'objet

				//SI COURRIEL ET PASSWORD VALIDES
				if( count($rs) == 1 && password_verify($MDP_membre, $rs[0]["MDP_membre"]) == 1 )
				{
					return "true";							 			
				}else{
					//header("location: ../view/home/index.php");	
					return "false";	
				}
		} catch (Exception $e) {
			echo 'Erro: '. $e;
		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	//Create a session with an objet serialize
	function createSession($id)
	{
		global $cn;

		try {
			$sql="SELECT * FROM membre WHERE  PK_ID_Membre = ? ";
			$stmt = $this->cn->prepare($sql);
			$stmt->bindValue(1, $id );
			$stmt->execute();
			$rs = $stmt->fetch(PDO::FETCH_OBJ);  
			//print_r($rs);
			//return $rs;	

			//Create an objet with the result and add it as a session
			$membre = new Membre($rs->PK_ID_Membre,
								 $rs->nom,
								 $rs->prenom,
								 $rs->profil,
								 $rs->courriel,
								 $rs->MDP_membre,
								 $rs->tel_membre );	

			//Create a session
			$_SESSION["membre"] = serialize($membre);
			header('Location: ../view/membre/index.php');	

		} catch (Exception $e) {
			echo 'Erro: '. $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}

	}

	/*
		Cherche dans la BD un membre pour comparer les password.
		Si ok, redirectionne le membre à sa page d'accueil avec 
		une session. Si pas ok,  reste dans la page login.
	*/
	function login($courriel,$MDP_membre)
	{
		global $cn;

		try {
				
				$sql="SELECT * FROM membre WHERE courriel=? ";
				$stmt = $this->cn->prepare($sql);
				$stmt->execute(array($courriel));
				$rs = $stmt->fetch(PDO::FETCH_OBJ); 

				//return TRUE if password and hash are equals, FALSE otherwise.
				 if(password_verify($MDP_membre, $rs->MDP_membre)) 
				 {    				
				    //Create an objet with the result and add it to a session
				    $membre = new Membre($rs->PK_ID_Membre,
										 $rs->nom,
										 $rs->prenom,
										 $rs->profil,
										 $rs->courriel,
										 $rs->MDP_membre,
										 $rs->tel_membre );	

					 //Create a session
				 	$_SESSION["membre"] = serialize($membre);

					//Gestion d'interface
					if ($rs->profil == "admin"){
						header("location: ../view/admin/index.php");
					}else{
						header("location: ../view/membre/index.php");
					}	
				}else{
					//return "Mot de passe invalide!";
					header("location: ../view/home/index.php");
				}	

		} catch (Exception $e) {
			echo 'Erro: '. $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}

	}

	/*
	 Verifie dans la bd si un courriel existe deja.
	 Retourn true ou false.
	*/
	function existeDeja($courriel)
	{
		global $cn;

		try {
				//VERIFIE SI LE COURRIEL EXISTE
				$sql="SELECT * FROM membre WHERE courriel=? ";
				$stmt  = $this->cn->prepare($sql);
			   	$stmt->execute(array($courriel)); 
				$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);//return false si pas d'objet

				//SI COURRIEL ET PASSWORD VALIDES
				if( count($rs) == 1 )
				{
					return true;							 			
				}else{
					return false;	
				}
		} catch (Exception $e) {
			echo 'Erro: '. $e;
		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}




	
	
}//End class
?>