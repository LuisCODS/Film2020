//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{

//alert("Test load page");
	literMembres();
	//listerFilms();
});










//========================================================================
//   
//   
//========================================================================
// $('#').click(()=>    
// {	
// 	//get all inputs from form (Profil_ID et ProfilNom )
// 	var champs   = $("#formAjouter").serialize();
// 	var actionType = 'action=delete';

// 	// REQUISITION asynchrone 
// 	$.ajax({
// 		method: "POST", 
// 		url:profilController,
// 		data: actionType+'&'+champs
		
// 		}).done((callBack)=>
// 		{
// 			var reponse = (callBack == 1) ? "Supprimé avec sucess!" : callBack;
// 			//Windos popup du plugin	
// 			$.confirm({
// 				title: 'Attention!',
// 				content: reponse,
// 				buttons: {
// 					Ok: ()=>{
// 				         // Recharge la page actuelle à partir du 
// 				         //... serveur, sans utiliser le cache.
// 						 location.reload(true);
// 					}				
// 				}
// 			});
// 		});
// }); 