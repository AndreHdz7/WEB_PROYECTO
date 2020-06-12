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

?>







<?php
require_once "conexion.php";
$conexion2 = conexion();
$sql2 = "SELECT materia, idMateria from materias_disponibles";
$result2 = mysqli_query($conexion2, $sql2);
$valoresX = array();

while ($ver = mysqli_fetch_row($result2)) {
    array_push($valoresX, $ver[0]); //monto

}

//print_r ($valoresX);
$datosX = json_encode($valoresX);

?>

<div id="graficaBarras">
    <script type="text/javascript">
        function tomarCount(json) {
            var counter = JSON.parse(json);
            return counter;
        }
    </script>
    <script type="text/javascript">
        function crearCadenaBarras(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }

            return arr;
        }
    </script>
    <script type="text/javascript">
      
        datosY = tomarCount('<?php echo $datosY ?>');
        datosY2 = tomarCount('<?php echo $datosY2 ?>');
      
        var trace1 = {
            type: 'pie',
            labels: ['Total Registros', 'Registros aceptados'],
            value: [parseInt(datosY),parseInt(datosY2)],
            marker: {
                color: '#C8A2C8',
                line: {
                    width: 2.5
                }
            }
        };

        var data = [trace1];

        var layout = {
            title: 'Relación registros y Registros aceptados',
            font: {
                size: 18
            }
        };

        var config = {
            responsive: true
        }

        Plotly.newPlot('myDiv', data, layout, config);
    </script>



</div>