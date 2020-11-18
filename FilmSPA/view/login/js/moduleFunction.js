function validerFormLogin()
{


	var formLogin = document.getElementById('formLogin');
	var courriel = document.getElementById('courriel').value;
	var MDP_membre = document.getElementById('MDP_membre').value;

	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	if(courriel.match(pattern) ){		
		formLogin.submit();
	}else{

	}

	
}