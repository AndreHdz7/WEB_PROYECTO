<?php
	// include Database connection file 
	include("db_connection.php");
    

	// Design initial table header 

	$data = '
				<table class="table table-bordered table-striped"">
							<tr>	
								<th scope="col">Id Materia</th>
								<th scope="col">Nombre de la materia</th>
								<th scope="col" class="text-center">Profesor</th>
                                <th scope="col" class="text-right">Cupo</th>
                                <th scope="col" class="text-center">Salon</th>
                                <th scope="col" class="text-right">Horario</th>
                                <th scope="col" class="text-right"> Configurar <img class="icon" src="img/config.png"  width="50"  /><a href="#"></th>
       
								
							</tr>
					</thead>
				<tbody>	
					';

	$query = "SELECT * FROM materias_disponibles";

	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
		echo "<center><img src='../img/logo.png' id='logo'>
                  <br><h3>No encontramos informacion con los datos proporcionados</h3>
                  <br><a href='../materiasCRUD.php' class='btn center'>Regresar </a></center>";
   
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
			$data .= '
			<tr>
				<td scope="row">'.$row['idMateria'].'</td>
                <td scope="row">'.$row['materia'].'</td>
                <td scope="row">'.$row['profesor'].'</td>
                <td scope="row">'.$row['cupo'].'</td>
                <td scope="row">'.$row['salon'].'</td>
				<td scope="row">'.$row['horario'].'</td>
				<td class="text-right">
					<button type="button" class="btn btn-primary btn-mg" data-toggle="modal" data-target="#updateMateria">
						Editar
					</button>
					<button type="button" class="btn btn-danger btn-mg" data-toggle="modal" data-target="#modelDelete">
						Eliminar :0
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