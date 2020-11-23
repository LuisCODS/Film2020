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
			rendreInvisible(contenu);
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
		rendreInvisible(contenu);
	});
}


function listerFilms()
{
	var action = 'action=select';

	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data: action	
	}).done((jsonString)=>{
	
		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-films.php",
			data: "chaine="+jsonString
			
		//Recoit le template
		}).done((jsonString)=>{

			//alert(jsonString);
			//Attache le contenu dans la div avec l'ID (listTemplate)
			$("#contenu").html(jsonString);
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
	  // Display form create film
	  $("#divFormFilm").show();
	  //showFormCreateFilm();  
}

function enregistrerFilm()
{
	var formImputs = new FormData(document.getElementById('formEnreg'));
	//formImputs.append('action','insert');

	$.ajax({
			method: "POST", 
			url:"../../controller/filmController.php",
			data: formImputs,
			contentType: false,
			processData:false,

		}).done((callBack)=>{

			$.ajax({
				method: "POST", 
				url:"../admin/index.php",

			})
	 		//alert(callback);
	 		 //$("#divFormFilm").hide();
	 		//reponseInsert();
			// var sreponse = (callBack == 1) ? "Film enregistré avec sucess!" : callBack;
			//$('#messages').html(reponse);
		    //setTimeout(function(){ $('#messages').html(""); }, 5000);


	 	});
}

/*function reponseInsert()
{
	alert("dfsgdgsgsgs");
}*/

// function valider(){
// 	var num=document.getElementById('num').value;
// 	var titre=document.getElementById('titre').value;
// 	var duree=document.getElementById('duree').value;
// 	var res=document.getElementById('res').value;
// 	var numRegExp=new RegExp("^[0-9]{1,4}$");
// 	if(num!="" && titre!="" && duree!="" && res!="")
// 		if(numRegExp.test(num))
// 			return true;
// 	return false;
// }

//Cas d'un button
/*
function valider(){
	var formEnreg=document.getElementById('formEnreg');
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			formEnreg.submit();
}
*/