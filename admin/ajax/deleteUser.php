<?php
// check request
	
if(isset($_POST['idBoleta'])!= "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['idBoleta'];

    // delete User AIUDAAA NO ME SALE XDD
   // $query3="SET FOREIGN_KEY_CHECKS=0";
   //$queryT="(ALTER TABLE "materia_seleccionadas" DROP FOREIGN KEY "fk_numBoleta_seleccionadas")"
    $queryT2="ALTER TABLE `materia_seleccionadas` ADD CONSTRAINT `fk_numBoleta_seleccionadas` FOREIGN KEY (`numBoleta_seleccionadas`) REFERENCES `usuarios` (`$user_id`) ON DELETE CASCADE; "; 
    //$queryB = "ALTER TABLE `materia_seleccionadas` ADD CONSTRAINT `fk_numBoleta_seleccionadas` FOREIGN KEY (`numBoleta_seleccionadas`) REFERENCES `usuarios` (`$user_id`) ON DELETE CASCADE;"; 
    //$query = "DELETE FROM usuarios WHERE numBoleta = '$user_id'";
    $result = mysqli_query($con, $queryT2);
    if (!$result = mysqli_query($con, $queryT2)) {
        exit(mysqli_error($con));
    }
}
?>