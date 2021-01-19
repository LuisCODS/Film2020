
// ========================= VALIDATION TELEPHONE =========================
// onClick="validerTelephone();"
// function validerFormEditer()
// {
// 	//let tel_lRegExp = new RegExp('^\d{3}-\d{3}-\d{4}$', 'gm');
// 	//let tel_lRegExp = new RegExp('[0-9]{3}[-][0-9]{3}[-][0-9]{4}', 'gm');
// 	let tel_lRegExp = new RegExp('[0-9]{3}-[0-9]{3}-[0-9]{4}');

// 	let errorMsgTel = document.getElementById("isValidetTelephone");
// 	let tel_membre = document.getElementById("tel_membre");

// 	if (tel_membre.value.length != "") {

// 		//Error
// 		if (!tel_lRegExp.test(tel_membre.value)) 
// 		{	
// 			errorMsgTel.innerHTML="Telephone non valide!";
// 			errorMsgTel.classList.remove('text-success');
// 			errorMsgTel.classList.add('text-danger');
// 			return false;
// 		}	
// 		//ok
// 		else{
// 			errorMsgTel.innerHTML="Telephone valide";
// 			errorMsgTel.classList.remove('text-danger');	
// 			errorMsgTel.classList.add('text-success');
// 			return true;	
// 		}		
// 	}else{
// 		return false;
// 	}
// }