

function validerForm()
{
	//GET FORM INPUTS
	var motUm   = formCreate.MDP_membre.value;
	var motDeux = formCreate.MDP_membreConfirm.value;
	var nom     = formCreate.nom.value;
	var courriel= formCreate.courriel.value;
	var prenom  = formCreate.prenom.value;

	//PASSWORD LIMITE

	if ( motUm.length != 4   &&  motUm != "" ) 
	{
		//Show message error
		document.getElementById("erreurPassword").innerHTML="Le mot de passe doit contenir 4 chiffres!";
		return false;
	}else{
		//Clean message error
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



}