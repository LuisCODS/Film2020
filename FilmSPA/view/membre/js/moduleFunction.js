
// function listerFilms()
// {
// 	var action = 'action=select';
// 	//console.log(action);
	
// 	$.ajax({
// 		method: "POST", 
// 		url:"../../controller/filmController.php",
// 		data: action	

// 	}).done((jsonString)=>{
// 		//Va creer le template
// 		$.ajax({
// 			method: "POST", 
// 			url:"template/table-films.php",
// 			data:{
// 				data: jsonString
// 			}

// 		//Recoit le template
// 		}).done((template)=>{
// 			$("#contenu").html(template);
// 		})
// 	});
// }

// function editerMembre()
// {
// 	var formImputs = new FormData(document.getElementById('formEditer'));

// 	$.ajax({
// 		method: "POST", 
// 		url:"../../controller/membreController.php",
// 		//data: action+'&'+idFilm,
// 		data: formImputs,
// 		contentType: false,
// 		processData:false,
// 	}).done((jsonString)=>{
// 		 listerFilms();//Call this one to refresh page
// 		 document.getElementById("divMsg").style.display='block';
// 		 document.getElementById("emsg").innerHTML = "Film bien modifié!";		
// 		 setInterval(function(){document.getElementById("divMsg").style.display='none';}, 4000 ); 
// 	});
// }
