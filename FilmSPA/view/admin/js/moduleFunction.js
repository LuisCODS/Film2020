function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
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
			rendreInvisible(contenu);
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
		rendreInvisible(contenu);
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
	
		//Va creer le template
		$.ajax({
			method: "POST", 
			url:"template/table-films.php",
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
  rendreInvisible(elem);
  showFormCreateFilm();  
}

function showFormCreateFilm()
{
	$.ajax({
		method: "POST", 
		url:"template/createFilm.php",
	
	}).done((template)=>{
		$("#contenu").html(template);
		rendreInvisible(contenu);
	});
}

//function enregistrerFilm()
//{
	//alert("Tetste call");
	//action="../../controller/admin.php"  onClick="enregistrerFilm();" 
	//cacher();
	//get all inputs from form (Profil_ID et ProfilNom )
	//var champs  = $("#formCreateFilm").serialize();
	//alert(champs);
	// var action = 'action=insert';

	// // REQUISITION asynchrone 
	// $.ajax({
	// 		method: "POST", 
	// 		url:"../../controller/film.php",
	// 		data: action+'&'+champs		
	// 	}).done((callBack)=>
	// 	{
	// 		alert(callback);
	// 		//var reponse = (callBack == 1) ? "Supprimé avec sucess!" : callBack;
	// 		//Windos popup du plugin	
	// 		$.confirm({
	// 			title: 'Attention!',
	// 			content: reponse,
	// 			buttons: {
	// 				Ok: ()=>{
	// 			         // Recharge la page actuelle à partir du 
	// 			         //... serveur, sans utiliser le cache.
	// 					 location.reload(true);
	// 				}				
	// 			}
	// 		});
	// 	});

//}