

// ============================ GESTION VALIDATION ========================

var formLogin = document.getElementById('formLogin');
var emailElement = document.getElementById('courriel');
var courriel = document.getElementById('courriel').value
var MDP_membre = document.getElementById('MDP_membre').value

 //  ECOUTE LA SOUMISSION DU FORM 
formLogin.addEventListener("submit", function(e) {
	  //Block l'envoie du form
	  e.preventDefault();
  	// if (formLogin.courriel.lenght > 0 && formLogin.MDP_membre.lenght > 0 ) {
	   if(isValidEmail(formLogin.courriel) && isValidPassword(formLogin.MDP_membre) ) 
	      formLogin.submit(); 
	      //envoyerLogin(formLogin);
  	//}
});

 //VALIDATION COURRIEL  

//Ecoute l'evenement du courriel
formLogin.courriel.addEventListener("change", function() {

	isValidEmail(this);
});
//Cette constante recoit de la fonction, soit true/false
const isValidEmail = function(inputEmail){
	//Creation expression reguliere
	var RegExp_Email = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	var tagMsg = document.getElementById('messageCourriel');
	if(inputEmail.value.match(RegExp_Email) )
	{		
		formLogin.classList.add("valid");
		formLogin.classList.remove("invalid");
		tagMsg.innerHTML = "Email valide!";
		tagMsg.style.color = "#009933";
		return true;
	}else{
		formLogin.classList.remove("valid");
		formLogin.classList.add("invalid");
		tagMsg.innerHTML = "Email invalide!";
		tagMsg.style.color = "#ff0000";	
		return false;	
	}
};

 //  VALIDATION PASSWORD   

//Ecoute l'evenement du password
formLogin.MDP_membre.addEventListener("change", function() {

	isValidPassword(this);
});
const isValidPassword = function(inputPassword){

	var RegExp_PassWord = /^[A-Za-z\d]{4}$/;
	var tagMsg = document.getElementById('messagePassword');
	if(inputPassword.value.match(RegExp_PassWord) )
	{		
		formLogin.classList.add("valid");
		formLogin.classList.remove("invalid");
		tagMsg.innerHTML = "Mot de passe valide!";
		tagMsg.style.color = "#009933";
		return true;
	}else{
		formLogin.classList.remove("valid");
		formLogin.classList.add("invalid");
		tagMsg.innerHTML = "Mot de passe invalide!";
		tagMsg.style.color = "#ff0000";	
		return false;	
	}
};


