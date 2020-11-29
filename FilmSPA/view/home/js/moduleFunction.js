function validerInputsForm(leForm)
{
	//GET FORM INPUTS
	var motUm   = leForm.MDP_membre.value;
	var motDeux = leForm.MDP_membreConfirm.value;
	var courriel= leForm.courriel.value;
	var msg = document.getElementById("msgEmail");
	

	//var REG_EMAIL = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	var REG_PASSWORD = /^[A-Za-z\d]{4}$/;
	var REG_EMAIL = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

    // VALIDATION EMAIL
	if(courriel.test(REG_EMAIL))
	{		
		leForm.classList.add("valid");
		leForm.classList.remove("invalid");
		msg.innerHTML="Email valide!";
		msg.style.color = "#009933";
		return true;

	}else{
		leForm.classList.remove("valid");
		leForm.classList.add("invalid");
		msg.innerHTML = "Email invalide!";
		msg.style.color = "#ff0000";	
		return false;	
	}		

}//end method

function listerFilmsCards()
{
	var action = 'action=listerCards';	
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data: action	
	}).done((jsonString)=>{
		//console.log(jsonString);

		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		//Recoit le template
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}

function listerCategorie(categorie)
{
	//var action = 'action=listerByCategorie';
	var form = new FormData();
	form.append('action','listerByCategorie');	
	form.append('cat','categorie');	


	//var categorie = 'categorie='+categorie;	
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
	    data:$( form ).serialize()

	}).done((jsonString)=>{

		alert(jsonString);
		//Va creer le template
		// $.ajax({
		// 	method: "POST", 
		// 	url:"../film/template/card-film.php",
		// 	data: "chaine="+jsonString
		// //Recoit le template
		// }).done((template)=>{
		// 	$("#contenu").html(template);
		// })
	});
}

function showFormCreate(){

	//Cache la div create film
	  //$("#divFormFilm").hide();

	$.ajax({
		method: "POST", 
		url:"template/formCreate.php",
	
	}).done((template)=>{
		$("#contenu").html(template);
		//rendreInvisible(contenu);
	});
}

//Enregistrer un nouveau membre
// function envoyerEnreg(leForm){
// 	$.ajax({
// 	   type: "POST",
// 	   url: "PHP/livresControleur.php",
// 	   data:$( leForm ).serialize(),
// 	   dataType:'text',
// 	   success:function(reponse)
// 	   {
// 		  //alert(reponse); //test le type de retour de donnée
// 		  document.getElementById("emsg").innerHTML=reponse;
// 		  //Vide la msg apres 5 sec.
// 		  setInterval(function(){ document.getElementById("emsg").innerHTML=""; }, 5000);
// 		},
// 	   error:function(err){
// 		 //Votre message
// 	   },
// 	});
// }



// const validerEmail = function(inputEmail)
// {
// 	let REG_EMAIL = new RegExp('^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g');
// 	//console.log(testCouriel);
// 	let tagSmall = document.getElementById("isValideCourriel");

// 	// If not true
// 	if (!REG_EMAIL.test(inputEmail.value)) 
// 	{	

// 		tagSmall.innerHTML="Courriel non valide!";
// 		tagSmall.classList.remove('text-success');
// 		tagSmall.classList.add('text-danger');
// 	}	
// 	else{
// 		tagSmall.innerHTML="Courriel valide";
// 		tagSmall.classList.remove('text-danger');	
// 		tagSmall.classList.add('text-success');	
// 	}
// }

// ========================= VALIDATION EMAIL =========================
// function validerEmail()
// {
// 	var formLogin = document.getElementById('leForm');
// 	var courriel = document.getElementById('courriel').value;
// 	//var MDP_membre = document.getElementById('MDP_membre').value;
// 	var msg = document.getElementById('msgErrorEmail');
// 	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

// 	if (courriel != "") 
// 	{
// 		if(courriel.match(pattern) && courriel != "" ){		
// 			//formLogin.submit();
// 			formLogin.classList.add("valid");
// 			formLogin.classList.remove("invalid");
// 			msg.innerHTML = "Email valide!";
// 			msg.style.color = "#009933";

// 		}else{
// 			formLogin.classList.remove("valid");
// 			formLogin.classList.add("invalid");
// 			msg.innerHTML = "Email invalide!";
// 			msg.style.color = "#ff0000";		
// 		}		
// 	}
	
// }