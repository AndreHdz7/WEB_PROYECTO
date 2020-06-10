<?php
// check request
	
if(isset($_POST['idBoleta']) && isset($_POST['idBoleta']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['idBoleta'];

    // delete User
    $query = "DELETE FROM usuarios WHERE numBoleta = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>