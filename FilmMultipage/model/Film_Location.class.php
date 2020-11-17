<?php

	Class Film_Location 
	{
		//array de film
		private $films = array();
		private $id_location;
		private $id_membre;

		// function __Construct($films, $id_location, $id_membre)
		// {
		// 	$this->films 	   = $films;
  //           $this->id_location  = $id_location;
  //           $this->id_membre  = $id_membre;
		// }

		function __Construct( $id_location, $id_membre)
		{
            $this->id_location  = $id_location;
            $this->id_membre  = $id_membre;
		}



		public function setArrayFilm($arrayDeFilms)
		{
			global $films;
			$size = count($arrayDeFilms);

              echo "<pre>";
		             //print_r($arrayDeFilms);
		           //  print_r($films);
		              //print_r(json_encode($arrayDeFilms));
              echo "</pre>";  
			
		}

		//  function getFilmID(){
		// 	return $this->films;
		// }
		// function setFilmID($films){
		// 	 $this->films = $films;
		// }
		function getLocationID(){
			return $this->id_location;
		}
		function setLocationID($id_location){
			 $this->id_location = $id_location;
		}
		function getMembreID(){
			return $this->id_membre;
		}
		function setMembreID($id_membre){
			 $this->id_membre = $id_membre;
		}


	}//fin class

