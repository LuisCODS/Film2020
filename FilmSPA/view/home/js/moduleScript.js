// Things that should be done every time a page loads
$(()=>{
	listerFilmsCards();
	 document.getElementById("divFormLogin").style.display='none';
	 document.getElementById("dviFormCreateUser").style.display='none';
});


function rendreVisible(elem){
	document.getElementById(elem).style.display='block';
}

function rendreInvisible(elem){
  document.getElementById(elem).style.display='none';
}

// ============================ GESTION FILM ========================

function listerFilmsCards()
{
	var action = 'action=listerCards';	

	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
		data: action	

	}).done((jsonString)=>{
		//alert(jsonString);
		$.ajax({
			method: "POST", 
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		}).done((template)=>{
			//alert(template);
			$("#contenu").html(template);
		})
	});
}


/*Affiche une liste de card  du film par categorie*/
function listerCategorie(categorie)
{
	var action = 'action=listerByCategorie&cat='+categorie;
	$.ajax({
		method: "POST", 
		url:"../../controller/filmController.php",
	    data:action
	}).done((jsonString)=>{

		$.ajax({
			method: "POST", 
			url:"../film/template/card-film.php",
			data: "chaine="+jsonString
		//Recoit le template
		}).done((template)=>{			
			$("#contenu").html(template);
			$('#totalCat').show();
			//setInterval(function(){document.getElementById("totalCat").style.display='none';}, 5000 );
		})
	});
}

// ============================ GESTION MODAL ========================
function displayModal(parm){

	//alert(parm);
	//var src = '../../apercus/Intouchables.mp4';
	var  src = "https://www.youtube.com/embed/-RNI9o06vqo";
	//var  src = parm;
	$('.modalVideo').modal('show');
	$("#TituloModalCentralizado").html(parm);
	$('.modalVideo iframe').attr('src', src);

}

// $('#closeModal').click(function () {
//     $('#modalVideo iframe').removeAttr('src');
// });
