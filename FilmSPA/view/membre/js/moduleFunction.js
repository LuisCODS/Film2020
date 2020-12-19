
// ========================= VALIDATION TELEPHONE =========================
// onClick="validerTelephone();"
// function validerFormEditer()
// {
// 	//let tel_lRegExp = new RegExp('^\d{3}-\d{3}-\d{4}$', 'gm');
// 	//let tel_lRegExp = new RegExp('[0-9]{3}[-][0-9]{3}[-][0-9]{4}', 'gm');
// 	let tel_lRegExp = new RegExp('[0-9]{3}-[0-9]{3}-[0-9]{4}');

// 	let errorMsgTel = document.getElementById("isValidetTelephone");
// 	let tel_membre = document.getElementById("tel_membre");

// 	if (tel_membre.value.length != "") {

// 		//Error
// 		if (!tel_lRegExp.test(tel_membre.value)) 
// 		{	
// 			errorMsgTel.innerHTML="Telephone non valide!";
// 			errorMsgTel.classList.remove('text-success');
// 			errorMsgTel.classList.add('text-danger');
// 			return false;
// 		}	
// 		//ok
// 		else{
// 			errorMsgTel.innerHTML="Telephone valide";
// 			errorMsgTel.classList.remove('text-danger');	
// 			errorMsgTel.classList.add('text-success');
// 			return true;	
// 		}		
// 	}else{
// 		return false;
// 	}
// }


// ============================ GESTION MEMBRE ========================

function editerMembre(leForm)
{
	//var formImputs = new FormData(document.getElementById('formEditer'));
		$.ajax({
		   type: "POST",
		   url:"../../controller/membreController.php",
		   data:$(leForm).serialize(),
		   // dataType:'text',
		   success:function(reponse)
		   {
			  //alert(reponse); //test le type de retour de donnée
			  $("#msgEditeSucess").show();
			  //document.getElementById("msgEditeSucess").innerHTML= "<b>Sucess!</b> Donnes mis à jour!reponse";
			  //Vide la msg apres 5 sec.
			  //setInterval(function(){ document.getElementById("emsg").innerHTML=""; }, 5000);
			},
		   error:function(err){
			 //Votre msgErrorEmail
		   },
		});		
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
		//alert(jsonString);
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


// ============================ GESTION PANIER ========================

function displayPanier()
{
	$('#divFormEditer').hide();

	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data:{
			action: "select", 
		},
		 // contentType: false,
		 // processData:false,
		 // dataType:'text',
	}).done((mesFilms)=>{	
		
		//alert(mesFilms);

		$.ajax({
			method: "POST", 
			url:"../membre/template/dashbordPanier.php",
			data:"dataJson="+mesFilms
		}).done((template)=>{
			$('#contenu').html(template);
		})
	});
}


//Saisie l'ID du film au moment du click du bouton "ajouter au panier"
function ajouterAuPanier(id)
{
	//var formImputs = new FormData(document.getElementById('formBtnPanier'));	
	//var action = "action=ajouterAuPanier";

	//alert($(form).serialize());

	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data:{
			action: "ajouterAuPanier", 
			idFilm: id,
		},
		// contentType: false,
		// processData:false,
		// dataType:'json'
	}).done((filmJson)=>{	
		
		//alert(filmJson);
		$.ajax({
			method: "POST", 
			url:"../membre/template/panier.php",
			data: "dataJson="+filmJson
		});

	});
}

//Get ID from button supprimer from template/table-films.php
// function deleteItemPanier(id)
// {
// 	// var action = 'action=deleteFromPanier';
// 	 //var idFilm = 'idFilm='+id;
// 	alert(id);

// 	$.ajax({
// 		method: "POST", 
// 		url:"../membre/template/deleteItemPanier.php",
// 		data:'idFilm='+id

// 	}).done((template)=>{
// 		$('#contenu').html(template);
// 	})
// }


// ============================ GESTION LOGIN ========================
//Ca marche pas 
function logout()
{
	 window.location = "../login/logout.php";
}
