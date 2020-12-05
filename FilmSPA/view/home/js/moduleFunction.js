
// ============================ GESTION VALIDATION ========================

//var REG_courriel = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
//var RegExp_Email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var formLogin = document.getElementById('formLogin');
var emailElement = document.getElementById('courriel');
var courriel = document.getElementById('courriel').value
var MDP_membre = document.getElementById('MDP_membre').value

 //  ECOUTE LA SOUMISSION DU FORM 
formLogin.addEventListener("submit", function(e) {
  //Block l'envoie du form
  e.preventDefault();

   if(isValidEmail(formLogin.courriel) && isValidPassword(formLogin.MDP_membre) ) 
      formLogin.submit();  	
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

 // VALIDATION CHAMPS VIDE   

// formLogin.btnLogin.addEventListener("click", function() {
// 	isVide();
// });
// const isVide = function(){

// 	if (!courriel || !MDP_membre)
// 	{
// 		$('#messageError').html(
// 		      "<div class='alert alert-danger text-center' id='danger-alert'><strong>Erreur ! </strong>Tous les champs sont requis</div>"
// 		);
// 		// cacher l'erreur apres 2 secondes
// 		$("#danger-alert").fadeTo(3000, 500).slideUp(500, function() {
// 		 	 $("#danger-alert").slideUp(500);
// 		});
// 		return false;
// 	}else{
// 		return true;
// 	}
// };
	


// ============================ GESTION FILM ========================

function listerFilmsCards()
{
	var action = 'action=listerCards';	
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data: action	
	}).done((jsonString)=>{
		$.ajax({
			method: "POST", 
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}


/*Affiche une liste de card  du film par categorie*/
function listerCategorie(categorie)
{
	var action = 'action=listerByCategorie&cat='+categorie;
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
	    data:action
	}).done((jsonString)=>{

		$.ajax({
			method: "POST", 
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		//Recoit le template
		}).done((template)=>{			
			$("#contenu").html(template);
			$('#totalCat').show();
			//setInterval(function(){document.getElementById("totalCat").style.display='none';}, 5000 );
		})
	});
}

// ============================ GESTION MEMBRE ========================

//Enregistrer un nouveau membre
function envoyerLogin(leForm){

	//alert($(leForm).serialize());
	//var leForm = document.getElementById('formLogin');

	$.ajax({
	   method: "POST",
	   url:"../../controller/loginController.php",
	   data:$(leForm).serialize(),
	   // dataType:'text',
	   success:function(reponse)
	   {
		 // alert(reponse); //test le type de retour de donnée
		  //document.getElementById("SucessCompte").innerHTML=reponse;
		  //Vide la msg apres 5 sec.
		  //setInterval(function(){ document.getElementById("emsg").innerHTML=""; }, 5000);
		},
	   error:function(err){
		 //Votre msgErrorEmail
	   },
	});
}










	