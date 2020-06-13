<?php
require_once "conexion.php";
$conexion = conexion();
$sql = "SELECT count(materia) as total from materias_disponibles";
$result = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_assoc($result);
$arr = array();
$arrC = array();
// echo $mostrar['total'];
for ($i = 0; $i < $mostrar['total']; $i++) {
    $sqln1 = "SELECT count(*) as totalM from materia_seleccionadas  where idMateria_seleccionadas= $i";
    $resultn1 = mysqli_query($conexion, $sqln1);
    $mostrarn1 = mysqli_fetch_assoc($resultn1);
    //echo $mostrarn['totalM'];
    array_push($arr, intval($mostrarn1['totalM']));
    array_push($arrC, intval($mostrarn1['totalM']));
}
// print_r ($arr);
//$j=$mostrar['total'];
asort(($arr));
asort($arrC);
$arr2 = array();

$top1 = array_pop($arr);
$top2 = array_pop($arr);
$top3 = array_pop($arr);

//$TreeKeys = array_reverse($arr, true);

$topArrKey1 = (array_keys($arrC, $top1));
$topArrKey2 = (array_keys($arrC, $top2));
$topArrKey3 = array_keys($arrC, $top3);






$conexion2 = conexion();


$sqlNombreMateria1 = "SELECT materia,profesor from materias_disponibles where idMateria= '$topArrKey1[0]' ";
$sqlNombreMateria2 = "SELECT materia,profesor from materias_disponibles where idMateria= '$topArrKey2[0]' ";
$sqlNombreMateria3 = "SELECT materia,profesor from materias_disponibles where idMateria= '$topArrKey3[0]' ";

$resultF1 = mysqli_query($conexion2, $sqlNombreMateria1);
$resultF2 = mysqli_query($conexion2, $sqlNombreMateria2);
$resultF3 = mysqli_query($conexion2, $sqlNombreMateria3);

$extraido1 = mysqli_fetch_array($resultF1);
$extraido2 = mysqli_fetch_array($resultF2);
$extraido3 = mysqli_fetch_array($resultF3);

$arrX = array();
array_push($arrX, $extraido1[0]);
array_push($arrX, $extraido2[0]);
array_push($arrX, $extraido3[0]);

$arrY = array();
array_push($arrY, $top1);
array_push($arrY, $top2);
array_push($arrY, $top3);
/*
print_r($arrX[0]);
print_r($arrX[1]);
print_r($arrX[2]);
print_r($arrY[0]);
print_r($arrY[1]);
print_r($arrY[2]);
*/
$datosXF = json_encode($arrX);

$datosYF = json_encode($arrY);


?>

<div id="graficaTOP3">
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
        function tomarCount(json) {
            var counter = JSON.parse(json);
            return counter;
        }
    </script>



    <script type="text/javascript">
        datosYFinal = crearCadenaBarras('<?php echo $datosYF ?>');
        datosXFinal = crearCadenaBarras('<?php echo $datosXF ?>');
        


        var data = [{
                    x: datosXFinal,
                    y: datosYFinal,
                    type: 'bar',
                    marker: {
                        color: 'rgb(158,202,225)',
                        opacity: 0.6,
                        line: {
                            color: 'rgb(8,48,107)',
                            width: 1.5
                        }

                    }}];
                var layout2 = {
                    title: 'TOP 3 Materias deseadas',
                    xaxis: {
                        title: ''
                    },
                    yaxis: {
                        title: ''
                    }
                };
                var config = {
                    responsive: true
                }


                Plotly.newPlot('graficaTOP3', data, layout2, config);
    </script>
</div>