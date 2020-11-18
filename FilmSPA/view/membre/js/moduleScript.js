
$("#btnEnregistrer").click(function(){
	//alert("Test call");

	var inputs = $("#formCreate").serialize();

	$.ajax({

		method: "POST",
		url: "../../controller/membre.php",
		data: inputs

	}).done(function(callBach){
		
		alert(callBach);

	});	

});