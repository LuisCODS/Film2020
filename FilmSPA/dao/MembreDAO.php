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
					$stmt->execute();//return 1 si ok
					
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

				//Send the updated Membre's ID to update a new session aswell
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
					//Récupère la prochaine ligne et la retourne en tant qu'objet
					$rs = $stmt->fetch(PDO::FETCH_OBJ); 
					//var_dump($rs);
					//print_r($rs->MDP_membre);

					//return TRUE if password and hash are equals, FALSE otherwise.
					if(password_verify($MDP_membre, $rs->MDP_membre)) 
					{    				
					    //Create an objet with the result and add it as a session
					    $membre = new Membre($rs->PK_ID_Membre,
											 $rs->nom,
											 $rs->prenom,
											 $rs->profil,
											 $rs->courriel,
											 $rs->MDP_membre,
											 $rs->tel_membre );	

						// //Create a session
						$_SESSION["membre"] = serialize($membre);

						//Gestion d'interface
						if ($rs->profil == "admin"){
							header("location: ../view/admin/index.php");
						}else{
							header("location: ../view/membre/index.php");
						}	
					} 
					else{	
					 	header("location: ../view/login/login.php");
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

		
		
	}//End class
?>