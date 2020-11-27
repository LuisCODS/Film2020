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
		//console.log(jsonString);

		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-films.php",
			data: "chaine="+jsonString
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
	document.getElementById("divFormFilm").style.display='block';
	var formImputs = new FormData(document.getElementById('formEnreg'));
	$.ajax({
			method: "POST", 
			url:"../../controller/filmController.php",
			data: formImputs,
			dataType : 'json',
			contentType: false,
			processData:false,	
			cache: false,					
			success : function (reponse){
				alert(reponse);
				//document.getElementById(divMsg).style.display='none';
				//$('#divMsg').show();
				 document.getElementById("emsg").innerHTML = reponse.msg;		
				 setInterval(function(){document.getElementById("divMsg").innerHTML =""; }, 5000 );
				//setInterval(function(){ $('#divMsg').show();}, 5000);
				// $('#emsg').html(reponse.msg);
				// setTimeout(function(){ $('#emsg').html(""); }, 5000);

			},
			error : function(err){
			}
	}); 
}




//Cas d'un button
// function valider()
// {
// 	var formEnreg = document.getElementById('formEnreg');
// 	var titre = document.getElementById('titre').value;
// 	var prix = document.getElementById('prix').value;
// 	var categorie = document.getElementById('categorie').value;
// 	var description = document.getElementById('description').value;
// 	var realisateur = document.getElementById('realisateur').value;

// 	//[0-9]{1,2}[,.][0-9]{1,2}  ou (\d+\.\d{1,2})
// 	//var numRegExp = new RegExp("^[0-9]{1,2}[.][0-9]{1,2}$");// true ou false.
// 	//var numRegExp = new RegExp("[0-9]{1,2}[.][0-9]{1,2}");// true ou false.	
// 	var numRegExp = new RegExp('^[0-9]{1,2}[.,]{1}[0-9]{1,2}$', 'gm');// true ou false.	
// 	//console.log(numRegExp);

// 	if(titre!="" && categorie!="" && description!="" && realisateur!="")
// 	{	
// 		if(numRegExp.test(prix))		
// 			formEnreg.submit();
// 			enregistrerFilm();		
// 	}

// }

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
