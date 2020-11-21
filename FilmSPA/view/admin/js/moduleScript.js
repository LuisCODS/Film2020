//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{
//alert("Test load page");
	showDashboard();
});


// $('#btnEnregistrer').click(function(){
	
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
// })   



