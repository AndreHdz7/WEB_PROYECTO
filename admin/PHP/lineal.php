

<?php
require_once "conexion.php";
$conexion3 = conexion();
$conexion4 = conexion();
$arr4 = array();
$sql3 = "SELECT count(numBoleta) as totalU from usuarios ";
$sqlRT="SELECT numBoleta FROM usuarios INTERSECT (SELECT numBoleta FROM usuarios as Us INNER JOIN materia_seleccionadas AS Ms ON Ms.numBoleta_seleccionadas=Us.numBoleta)";

$result3 = mysqli_query($conexion3, $sql3);
$mostrarn = mysqli_fetch_assoc($result3);

$resultQ4 = mysqli_query($conexion4, $sqlRT);
mysqli_data_seek($resultQ4,0);
while($row = mysqli_fetch_row($resultQ4)){//Columna
    array_push($arr4,$row[0]);
}
$total4=count($arr4);




$DatoUserRT = json_encode($total4);
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
        datosY2 = tomarCount('<?php echo $DatoUserRT ?>');
        var ultimateColors = [


            ['rgb(153, 255, 201)', 'rgb(51, 255, 255)', 'rgb(151, 179, 100)', 'rgb(175, 49, 35)', 'rgb(36, 73, 147)'],
            ['rgb(146, 123, 21)', 'rgb(177, 180, 34)', 'rgb(206, 206, 40)', 'rgb(175, 51, 21)', 'rgb(35, 36, 21)']
        ];
        var trace1 = {
            labels: ['Usuarios','Usuarios Registro Pendiente'],
            values: [parseInt(datosY), parseInt(datosY2)],
            type: 'pie',
            marker: {
                colors: ultimateColors[0]
            },
            textinfo: "labels+percent",
            insidetextorientation: "radial"

        }


        var layout = {
            title: 'Usuarios Loggeados',
            
            
        };
        var config = {responsive: true}

       
        var data = [trace1];

        Plotly.newPlot('graficaL', data, layout,config);
    </script>
</div>