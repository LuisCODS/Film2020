<?php
include_once'../includes/Connection.php';

Class FilmDAO 
{
	private $cn;

	function __Construct()
	{
		$pdo = new Connection();
		$this->cn = $pdo->getConnection();
	}
 // ______________________________ CDRUD ___________________________

	function insert(Film $f)
	{		
		try {
			$sql = 'insert into Film 
					(titre,
					prix,
					realisateur,
					categorie,
					pochette,
					description,
					url)
					values(?,?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $f->getTitre() );
				$stmt->bindValue(2, $f->getPrix() );
				$stmt->bindValue(3, $f->getRealisateur() );
				$stmt->bindValue(4, $f->getCategorie() );
				$stmt->bindValue(5, $f->getPochette() );
				$stmt->bindValue(6, $f->getDescription() );
				$stmt->bindValue(7, $f->getUrl() );
				//echo $stmt->execute();// return 1 si ok
				 $stmt->execute();// return 1 si ok

			} catch (PDOException $e) {
				echo 'Erro: '. $e;
			}finally{
				unset($cn);//close  connexion
				unset($stmt);//clean memoire
			}
	}


	function update($titre,$prix,$realisateur,$categorie,$pochette,$description,$url,$PK_ID_Film)
	{
		try {
				$sql =  'update Film set
                        titre = ?,
						prix = ?,
						realisateur = ?,
						categorie = ?,
						pochette = ?,	
						description = ?,
						url = ?								
						where PK_ID_Film = ?';

				$stmt = $this->cn->prepare($sql);

				
				$stmt->bindValue(1, $titre );
				$stmt->bindValue(2, $prix );
				$stmt->bindValue(3, $realisateur);
				$stmt->bindValue(4, $categorie);
				$stmt->bindValue(5, $pochette );
				$stmt->bindValue(6, $description);
				$stmt->bindValue(7, $url);
				$stmt->bindValue(8, $PK_ID_Film);
				$stmt->execute();
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	//Return a select of films as json string
	function selectFilms()
	{
		
		try {

			$sql = 'select * FROM film';
			$stmt = $this->cn->prepare($sql);
			$stmt->execute();
			$rs = $stmt->fetchAll(PDO::FETCH_ASSOC); 
			return json_encode($rs);		
			//echo json_encode($rs);		

		} catch (Exception $e) {
			echo 'Erro: '. $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	/*
		La methode va chercher l'image reliée au film et la fournir à la methode (enleverFichier)
		étant que parmetre pour la suppresion de l'image.
		Ensuite, une autre appel est fait pour la suppresion du film lui même.
	*/
	function findById($id)
	{
		try {
				$sql = 'select * from Film where PK_ID_Film = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $id);					
				$stmt->execute();// true/False

				//Si existe une ligne
				if($ligne=$stmt->fetch(PDO::FETCH_OBJ))
				{
					//Delete image
					$this->enleverFichier("img",$ligne->pochette);
					//Delete film
					$this->delete($id);
				}

		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	/*Supprime une image dans le serveur*/
	private function enleverFichier($dossier,$pochette)
	{
		if($pochette!=="avatar.jpg")
		{
			$rmPoc="../$dossier/".$pochette;
			$tabFichiers = glob("../$dossier/*");
			//print_r($tabFichiers);
			// parcourir les fichier
			foreach($tabFichiers as $fichier)
			{
				if(is_file($fichier) && $fichier==trim($rmPoc))
				 {
					// enlever le fichier
					unlink($fichier);
					break;
				}
			}
		}
	}

	/*Recoit une ID et la supprime dans la BD*/
	private function delete($PK_ID_Film)
	{
		try {
				$sql = 'delete from Film where PK_ID_Film = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $PK_ID_Film);					
				//return $stmt->execute();// true/False
				$stmt->execute();// true/False
				unset($stmt);
								
		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}


	/*Return un film en json format*/
	function showFormEditer($id)
	{
		try {
				$sql = 'select * from Film where PK_ID_Film = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $id);					
				$stmt->execute();// true/False
				$rs = $stmt->fetchAll(PDO::FETCH_ASSOC); 
				echo json_encode($rs);

		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	function getFilm($id)
	{
		try {
				$sql = 'select * from Film where PK_ID_Film = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $id);					
				$stmt->execute();// true/False
				$rs = $stmt->fetch(PDO::FETCH_OBJ); 
				return($rs);

		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}

	/*Return une liste de film categorisé*/
	function getByCategorie($categorie)
	{
		try {
				$sql = 'select * from Film where categorie = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $categorie);					
				$stmt->execute();// true/False
				$rs = $stmt->fetchAll(PDO::FETCH_ASSOC); 
				return json_encode($rs);

		} catch (PDOException $e) {
			echo "Erro: ". $e;

		}finally{
			unset($cn);//close  connexion
			unset($stmt);//clean memoire
		}
	}



	/*Enregistre une image dans le serveur
	  Parms:
	  $dossier: chemin où se trouvent les images au serveur;
	  $inputNom: nom fichier envoyé par l'utilisateur;
	  $fichierDefaut: nom default;
	*/
	 function verserFichier($dossier, $inputNom, $fichierDefaut, $titre)
	{
		$cheminDossier="../$dossier/";
		$nomPochette=sha1($titre.time());
		$pochette=$fichierDefaut;

		//Si une img a été envoyée
		if($_FILES[$inputNom]['tmp_name']!=="")
		{
			//Le nom temporaire du fichier qui sera chargé sur le serveur.
			$tmp = $_FILES[$inputNom]['tmp_name'];
			$fichier= $_FILES[$inputNom]['name'];
			$extension=strrchr($fichier,'.');
			@move_uploaded_file($tmp,$cheminDossier.$nomPochette.$extension);
			// Enlever le fichier temporaire charg�
			@unlink($tmp); //effacer le fichier temporaire
			//Enlever l'ancienne pochette dans le cas de modifier
			$this->enleverFichier($dossier,$pochette);
			$pochette=$nomPochette.$extension;
		}
		return $pochette;
	}



}//FIN CLASS

 ?>