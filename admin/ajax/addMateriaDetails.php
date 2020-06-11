<?php
    if(isset($_POST['idMateria']) && isset($_POST['nombreA']) && isset($_POST['profesor'])
    && isset($_POST['cupo']) && isset($_POST['salon']) && isset($_POST['horario']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$idMateria = $_POST['idMateria'];
		$nombreA = $_POST['nombreA'];
		$profesor = $_POST['profesor'];
        $cupo = $_POST['cupo'];
		$salon = $_POST['salon'];
		$horario = $_POST['horario'];
        $sql="SELECT count(idMateria) as total from materias_disponibles";
        $result2=mysqli_query($con,$sql);
        $mostrar = mysqli_fetch_assoc($result2);
        $var=(($mostrar['total'])+1);
        echo "$var";
		$query = "INSERT INTO `materias_disponibles` (`idMateria`, `materia`, `profesor`, `cupo`, `salon`, `horario`) VALUES('$var', '$nombreA', '$profesor', '$cupo', '$salon', '$horario')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>