<?php
require_once "conexion.php";
$conexion3 = conexion();
$sql3 = "SELECT count(numBoleta) as totalU from usuarios ";
$result3 = mysqli_query($conexion3, $sql3);
$mostrarn = mysqli_fetch_assoc($result3);
//echo $mostrarn['totalU'];

$DatoUser = json_encode($mostrarn['totalU']);

?>
<div id="graficaL">
    <script type="text/javascript">
        function tomarCount(json) {
            var counter = JSON.parse(json);
            return counter;
        }
    </script>
    <script type="text/javascript">
        datosY = tomarCount('<?php echo $DatoUser ?>');
        var ultimateColors = [


            ['rgb(153, 255, 201)', 'rgb(51, 255, 255)', 'rgb(151, 179, 100)', 'rgb(175, 49, 35)', 'rgb(36, 73, 147)'],
            ['rgb(146, 123, 21)', 'rgb(177, 180, 34)', 'rgb(206, 206, 40)', 'rgb(175, 51, 21)', 'rgb(35, 36, 21)']
        ];
        var trace1 = {
            labels: ['Usuarios'],
            values: [parseInt(datosY)],
            type: 'pie',
            marker: {
                colors: ultimateColors[0]
            },
            textinfo: "label+percent",
            insidetextorientation: "radial"

        }


        var layout = {
            title: 'Usuarios loggueados en el sistema',
            
            
        };
        var config = {responsive: true}

       
        var data = [trace1];

        Plotly.newPlot('graficaL', data, layout,config);
    </script>
</div>