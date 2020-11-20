/*
	Liste tous les membre au chrgement de la page
*/
function literMembres()
{
	var action = 'action=lister';

	$.ajax({
		method: "POST", 
		url:"../../controller/admin.php",
		data: action	
	}).done((callback)=>{
	//alert(data);	

		/*
			Fait une nouvelle requisition pour envoyer les données json(chaine de string)
			au dossier template(table-membre.php) que se charge de parcourrir 
			et afficher dans la table de membres son contenu.
		*/
		$.ajax({
			method: "POST", 
			url:"../admin/template/table-membre.php",
			data: "obj="+callback
			
		}).done((callback)=>{
			//Attache le contenu dans la div avec l'ID (listTemplate)
			$("#showTable").html(callback);
		})
	});	
}

function listerFilms()
{
	// var action = 'action=lister';

	// $.ajax({
	// 	method: "POST", 
	// 	url:"../../controller/admin.php",
	// 	data: action	
	// }).done((callback)=>{
	// //alert(data);	

		
	// 		Fait une nouvelle requisition pour envoyer les données json(chaine de string)
	// 		au dossier template(table-membre.php) que se charge de parcourrir 
	// 		et afficher dans la table de membres son contenu.
		
	// 	$.ajax({
	// 		method: "POST", 
	// 		url:"../admin/template/table-membre.php",
	// 		data: "obj="+callback
			
	// 	}).done((callback)=>{
	// 		//Attache le contenu dans la div avec l'ID (listTemplate)
	// 		$("#showTable").html(callback);
	// 	})
	// });	
}