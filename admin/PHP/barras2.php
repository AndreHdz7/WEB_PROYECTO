<?php
require_once "conexion.php";
$conexion = conexion();
$sql = "SELECT count(idRegistro) as total from materia_seleccionadas";
$result = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_assoc($result);
$datosY = json_encode($mostrar['total']);

$sql2 = "SELECT count(RegistroBool) as totalU from revision_materias";
$result2 = mysqli_query($conexion, $sql2);
$mostrar2 = mysqli_fetch_assoc($result2);
$datosY2 = json_encode($mostrar2['totalU']);
//echo "var 1: $datosY, var 2: $datosY2"
?>




<div id="graficaRUA"> 
    <script type="text/javascript">
        function tomarCount(json){
            var counter = JSON.parse(json);
            return counter;
         }
    </script>
    <script type="text/javascript">
     datosY=tomarCount('<?php echo $datosY ?>');
     datosY2=tomarCount('<?php echo $datosY2 ?>');
    var trace1 = {
			labels: ['Solicitudes totales', 'Solicitudes aceptadas'],
			values: [parseInt(datosY),parseInt(datosY2)],
			type: 'pie',
			
		}


    var layout = {
			title: 'Relacion de solicitudes totales y aprobadas',
			
		};

		var data = [trace1];

    Plotly.newPlot('graficaRUA', data,layout);

</script>
</div>