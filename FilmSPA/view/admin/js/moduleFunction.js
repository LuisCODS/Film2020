function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
  document.getElementById(elem).style.display='none';
}

function literMembres()
{
	//alert("Teste");
	var action = 'action=select';
	$.ajax({
		method: "POST", 
		url:"../../controller/membreController.php",
		data: action	
	}).done((jsonString)=>{
	   //alert(jsonString);	
		/*
			Fait une nouvelle requisition pour envoyer les données json(chaine de string)
			au dossier template(table-membre.php) qui va parcourrir la chaine json et creer 
			une table remplie en retour.
		*/
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-membres.php",
			data: "chaine="+jsonString	
		}).done((template)=>{
			//alert(template);
			//Attache le contenu dans la div avec l'ID (contenu)
			$("#contenu").html(template);
			//$("#contenu").hide();
		})
	});	
}

function showDashboard(){

	//Cache la div create film
	  $("#divFormFilm").hide();

	$.ajax({
		method: "POST", 
		url:"template/dashboard.php",
	
	}).done((template)=>{
		//Attache le contenu dans la div avec l'ID (contenu)
		$("#contenu").html(template);
		//rendreInvisible(contenu);
	});
}

function listerFilms()
{
	var action = 'action=select';
	//console.log(action);
	
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data: action	

	}).done((jsonString)=>{
		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-films.php",
			data:{
				data: jsonString
			}

		//Recoit le template
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}

/* 
  Hide template table Film.
  Show display form to create a new movie.
 */
function openFormCreate(elem){
	//alert("Test Callback");
	  //Cache table list film
	  rendreInvisible(elem);
	  //Display form
	  $("#divFormFilm").show();
}

function enregistrerFilm()
{
	//Show  form Create film
	document.getElementById("divFormFilm").style.display='block';

	var formImputs = new FormData(document.getElementById('formEnreg'));
	//var action = 'action=select';
	
	$.ajax({

			method: "POST", 
			url:"../../controller/filmController.php",
			data: formImputs,
			//dataType : 'json',
			contentType: false,
			processData:false,

	}).done((output)=>{
		//alert("ok");
 		listerFilms();//Call this one to refresh page
 		$('#divFormFilm').hide();
		document.getElementById("divMsg").style.display='block';
		document.getElementById("emsg").innerHTML = "Film bien enregistre!";		
		setInterval(function(){document.getElementById("divMsg").style.display='none';}, 5000 );
	});

	return false;
}


//Get ID from button supprimer from template/table-films.php
function supprimerFilm(id)
{
	//alert(id);//get id ok
	var action = 'action=delete';
	var idFilm = 'idFilm='+id;
	
	$.ajax({

		method: "POST", 
		url:"../../controller/filmController.php",
		data: action+'&'+idFilm
		
	}).done(()=>{
		 listerFilms();//Call this one to refresh page
		 document.getElementById("divMsg").style.display='block';
		 document.getElementById("emsg").innerHTML = "Film bien supprimé!";		
		 setInterval(function(){document.getElementById("divMsg").style.display='none';}, 5000 ); 

	 });
}


function modifierFilm(id)
{
	//alert(id);//get id ok
	var action = 'action=update';
	var idFilm = 'idFilm='+id;
	
	$.ajax({

		method: "POST", 
		url:"../../controller/filmController.php",
		data: action+'&'+idFilm
		
	}).done((jsonString)=>{
		
		//alert(jsonString);

		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"../film/template/formEditFilm.php",
			data: "data="+jsonString
		//Recoit le template
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}

// function lister(reponse){
// 	var taille;
// 	var rep="<div class='table-users' style='overflow: scroll; height: 500px;'>";
// 	rep+="<div class='header'>Liste des films<span style='float:right;padding-right:10px;cursor:pointer;' onClick=\"$('#contenu').hide();\">X</span></div>";
// 	rep+="<table cellspacing='0'>";
// 	rep+="<tr><th>POCHETTE</th><th>TITRE</th><th>CATEGORIE</th><th>REALISATEUR</th><th>ACTION</th></tr>";
// 	taille=listFilms.length;
// 	for(var i=0; i<taille; i++){
// 		rep+="</td><td><img src='img/"+listFilms[i].pochette+"' width=80 height=80></td></tr>"+"</td><td>"+listFilms[i].titre+"</td><td>"+listFilms[i].prix+"</td><td>"+listFilms[i].realisateur;		 
// 	}
// 	rep+="</table>";
// 	rep+="</div>";
// 	$('#contenu').html(rep);
// }
