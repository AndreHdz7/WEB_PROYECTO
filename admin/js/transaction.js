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
    });
}
function readRecordsM() {
    $.get("./ajax/readMateria.php", {}, function (data, status) {
        $("#recargaM").html(data);
    });
}


function DeleteUser() {

    var idBoleta = $("#delete_idBoleta").val();
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
    var idBoleta = $("#update_idBoleta").val();
    var correoAlumno = $("#update_correoAlumno").val();
    var passwordAlumno = $("#update_passwordAlumno").val();
    var userAlumno = $("#update_userAlumno").val();
    
    // get hidden field value

    // Update the details by requesting to the server using ajax
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
            readRecords();
            $("#add_mensajeP").val("");
       
        }
    );
}
function MessagePrivate() {
    // get values
    var mensajePrivado= $("#add_mensajePP").val();
    var idBoleta = $("#msg_idBoleta").val();
    // Update the details by requesting to the server using ajax
    $.post("./ajax/updateMessagePrivate.php", {
            mensajePrivado: mensajePrivado,
            idBoleta:idBoleta
          
        },
        function (data, status) {
            // hide modal popup
            $("#modelMP2").modal("hide");
            // reload Users by using readRecords();
            readRecords();
            $("#add_mensajePP").val("");

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
function AddMateriaDetails() {
    // get values
    var idMateria = $("#update_idMateria").val();
    var nombreA = $("#add_nombreA").val();
    var profesor = $("#add_profesor").val();
    var cupo = $("#add_Cupo").val();
    var salon = $("#add_Salon").val();
    var horario = $("#add_Horario").val();
    // get hidden field value

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



(function ($) { $(document).ready(function(){ 
                                    readRecords();
                                    readRecordsM()}
                                    ); })(jQuery); 