/*
function validarupdate(){

	var NumBoleta,usuario,correo,contra;
	NumBoleta 	= 	document.getElementById("add_idBoleta").value;
	usuario 	= 	document.getElementById("add_userAlumno").value;
	correo 		=	document.getElementById("add_correoAlumno").value;
	contra 		= 	document.getElementById("add_passwordAlumno").value;
	var expresionCorreo = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var expresionName = /^[a-zA-Z ]+$/;
	var expresionBoleta = /^[2]+[0]+[1|2]+[1|2|3|4|5|6|7|8|9]+[6]+[3]+[0]+[0-9]+$/;
	if(NumBoleta === "" ||usuario === "" ||correo === "" ||contra === "" )
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
	else if (usuario.length>30)
	{
		alert('El nombre es muy largo');
		return false;
	}
	else if(usuario.length<3)
	{
		alert('El nombre es muy corto');
		return false;
	}
	else if(!expresionName.test(usuario))
	{
		alert("El Nombre no es valido");
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
	else if (isNaN(NumBoleta))
	{
		alert('No es numero de Boleta Valido');
		return false;
	}
	else{
		cadena = "&userAlumno="+usuario +"&passwordAlumno=" +contra +"&correoAlumno="+correo+"&NumBoleta="+idBoleta
        $.ajax({
            type:"POST",
			url:"ajax/updateUserDetails.php",
			data: cadena,
			beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, well get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
            //data:`contactFrmSubmit=1&userAlumno=${usuario}passwordAlumno=${contra}&correoAlumno=${correo}&idBoleta=${NumBoleta}`
        });
    }
}
*/