
//Au chargement de la page
// $(document).ready(function(){

// 	$("#formCreate").submit(function(event){
// 		event.preventDefault();
// 		var nom = $("#mail-nom").val();
// 		var prenom = $("#mail-prenom").val();
// 		var courriel = $("#mail-courriel").val();
// 		var MDP_membre = $("#mail-MDP_membre").val();
// 		var MDP_membreConfirm = $("#mail-MDP_membreConfirm").val();
// 		var submit = $("#mail-submit").val();

// 		$(".form-message").load("");
// 	});

// });

//Au chargement de la page
// $(document).ready(function(){

// 	 validerForm();
// 	// $("#formCreate").submit(function(){

// 	// });

// });


// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//     // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
//     var forms = document.getElementsByClassName('needs-validation');
//     // Faz um loop neles e evita o envio
//     var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//         if (form.checkValidity() === false) {
//           event.preventDefault();
//           event.stopPropagation();
//         }
//         form.classList.add('was-validated');
//       }, false);
//     });
//   }, false);
// })();




// $("#btnEnregistrer").click(function(){
// 	//alert("Test call");


// 		var inputs = $("#formCreate").serialize();

// 		$.ajax({

// 			method: "POST",
// 			url: "../../controller/membre.php",
// 			data: inputs

// 		}).done(function(callBach){
			
// 			//alert(callBach);// 1
// 			alert("Membre bien enregistré!");

// 		});	
	

// });

