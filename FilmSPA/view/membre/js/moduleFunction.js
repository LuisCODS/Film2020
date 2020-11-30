
// ========================= VALIDATION TELEPHONE =========================
// onClick="validerTelephone();"
// function validerTelephone()
// {
// 	//let tel_lRegExp = new RegExp('^\d{3}-\d{3}-\d{4}$', 'gm');
// 	//let tel_lRegExp = new RegExp('[0-9]{3}[-][0-9]{3}[-][0-9]{4}', 'gm');
// 	let tel_lRegExp = new RegExp('[0-9]{3}-[0-9]{3}-[0-9]{4}');

// 	let errorMsgTel = document.getElementById("isValidetTelephone");
// 	let tel_membre = document.getElementById("tel_membre");

// 	//Si quelque chose
// 	if (tel_membre.value.length != "") {

// 		//Error
// 		if (!tel_lRegExp.test(tel_membre.value)) 
// 		{	
// 			errorMsgTel.innerHTML="Telephone non valide!";
// 			errorMsgTel.classList.remove('text-success');
// 			errorMsgTel.classList.add('text-danger');
// 		}	
// 		//ok
// 		else{
// 			errorMsgTel.innerHTML="Telephone valide";
// 			errorMsgTel.classList.remove('text-danger');	
// 			errorMsgTel.classList.add('text-success');	
// 		}		
// 	}
// }


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
