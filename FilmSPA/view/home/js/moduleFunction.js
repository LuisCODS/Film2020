// function rendreVisible(elem){
// 	document.getElementById(elem).style.display='block';
// }

// function rendreInvisible(elem){
//   document.getElementById(elem).style.display='none';
// }

function listerFilmsCards()
{
	var action = 'action=listerCards';
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
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		//Recoit le template
		}).done((template)=>{
			$("#contenu").html(template);
		})
	});
}

