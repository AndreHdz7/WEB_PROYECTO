<?php
	// include Database connection file 
	include("db_connection.php");
    

	

    $sqlMess = "SELECT `mensaje_publico` FROM `mensaje_publico` WHERE `idmensaje_publico`=1";
    $resultadoMess=mysqli_query($con,$sqlMess);
                  
    $mostrarMess = mysqli_fetch_array($resultadoMess);
    
   
	if (!$resultadoMess = mysqli_query($con, $sqlMess)) {
		exit(mysqli_error($con));
		echo "<center><img src='../img/logo.png' id='logo'>
                  <br><h3>No hay mensajes generales  que mostrar</h3>
                  <br><a href='../materiasCRUD.php' class='btn center'>Regresar </a></center>";
   
    }
    echo $mostrarMess['mensaje_publico'];

?>