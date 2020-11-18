<?php
session_start();
 include_once '../dao/MembreDAO.php';
 include_once '../model/Membre.php';

// =================== CONTROLEUR LOGIN =======================

//get all inputs form
extract($_POST);
$membreDAO = new MembreDAO();

//print_r($MDP_membre);//Test extract post
//print_r($courriel);//Test extract post

 switch($action)
 {
	case "login":
	   login($courriel, $MDP_membre);
	   break;

	case "logout":
		logout();
		break;
 }


  function login($courriel, $MDP_membre)
  { 
	  	global $membreDAO;
	  	$membre =  $membreDAO->select_One($courriel, $MDP_membre);
	  	//echo $membre;

		print_r($membre);

		//Si le membre existe
		// if ( ) 
		// {
		// 	return true;
		// }else{
		// 	return false;
		// }
  }

  function logout()
  { 
  		//alert("Login");
  }


//Evite de tricher le url
// if ( isset($_POST["action"])  &&  $_POST["action"] == "login")
// {
// 		//echo "test envois form";
// 		$requette="SELECT * FROM membre WHERE courriel=? AND MDP_membre=? ";
// 		$stmt = $connexion->prepare($requette);
// 		$stmt->execute(array($courriel, $MDP_membre));
// 		$user=$stmt->fetch(PDO::FETCH_OBJ);
// 		//echo $user->MDP_membre;  
// 		//print_r($user);

// 		//Le membre existe
// 		// if(!empty($user))
// 		if ($user == true) 
// 		{
// 			$membre = new Membre($user->PK_ID_Membre,$user->nom,$user->prenom,$user->profil,$user->courriel,$user->tel_membre,$user->MDP_membre);

// 			//CREE LA SESSION AVCE L'OBJET EDITÉ
// 			$_SESSION["membre"] = serialize($membre);

// 			//GESTION INTERFACE
// 			if ($user->profil == "admin"){
// 				header("location: ../view/admin/index.php");
// 			}else{
// 				header("location: ../view/membre/index.php");
// 			}			

// 		}else{

// 			//$_SESSION['loginErreur'] = "Courriel ou mot de passe invalide!"
// 			header("location: ../view/login/index.php");
// 		}

// }else{
// 	header("location: ../view/login/index.php");
// }

  ?>