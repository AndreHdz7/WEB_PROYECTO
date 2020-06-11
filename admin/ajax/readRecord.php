<?php
	// include Database connection file 
	include("db_connection.php");
    

	// Design initial table header 

	$data = '
				<table class="table table-bordered table-striped" ">
							<tr>	
								<th scope="col">Número de boleta</th>
								<th scope="col">Correo</th>
								<th scope="col" class="text-center">Contraseña</th>
								<th scope="col" class="text-right">Usuario</th>
								<th scope="col" class="text-right"> Acción<img class="icon" src="img/config.png"  width="50"  /><a href="PHP/graficas.php"></th>
								
								
							</tr>
					</thead>
				<tbody>	
					';

	$query = "SELECT * FROM usuarios";

	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
		echo "<center><img src='../img/logo.png' id='logo'>
                  <br><h3>No encontramos informacion con los datos proporcionados</h3>
                  <br><a href='../obtenerUsuarios.php' class='btn center'>Regresar </a></center>";
   
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
			$data .= '
			<tr>
				<td scope="row">'.$row['numBoleta'].'</td>
				<td scope="row">'.$row['correo'].'</td>
				<td scope="row"> "********" </td>
				<td scope="row">'.$row['usuario'].'</td>
				<td class="text-right">
					<button type="button" class="btn btn-primary btn-mg" data-toggle="modal" data-target="#update_user_modal">
						Editar
					</button>
					<button type="button" class="btn btn-danger btn-mg" data-toggle="modal" data-target="#modelId2">
						Eliminar
					</button>
				</td>
				</tr>
				</tbody>
				';
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