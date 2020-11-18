

function validerForm( )
{
	//GET FORM INPUTS
	var motUm   = formCreate.MDP_membre.value;
	var motDeux = formCreate.MDP_membreConfirm.value;
	var nom     = formCreate.nom.value;
	var prenom  = formCreate.prenom.value;
	var courriel  = formCreate.courriel.value;


	//PASSWORD LIMITE 4

	if ( motUm.length != 4   &&  motUm != "" ) 
	{
		document.getElementById("erreurPassword").innerHTML="Le mot de passe doit contenir 4 chiffres!";
		return false;
	}else{
		document.getElementById("erreurPassword").innerHTML="";
	}	

	//PASSWORD COMPARE

	if (motUm != motDeux &&  motDeux != "" ) 
	{
		document.getElementById("erreurPasswordConfirm").innerHTML="Mot de passe differents!";
		return false;

	}else{
		document.getElementById("erreurPasswordConfirm").innerHTML="";
	}	

	//INPUT NOM ET PRENOM
	if (nom == "" ) 
	{
		document.getElementById("erreurNom").innerHTML="Required fild!";
		return false;

	}else{
		document.getElementById("erreurNom").innerHTML="";
	}	




}//fin if