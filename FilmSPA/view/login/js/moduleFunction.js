function validerFormLogin()
{
	var formLogin = document.getElementById('formLogin');
	var courriel = document.getElementById('courriel').value;
	var MDP_membre = document.getElementById('MDP_membre').value;
	var msg = document.getElementById('msgErrorEmail');
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	if (courriel != "") 
	{
		if(courriel.match(pattern) && courriel != "" ){		
			//formLogin.submit();
			formLogin.classList.add("valid");
			formLogin.classList.remove("invalid");
			msg.innerHTML = "Email valide!";
			msg.style.color = "#009933";

		}else{
			formLogin.classList.remove("valid");
			formLogin.classList.add("invalid");
			msg.innerHTML = "Email invalide!";
			msg.style.color = "#ff0000";		
		}		
	}
	
}
