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
    //$queryT2="ALTER TABLE `materia_seleccionadas` ADD CONSTRAINT `fk_numBoleta_seleccionadas` FOREIGN KEY (`numBoleta_seleccionadas`) REFERENCES `usuarios` (`$user_id`) ON DELETE CASCADE; "; 
    //$queryB = "ALTER TABLE `materia_seleccionadas` ADD CONSTRAINT `fk_numBoleta_seleccionadas` FOREIGN KEY (`numBoleta_seleccionadas`) REFERENCES `usuarios` (`$user_id`) ON DELETE CASCADE;"; 
    $query = "DELETE FROM usuarios WHERE usuarios.numBoleta = '$user_id'";
    //$query = " DELETE FROM `usuarios` WHERE `usuarios`.`numBoleta` = \'2016630444\'"?";
    //DELETE FROM `usuarios` WHERE `usuarios`.`numBoleta` = \'2016630444\'"?
    $result = mysqli_query($con, $quer);
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>