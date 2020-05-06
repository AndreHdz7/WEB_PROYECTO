function validar(){
	var nombre,usuario,correo,contra,contraRep;
	nombre 		= 	document.getElementById("Nombre").value;
	usuario 	= 	document.getElementById("Usuario").value;
	correo 		=	document.getElementById("Correo").value;
	contra 		= 	document.getElementById("Contra").value;
    contraRep 		= 	document.getElementById("ContraRep").value;
	if (nombre.length>30)
	{
		alert('El nombre es muy largo');
		return false;
	}
	else if(nombre.length<3)
	{
		alert('El nombre es muy corto');
		return false;
	}
	else if (correo.length > 30){
		alert('El correo es muy largo, por favor intenta con otro');
		return false;
	}
	else if (correo.length < 10) 
	{
		alert('No es un correo valido lo que pusiste en ese campo');
		return false;
	}
	else if (contra.length > 20) {
		alert('La contraseña es muy larga, no la vas a recordar');
		return false;
	}
	else if (ccontra.length > 20) {
		alert('La contraseña es muy larga, no la vas a recordar');
		return false;	
	}
	else if (contra.localeCompare(contraRep)!=0) {
		alert('Las contraseñas no coinciden');
		return false;
	}
	
}