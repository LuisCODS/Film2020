
$("#btnLogin").click(function(){
	//alert("Test call");

	var inputs = $("#formLogin").serialize();
	//var action = 'action=select'

	$.ajax({

		method: 'POST',
		url: '../../../controller/login.php',
		data: inputs

	}).done(function(callBach){
		alert(callBach);

	});	

});