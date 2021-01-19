
// Things that should be done every time a page loads
$(()=>{
/*	listerFilmsCards();
	 document.getElementById("jumbotron").style.display='none';
	 document.getElementById("dviFormCreateUser").style.display='none';*/
});





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

// function displayPanier()
// {
// 	$('#divFormEditer').hide();

// 	$.ajax({
// 		method: "POST", 
// 		url:"../../controller/filmController.php",
// 		data:{
// 			action: "select", 
// 		},
// 		 // contentType: false,
// 		 // processData:false,
// 		 // dataType:'text',
// 	}).done((jasonFilms)=>{	
		
// 		//alert(jasonFilms);
// 		$.ajax({
// 			method: "POST", 
// 			url:"../membre/template/dashbordPanier.php",
// 			//data:"dataJson="+jasonFilms
// 		}).done((template)=>{
// 			$('#contenu').html(template);
// 		})
// 	});
// }
function displayPanier()
{
	$('#divFormEditer').hide();

		//alert(jasonFilms);
		$.ajax({
			method: "POST", 
			url:"../membre/template/dashbordPanier.php",
			//data:"dataJson="+jasonFilms
		}).done((template)=>{
			$('#contenu').html(template);
		});
}

function viderPanier()
{
	// //$('#contenu').hide();
	// // Removendo um nó a partir do pai
	// var node = document.getElementById("contenu");
	// if (node.parentNode) {
	//   node.parentNode.removeChild(node);
	// }
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
