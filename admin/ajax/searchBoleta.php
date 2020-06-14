<?php
   
    include("db_connection.php");
    $data=0;
    $NumBoleta = $_POST['numBoleta'];
    //print_r($NumBoleta);
    $query = "SELECT idMateria FROM usuarios WHERE numBoleta = '$NumBoleta'";
    //$query = " DELETE FROM `usuarios` WHERE `usuarios`.`numBoleta` = \'2016630444\'"?";
    //DELETE FROM `usuarios` WHERE `usuarios`.`numBoleta` = \'2016630444\'"?
    //$result = mysqli_query($con, $query);
    $result = mysqli_query($con, $query);
    
    if(empty($result)){
        $data = 0;
    }else{
        $data = 1;
    }
    
    
    //$data = 1;
        
   echo json_encode(intVal($data)) ;
   //return (intVal($data));
    
    
?>