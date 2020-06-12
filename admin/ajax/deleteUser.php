<?php
// check request
	
if(isset($_POST['idBoleta'])!= "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['idBoleta'];
    
    $query = "DELETE FROM usuarios WHERE usuarios.numBoleta = '$user_id'";
    $result = mysqli_query($con, $quer);
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>