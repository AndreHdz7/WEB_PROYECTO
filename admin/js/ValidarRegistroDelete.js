/*function validardelete(){

	var NumBoleta,usuario,correo,contra,contraRep;
	NumBoleta 	= 	document.getElementById("delete_idBoleta").value;
	var expresionCorreo = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var expresionName = /^[a-zA-Z ]+$/;
	var expresionBoleta = /^[2]+[0]+[1|2]+[1|2|3|4|5|6|7|8|9]+[6]+[3]+[0]+[0-9]+$/;
	if(NumBoleta === "")
	{
		alert("Existen campos vacíos");
		return false;
	}
	else if (NumBoleta.length>15)
	{
		alert("El Numero de Boleta no es valido");
		return false;
	}
	else if (NumBoleta.length<10)
	{
		alert("El Numero de Boleta no es valido");
		return false;
	}
	else if(!expresionBoleta.test(NumBoleta))
	{
		alert("No es un numero de Boleta Valido");
		return false;
	}
	else if (isNaN(NumBoleta))
	{
		alert('No es numero de Boleta Valido');
		return false;
	}else{
		return true;
	}
	
}
*/