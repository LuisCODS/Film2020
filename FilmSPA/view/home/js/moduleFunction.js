// ============================ GESTION VALIDATION ========================

//Les expressions
var REG_MDP_membre = /^[A-Za-z\d]{4}$/;
var REG_courriel = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


function valideForm(leForm) 
{    
	var courriel = leForm.courriel.value;
	var MDP_membre = leForm.MDP_membre.value;
	 //const leForm = $("#formLogin");

	//IF EMPTY FIELDS
	if (!courriel || !MDP_membre)
	{
		$('#message').html(
		      "<div class='alert alert-danger text-center' id='danger-alert'><strong>Erreur ! </strong>Tous les Champs sont Requis</div>"
		);
		// cacher l'erreur apres 5 secondes
		$("#danger-alert").fadeTo(4000, 500).slideUp(500, function() {
		  $("#danger-alert").slideUp(500);
		});
		return false;
	}

 	//VALIDATION Regular Expressions
	if (courriel.match(mailformat)){
	 	 return true;
	}else{
		$('#messageCourriel').html("Courriel invalide!");
		$("#messageCourriel").css("color", "red");
	  	return false;
	}


}//End function
  

// var courriel = $("#courriel").val();

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
function envoyerEnreg(leForm){
	alert(leForm);
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
		 //Votre msgErrorEmail
	   },
	});
}
