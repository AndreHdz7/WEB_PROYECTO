<?php
// include Database connection file
    include("db_connection.php");
// check request
if(isset($_POST))
{
        
    // get values
    $Message = $_POST['mensajePrivado'];
    $idBoleta = $_POST['idBoleta'];

    $valIncrement = "SELECT idmensaje_privado as totalM from mensaje_privado";
    $resultIncrement=mysqli_query($con,$valIncrement);
    $mostrarIncrement = mysqli_fetch_assoc($resultIncrement);
    
    $id=($mostrarIncrement['totalM'])+(1);
    
    echo $id;
    // Updaste Message
    $query = "UPDATE mensaje_privado SET idmensaje_privado= '$id', mensaje_privado='$Message', numBoleta_privado='$idBoleta'";
  //  $query = "UPDATE usuarios SET correo='holaatodos@gmail.com', contrasea = 'muere', usuario= 'muerete' WHERE numBoleta = '2018631571'";
     if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
  
    
}