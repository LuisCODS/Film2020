function montrer(elem){
	document.getElementById(elem).style.display='block';
}

function cacher(elem){
  document.getElementById(elem).style.display='none';
}


function literMembres()
{
	var action = 'action=literMembres';

	$.ajax({
		method: "POST", 
		url:"../../controller/admin.php",
		data: action	
	}).done((jsonString)=>{
	//alert(data);	

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
			//Attache le contenu dans la div avec l'ID (contenu)
			$("#contenu").html(template);
			montrer(contenu);
		})
	});	
}

function showDashboard(){

	$.ajax({
		method: "POST", 
		url:"template/dashboard.php",
	
	}).done((template)=>{
		//Attache le contenu dans la div avec l'ID (contenu)
		$("#contenu").html(template);
		montrer(contenu);
	});
}



function listerFilms()
{
	var action = 'action=literFilms';

	$.ajax({
		method: "POST", 
		url:"../../controller/admin.php",
		data: action	
	}).done((jsonString)=>{
	
		//alert(jsonString);	
		
		$.ajax({
			method: "POST", 
			url:"template/table-films.php",
			data: "chaine="+jsonString
			
		}).done((jsonString)=>{

			//alert(jsonString);
			//Attache le contenu dans la div avec l'ID (listTemplate)
			$("#contenu").html(jsonString);
		})
	});	
}