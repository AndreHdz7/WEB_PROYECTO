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
        function tomarCount(json) {
            var counter = JSON.parse(json);
            return counter;
        }
    </script>
    <script type="text/javascript">
        datosY = tomarCount('<?php echo $datosY ?>');
        datosY2 = tomarCount('<?php echo $datosY2 ?>');
        var ultimateColors = [
       
         
            ['rgb(255, 128, 0)', 'rgb(0, 205, 0)', 'rgb(151, 179, 100)', 'rgb(175, 49, 35)', 'rgb(36, 73, 147)'],
            ['rgb(146, 123, 21)', 'rgb(177, 180, 34)', 'rgb(206, 206, 40)', 'rgb(175, 51, 21)', 'rgb(35, 36, 21)']
        ];

        var trace1 = {
            labels: ['Solicitudes totales', 'Solicitudes aceptadas'],
            values: [parseInt(datosY), parseInt(datosY2)],
            type: 'pie',
            marker: {
                colors: ultimateColors[0]
            },
            textinfo: "label+percent",
            insidetextorientation: "radial",
            type: 'pie'


        }
        var config = {responsive: true}

        var layout = {
            title: 'Relacion de solicitudes totales y aprobadas',

        };

        var data = [trace1];

        Plotly.newPlot('graficaRUA', data, layout,config);
    </script>
</div>