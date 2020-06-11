<?php
// include Database connection file
    include("db_connection.php");
// check request
if(isset($_POST))
{
        
    // get values
    $idMateria = $_POST['idMateria'];
    $nombreA = $_POST['nombreA'];
    $profesor = $_POST['profesor'];
    $cupo = $_POST['cupo'];
    $salon = $_POST['salon'];
    $horario = $_POST['horario'];

   // $idBoleta = "78984785";
    //$correoAlumno = "rodrigo@gmail.com";
    //$passwordAlumno = "1234da";
    //$userAlumno = "rodri";

    // Updaste User detailsusuario
    $query = "UPDATE materias_disponibles SET materia='$nombreA', profesor = '$profesor', cupo= '$cupo',salon='$salon', horario='$horario' WHERE idMateria = '$idMateria'";
  //  $query = "UPDATE usuarios SET correo='holaatodos@gmail.com', contrasea = 'muere', usuario= 'muerete' WHERE numBoleta = '2018631571'";
   
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}