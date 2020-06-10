// Add Record
function addRecord() {
    // get values
    var idBoleta = $("#idBoleta").val();
    var correoAlumno = $("#correoAlumno").val();
    var passwordAlumno = $("#passwordAlumno").val();
    var userAlumno = $("#userAlumno").val();

    // Add record
    $.post("./ajax/addRecord.php", {
        idBoleta: idBoleta,
        correoAlumno: correoAlumno,
        passwordAlumno: passwordAlumno,
		userAlumno: userAlumno
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

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
        $("#records_content").html(data);
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
        }
    );
}



(function ($) { $(document).ready(function(){ readRecords() }); })(jQuery); 