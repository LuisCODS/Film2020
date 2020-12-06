function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
  document.getElementById(elem).style.display='none';
}

// ===========================  GESTION VALIDATION ===========================

var formEnreg = document.getElementById('formEnreg');

formEnreg.addEventListener("submit", function(e) {
	  e.preventDefault();
	  
	   if(validerInputs()) 
	      formEnreg.submit(); 
});


function validerInputs()
{
	  if(document.getElementById('titre').value == "")
			return false;
	  if(document.getElementById('prix').value == "")
			return false;
   	  if(document.getElementById('categorie').value == "")
			return false;
	  if(document.getElementById('realisateur').value == "")
			return false;
	  if(document.getElementById('description').value == "")
			return false;
}

		// $('#msgErreur').html(
	 //      "<div class='alert alert-danger text-center' id='danger-alert'><strong>Erreur ! </strong>Champs requis</div>"
		// );
		// // cacher l'erreur apres 2 secondes
		// $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
		//  	 $("#danger-alert").slideUp(500);
		// });
// ===========================  GESTION MEMBRE ===========================

function literMembres()
{
	var action = 'action=select';
	$.ajax({
		method: "POST", 
		url:"../../controller/membreController.php",
		data: action	
	}).done((jsonString)=>{
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-membres.php",
			data: "chaine="+jsonString	
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});	
}

function supprimerMembre(id)
{
	//alert(id);//get id ok
	var action = 'action=delete';
	var idMembre = 'idMembre='+id;
	
	$.ajax({

		method: "POST", 
		url:"../../controller/membreController.php",
		data: action+'&'+idMembre
		
	}).done(()=>{
		 literMembres();//Call this one to refresh page
		 document.getElementById("divMsg").style.display='block';
		 document.getElementById("emsg").innerHTML = "<h4>Membre bien supprimé!</h4>";		
		 setInterval(function(){document.getElementById("divMsg").style.display='none';}, 4000 ); 

	 });
}

// ===========================  GESTION ADMIN ===========================

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

// ===========================  GESTION FILM ===========================

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
  Show display form to create a new movie.
 */
function openFormCreate(elem)
{
	//Clean form data
	document.getElementById('formEnreg').reset();	
	//Cache table list film
	rendreInvisible(elem);
	//Display form
	$("#divFormFilm").show();
}

function enregistrerFilm()
{
	document.getElementById("divFormFilm").style.display='block';
	var formImputs = new FormData(document.getElementById('formEnreg'));	
	$.ajax({
			method: "POST", 
			url:"../../controller/filmController.php",
			data: formImputs,
			//async: false,
			contentType: false,
			processData:false,
	}).done((output)=>{
 		listerFilms();
 		$('#divFormFilm').hide();
		document.getElementById("divMsg").style.display='block';
		document.getElementById("emsg").innerHTML = "<h4>Film bien enregistre!</h4>";		
		setInterval(function(){document.getElementById("divMsg").style.display='none';}, 4000 );
	});
	//return false;
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
		 document.getElementById("emsg").innerHTML = "<h4>Film bien supprimé!</h4>";		
		 setInterval(function(){document.getElementById("divMsg").style.display='none';}, 4000 ); 

	 });
}

/*Adffiche le form editer avec les champs courrants*/
function showFormEditer(id)
{
	//alert(id);//get id ok
	var action = 'action=showForm';
	var idFilm = 'idFilm='+id;
	
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		//data: action+'&'+idFilm,
		data: action+'&'+idFilm,
	}).done((jsonString)=>{
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

/*Edite le film*/
function editerFilm()
{
	var formImputs = new FormData(document.getElementById('formEditer'));

	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		//data: action+'&'+idFilm,
		data: formImputs,
		contentType: false,
		processData:false,
	}).done((jsonString)=>{
		 listerFilms();//Call this one to refresh page
		 document.getElementById("divMsg").style.display='block';
		 document.getElementById("emsg").innerHTML = "Film bien modifié!";		
		 setInterval(function(){document.getElementById("divMsg").style.display='none';}, 4000 ); 
	});
}

