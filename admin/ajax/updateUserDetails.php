<?php
// include Database connection file
    include("db_connection.php");
// check request
if(isset($_POST))
{
        
    // get values
    $idBoleta = $_POST['idBoleta'];
    $correoAlumno = $_POST['correoAlumno'];
    $passwordAlumno = $_POST['passwordAlumno'];
    $userAlumno = $_POST['userAlumno'];

   // $idBoleta = "78984785";
    //$correoAlumno = "rodrigo@gmail.com";
    //$passwordAlumno = "1234da";
    //$userAlumno = "rodri";

    // Updaste User detailsusuario
    $query = "UPDATE usuarios SET correo='$correoAlumno', contrasea = '$passwordAlumno', usuario= '$userAlumno' WHERE numBoleta = '$idBoleta'";
  //  $query = "UPDATE usuarios SET correo='holaatodos@gmail.com', contrasea = 'muere', usuario= 'muerete' WHERE numBoleta = '2018631571'";
   
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}