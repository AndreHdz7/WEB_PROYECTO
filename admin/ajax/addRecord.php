<?php
	if(isset($_POST['idBoleta']) && isset($_POST['correoAlumno']) && isset($_POST['passwordAlumno']) && isset($_POST['userAlumno']))
	{
		// include Database connection file 
		include("db_connection.php");
		// get values 
		$idBoleta = $_POST['idBoleta'];
		$correoAlumno = $_POST['correoAlumno'];
		$passwordAlumno = $_POST['passwordAlumno'];
		$userAlumno = $_POST['userAlumno'];
		
		$query = "INSERT INTO usuarios(numBoleta, correo, contrasea, usuario) VALUES('$idBoleta', '$correoAlumno', '$passwordAlumno', '$userAlumno')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>