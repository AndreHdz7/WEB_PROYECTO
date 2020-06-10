<?php
// include Database connection file
    include("db_connection.php");
// check request
if(isset($_POST))
{
        
    // get values
    $Message = $_POST['mensajePublico'];
 

    // Updaste Message
    $query = "UPDATE mensaje_publico SET mensaje_publico='$Message'WHERE idmensaje_publico = 1";
  //  $query = "UPDATE usuarios SET correo='holaatodos@gmail.com', contrasea = 'muere', usuario= 'muerete' WHERE numBoleta = '2018631571'";
   
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    
}