// Add Record
function addRecord() {
    // get values
    var idBoleta = $("#add_idBoleta").val();
    var correoAlumno = $("#add_correoAlumno").val();
    var passwordAlumno = $("#add_passwordAlumno").val();
    var userAlumno = $("#add_userAlumno").val();

    // Add record
    $.post("./ajax/addRecord.php", {
        idBoleta: idBoleta,
        correoAlumno: correoAlumno,
        passwordAlumno: passwordAlumno,
        userAlumno: userAlumno
    }, function (data, status) {
        // close the popup
        $("#createUser").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#idBoleta").val("");
        $("#correoAlumno").val("");
        $("#passwordAlumno").val("");
        $("#userAlumno").val("");
    });
}

// READ records
function readRecords() {
    $.get("./ajax/readRecord.php", {}, function (data, status) {
        $("#recarga").html(data);
    }); 0
}
function readRecordsM() {
    $.get("./ajax/readMateria.php", {}, function (data, status) {
        $("#recargaM").html(data);
    });
}
function readMessage() {
    $.get("./ajax/readMsg.php", {}, function (data, status) {
        $("#recargaMsg").html(data);
    });
}


function DeleteUser() {

    var idBoleta = $("#delete_idBoleta").val();
    if (validardelete() === true) {
        var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
        if (conf == true) {
            $.post("./ajax/deleteUser.php", {
                idBoleta: idBoleta
            },

                function (data, status) {
                    // hide modal popup
                    $("#modelId2").modal("hide");
                    // reload Users by using readRecords();
                    readRecords();
                    $("#delete_idBoleta").val("");
                }
            );

        }
    }
}

function DeleteMateria() {

    var idMateria = $("#delete_idMateria").val();


    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");

    if (conf == true) {
        $.post("./ajax/deleteMateria.php", {
            idMateria: idMateria
        },

            function (data, status) {
                // hide modal popup
                $("#modelDelete").modal("hide");
                // reload Users by using readRecords();
                readRecordsM();
                $("#delete_idMateria").val("");
            }
        );

    }

}

