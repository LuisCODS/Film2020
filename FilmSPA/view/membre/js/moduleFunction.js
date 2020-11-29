
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
			url:"template/table-films.php",
			data:{
				data: jsonString
			}

		//Recoit le template
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}