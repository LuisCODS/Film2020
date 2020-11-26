

function validerPassword()
{
	//GET FORM INPUTS
	var motUm   = formCreate.MDP_membre.value;
	var motDeux = formCreate.MDP_membreConfirm.value;
	//var nom     = formCreate.nom.value;
	var courriel= formCreate.courriel.value;
	//var prenom  = formCreate.prenom.value;

	
	// ========================= VALIDAION PASSWORD =========================

	//PASSWORD LIMITE
	if ( motUm.length != 4   &&  motUm != "" ) {
		//Show message error
		document.getElementById("erreurPassword").innerHTML="Le mot de passe doit contenir 4 chiffres!";
		return false;
	}else{
		//Clean message error
		document.getElementById("erreurPassword").innerHTML="";
	}	
	//PASSWORD COMPARE
	if (motUm != motDeux &&  motDeux != "" ) {
		document.getElementById("erreurPasswordConfirm").innerHTML="Mot de passe differents!";
		return false;
	}else{
		document.getElementById("erreurPasswordConfirm").innerHTML="";
	}	

}//end method
	


// ========================= VALIDATION EMAIL =========================

let  formCreate = document.getElementById('formCreate');
formCreate.courriel.addEventListener('change', function(){
	validerEmail(this);
});

const validerEmail = function(courriel)
{
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$','g');
	let tagSmall = document.getElementById("isValideCourriel");

	// If not true
	if (!emailRegExp.test(courriel.value)) 
	{	
		tagSmall.innerHTML="Courriel non valide!";
		tagSmall.classList.remove('text-success');
		tagSmall.classList.add('text-danger');
	}	
	else{
		tagSmall.innerHTML="Courriel valide";
		tagSmall.classList.remove('text-danger');	
		tagSmall.classList.add('text-success');	
	}
}


// ========================= VALIDATION TELEPHONE =========================

function validerTelephone(input_tel_membre)
{

	//let tel_lRegExp = new RegExp('\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*', 'g');
	//let tel_lRegExp = new RegExp('^D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*$');
	//let tel_lRegExp = new RegExp('^\d{3}-\d{3}-\d{4}$', 'gm');
	let tel_lRegExp = new RegExp('^\d{3}\d{3}\d{4}$', 'gm');

	let tagSmall_Tel = document.getElementById("isValidetTelephone");

	// If not true
	if (!tel_lRegExp.test(input_tel_membre) ) 
	{	
		tagSmall_Tel.innerHTML="Telephone non valide!";
		tagSmall_Tel.classList.remove('text-success');
		tagSmall_Tel.classList.add('text-danger');
	}	
	else{
		tagSmall_Tel.innerHTML="Telephone valide";
		tagSmall_Tel.classList.remove('text-danger');	
		tagSmall_Tel.classList.add('text-success');	
	}
		
}