function GetUserDetails(idBoleta) {
    $("#update_idBoleta").val(idBoleta);
    $.post("./ajax/readUserDetails.php", {
        idBoleta: idBoleta
    },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_idBoleta").val(user.idBoleta);
            $("#update_correoAlumno").val(user.correoAlumno);
            $("#update_passwordAlumno").val(user.passwordAlumno);
            $("#update_userAlumno").val(user.userAlumno);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var idBoleta = $("#add_idBoleta").val();
    var correoAlumno = $("#add_correoAlumno").val();
    var passwordAlumno = $("#add_passwordAlumno").val();
    var userAlumno = $("#add_userAlumno").val();

    if (validarupdate() === true) {
        $.post("./ajax/updateUserDetails.php", {
            idBoleta: idBoleta,
            correoAlumno: correoAlumno,
            passwordAlumno: passwordAlumno,
            userAlumno: userAlumno
        },
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
function MessagePublic() {
    // get values
    var mensajePublico = $("#add_mensajeP").val();
    // Update the details by requesting to the server using ajax
    $.post("./ajax/updateMessagePublic.php", {
        mensajePublico: mensajePublico,

    },
        function (data, status) {
            // hide modal popup
            $("#modelMP").modal("hide");
            // reload Users by using readRecords();
            readMessage();
            $("#add_mensajeP").val("");

        }
    );
}
function MessagePrivate() {
    // get values
    var mensajePrivado = $("#add_mensajePP").val();
    var idBoleta = $("#msg_idBoleta").val();
    // Update the details by requesting to the server using ajax
    $.post("./ajax/updateMessagePrivate.php", {
        mensajePrivado: mensajePrivado,
        idBoleta: idBoleta

    },
        function (data, status) {
            // hide modal popup
            $("#modelMP2").modal("hide");
            // reload Users by using readRecords();
            readRecords();
            $("#add_mensajePP").val("");
            $("#msg_idBoleta").val("");

        }
    );
}
function UpdateMateriaDetails() {
    // get values
    var idMateria = $("#update_idMateria").val();
    var nombreA = $("#update_nombreA").val();
    var profesor = $("#update_profesor").val();
    var cupo = $("#update_Cupo").val();
    var salon = $("#update_Salon").val();
    var horario = $("#update_Horario").val();
    // get hidden field value
    if (validarMateria() === true) {
        // Update the details by requesting to the server using ajax
        $.post("./ajax/updateMateriaDetails.php", {
          idMateria: idMateria,
          nombreA: nombreA,
           profesor: profesor,
            cupo: cupo,
            salon: salon,
           horario: horario
        },
        function (data, status) {
            // hide modal popup
            $("#updateMateria").modal("hide");
            // reload Users by using readRecords();
            readRecordsM();
            $("#update_idMateria").val("");
            $("#update_nombreA").val("");
            $("#update_profesor").val("");
            $("#update_Cupo").val("");
            $("#update_Salon").val("");
            $("#update_Horario").val("");
        }
        );
    }

}
function AddMateriaDetails() {
    // get values
    var idMateria = $("#update_idMateria").val();
    var nombreA = $("#add_nombreA").val();
    var profesor = $("#add_profesor").val();
    var cupo = $("#add_Cupo").val();
    var salon = $("#add_Salon").val();
    var horario = $("#add_Horario").val();
    // get hidden field value
    if (validarMateria() === true) {
    // Update the details by requesting to the server using ajax
    $.post("./ajax/addMateriaDetails.php", {
        idMateria: idMateria,
        nombreA: nombreA,
        profesor: profesor,
        cupo: cupo,
        salon: salon,
        horario: horario
    },
        function (data, status) {
            // hide modal popup
            $("#createMateria").modal("hide");
            // reload Users by using readRecords();
            readRecordsM();
            $("#update_idMateria").val("");
            $("#add_nombreA").val("");
            $("#add_profesor").val("");
            $("#add_Cupo").val("");
            $("#add_Salon").val("");
            $("#add_Horario").val("");
        }
    );
    }
}/*
function stateRegUserByBoleta(numBoleta){
   var result=2;
   $.post("./ajax/searchBoleta.php", {
        numBoleta:numBoleta
    },function (data, status) {
       alert("data es : "+data);
       result=$('data');
       //result=parseInt(data);
       return (result);
    })
    return (result);
    ;

}*/
function validardelete() {

    var NumBoleta = $("#delete_idBoleta").val();
    var expresionBoleta = /^[2]+[0]+[1|2]+[1|2|3|4|5|6|7|8|9]+[6]+[3]+[0]+[0-9]+$/;

    if (NumBoleta === "") {
        alert("Existen campos vacíos");
        return false;
    }
    else if (NumBoleta.length > 15) {
        alert("El Numero de Boleta no es valido");
        return false;
    }
    else if (NumBoleta.length < 10) {
        alert("El Numero de Boleta no es valido");
        return false;
    }

    else if (!expresionBoleta.test(NumBoleta)) {
        alert("Expr No es un numero de Boleta Valido");
        return false;
    }
    else if (isNaN(NumBoleta)) {
        alert('No es numero de Boleta Valido');
        return false;
    } else if (exist == false) {
        alert("No existe el numero de boleta");
        return false;
    }

    else {
        return true;
    }


}

function validarupdate() {

    var NumBoleta = $("#add_idBoleta").val();
    var correo = $("#add_correoAlumno").val();
    var contra = $("#add_passwordAlumno").val();
    var usuario = $("#add_userAlumno").val();

    var expresionCorreo = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var expresionName = /^[a-zA-Z ]+$/;
    var expresionBoleta = /^[2]+[0]+[1|2]+[1|2|3|4|5|6|7|8|9]+[6]+[3]+[0]+[0-9]+$/;
    if (NumBoleta === "" || usuario === "" || correo === "" || contra === "") {
        alert("Existen campos vacíos");
        return false;
    }
    else if (NumBoleta.length > 15) {
        alert("El Numero de Boleta no es valido");
        return false;
    }
    else if (NumBoleta.length < 10) {
        alert("El Numero de Boleta no es valido");
        return false;
    }
    else if (!expresionBoleta.test(NumBoleta)) {
        alert("No es un numero de Boleta Valido");
        return false;
    }
    else if (usuario.length > 30) {
        alert('El nombre es muy largo');
        return false;
    }
    else if (usuario.length < 3) {
        alert('El nombre es muy corto');
        return false;
    }
    else if (!expresionName.test(usuario)) {
        alert("El Nombre no es valido");
        return false;
    }
    else if (correo.length > 30) {
        alert('El correo es muy largo, por favor intenta con otro');
        return false;
    }
    else if (!expresionCorreo.test(correo)) {
        alert("El correo no es valido");
        return false;
    }
    else if (contra.length > 20) {
        alert('La contraseña es muy larga, no la vas a recordar');
        return false;
    }
    else if (isNaN(NumBoleta)) {
        alert('No es numero de Boleta Valido');
        return false;
    }
    else {
        return true;
    }
}

function validarMateria() {
    var idMateria = $("#update_idMateria").val();
    var nombreA = $("#add_nombreA").val();
    var profesor = $("#add_profesor").val();
    var cupo = $("#add_Cupo").val();
    var salon = $("#add_Salon").val();
    var horario = $("#add_Horario").val();
    var expresionName = /^[a-zA-Z ]+$/;
    var expresioncupo = /^[2|3]+[0|1|2|3|4|5|6]+$/;
    var expresionsalon =/^[1|2]+[0|1|2|]+[0|1]+[0-9]$/;
    if (idMateria === "" || nombreA === "" || profesor === "" || cupo === "" || salon === "" || horario === "") {
        alert("Existen campos vacíos");
        return false;
    }
    else if (idMateria.length > 3) {
        alert("El id de la Materia no es valido");
        return false;
    }
    else if (nombreA.length > 30) {
        alert("La Materia no es valido");
        return false;
    }
    else if (nombreA.length < 2) {
        alert("La Materia no es valido");
        return false;
    }
    else if (!expresionName.test(nombreA)) {
        alert("La Materia no es valido");
        return false;
    }
    else if (profesor.length > 30) {
        alert("El profesor no es valido");
        return false;
    }
    else if (profesor.length < 3) {
        alert("El profesor no es valido");
        return false;
    }
    else if (!expresionName.test(profesor)) {
        alert("El profesor no es valido");
        return false;
    }
    else if (cupo.length > 3) {
        alert("El cupo no es valido");
        return false;
    }
    else if (!expresioncupo.test(nombreA)) {
        alert("La Materia no es valido");
        return false;
    }
    else if (salon.length > 4) {
        alert("El salon no es valido");
        return false;
    }
    else if (!expresionsalon.test(profesor)) {
        alert("El salon no es valido");
        return false;
    }
    else if (horario.length > 10) {
        alert("El horario no es valido");
        return false;
    }
    else if (isNaN(idMateria)) {
        alert("El id de la Materia no es valido");
        return false;
    }
    else if (isNaN(salon)) {
        alert("El salon no es valido");
        return false;
    }
    else {
        return true;
    }
}

function deleteMateria() {
    var idMateria = $("#update_idMateria").val();
    if (idMateria === "") {
        alert("Existen campos vacíos");
        return false;
    }
    else if (idMateria.length < 3) {
        alert("El id de la Materia no es valido");
        return false;
    }
    else if (isNaN(idMateri)) {
        alert("El id de la Materia no es valido");
        return false;
    } else if (exist == false) {
        alert("El id de la Materia no es valido");
        return false;
    }

    else {
        return true;
    }
}

(function ($) {
    $(document).ready(function () {
        readRecords();
        readRecordsM();
        readMessage()
    }
    );
})(jQuery); 