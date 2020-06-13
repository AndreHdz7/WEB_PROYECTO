function validarlogin(){

	var NumBoleta,usuario,correo,contra,contraRep;
	correo 		=	document.getElementById("usuario").value;
	contra 		= 	document.getElementById("contrase").value;
	var expresionCorreo = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var expresionName = /^[a-zA-Z ]+$/;
	var expresionBoleta = /^[2]+[0]+[1|2]+[1|2|3|4|5|6|7|8|9]+[6]+[3]+[0]+[0-9]+$/;
	if(correo === "" ||contra === "")
	{
		alert("Existen campos vacíos");
		return false;
	}
	else if (correo.length > 30){
		alert('El correo es muy largo, por favor intenta con otro');
		return false;
	}
	else if(!expresionCorreo.test(correo))
	{
		alert("El correo no es valido");
		return false;
	}
	else if (contra.length > 20) {
		alert('La contraseña es muy larga, no la vas a recordar');
		return false;
	}
}