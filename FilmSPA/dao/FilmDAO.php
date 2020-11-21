<?php
include_once'../includes/Connection.php';


Class FilmDAO 
{
	private $cn;

	function __Construct()	{
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
					description)
					values(?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);

				$stmt->bindValue(1, $f->getTitre() );
				$stmt->bindValue(2, $f->getPrix() );
				$stmt->bindValue(3, $f->getRealisateur() );
				$stmt->bindValue(4, $f->getCategorie() );
				$stmt->bindValue(5, $f->getPochette() );
				$stmt->bindValue(6, $f->getDescription() );
				$stmt->execute();
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


	function update(Film $f)
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

				
				$stmt->bindValue(1, $f->getTitre() );
				$stmt->bindValue(2, $f->getPrix() );
				$stmt->bindValue(3, $f->getRealisateur() );
				$stmt->bindValue(4, $f->getCategorie() );
				$stmt->bindValue(5, $f->getPochette() );
				$stmt->bindValue(6, $f->getDescription() );
				$stmt->bindValue(7, $f->getFilmID() );
				$stmt->bindValue(8, $f->getUrl() );
				$stmt->execute();
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	function delete($PK_ID_Film)
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
		}
	}

	//Return a select of films as json string
	function selectFilms()
	{
		global $cn;

			try {
				$sql = "SELECT * FROM film";
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

}

 