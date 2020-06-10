<?php
	// include Database connection file 
	include("db_connection.php");
    

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>idBoleta.</th>
							<th>correoAlumno</th>
							<th>passwordAlumno</th>
							<th>userAlumno</th>
                            <th></th>
                            <th></th>
						</tr>';

	$query = "SELECT * FROM usuarios";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['numBoleta'].'</td>
				<td>'.$row['correo'].'</td>
				<td>'.$row['contrasea'].'</td>
				<td>'.$row['usuario'].'</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>