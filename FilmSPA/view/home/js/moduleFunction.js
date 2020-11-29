// ============================ GESTION VALIDATION ========================
//Get form ref
const leForm = document.getElementById('formCreateNewUser');
//Get all inputs inside the form as array
const inputs = document.querySelectorAll('#leForm input');
//Cree les expressions
var REG_PASSWORD = /^[A-Za-z\d]{4}$/;
var REG_EMAIL = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

//console.log(leForm);

//Pour chaque input do ...
// inputs.forEach((input)=>{
// 	input.addEventListener('keyup', ()=>{
// 		console.log('Tecla pressionada');
// 	});
// });
// // Block form submit
// leForm.addEventListener('submit', (e)=>{
// 	e.preventDefault();
// });

// onSubmit="return valideForm();"
// function valideForm()
// {
// 	//alert("Input click ok");

// 	//Get form ref
//  	var leForm = document.getElementById('formCreateNewUser');
//  	//Get all inputs inside the form as array
//  	var inputs = document.querySelectorAll('#leForm input');

// 	var motUm   = leForm.MDP_membre.value;
// 	var motDeux = leForm.MDP_membreConfirm.value;
// 	var msg = document.getElementById("#msgEmail");

// 	//var REG_EMAIL = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
// 	var REG_PASSWORD = /^[A-Za-z\d]{4}$/;
// 	var REG_EMAIL = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

// 	//alert(motUm);
// 	//alert(inputs);

// }//end method

/*onkeydown="validerCourriel();"*/
function validerCourriel()
{
	var leForm = document.getElementById('formCreateNewUser');
	var courriel = document.getElementById('courriel').value;
	var MDP_membre = document.getElementById('MDP_membre').value;
	var msg = document.getElementById('msgEmail');
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	//alert(courriel.length);
	if (courriel.length >= 0) 
	{
		if(courriel.match(pattern)){				
			leForm.classList.add("valid");
			leForm.classList.remove("invalid");
			msg.innerHTML = "Email valide!";
			msg.style.color = "#009933";
			//return true;
			//leForm.submit();

		}else{
			leForm.classList.remove("valid");
			leForm.classList.add("invalid");
			msg.innerHTML = "Email invalide!";
			msg.style.color = "#ff0000";	
			//return false;	
		}		
	}	
}

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
			setInterval(function(){document.getElementById("totalCat").style.display='none';}, 5000 );
		})
	});
}


// ============================ GESTION MEMBRE ========================

// function showFormCreate()
// {
// 	$.ajax({
// 		method: "POST", 
// 		url:"template/formCreate.php",
// 	}).done((template)=>{
// 		$("#contenu").html(template);
// 	});
// }


//Enregistrer un nouveau membre
function envoyerEnreg(leForm){
	//alert(leForm);
	$.ajax({
	   type: "POST",
	   url:"../../controller/membreController.php",
	   data:$(leForm).serialize(),
	   // dataType:'text',
	   success:function(reponse)
	   {

		  //alert(reponse); //test le type de retour de donnée
		  //document.getElementById("SucessCompte").innerHTML=reponse;
		  //Vide la msg apres 5 sec.
		  //setInterval(function(){ document.getElementById("emsg").innerHTML=""; }, 5000);
		},
	   error:function(err){
		 //Votre message
	   },
	});
}
