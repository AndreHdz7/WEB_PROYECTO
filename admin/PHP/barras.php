<?php
require_once "conexion.php";
$conexion = conexion();
$sql = "SELECT count(materia) as total from materias_disponibles";
$result = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_assoc($result);
$arr = array();
$arrC = array();
$i = 0;
// echo $mostrar['total'];
for ($i = 0; $i < $mostrar['total']; $i++) {
    $sqln1 = "SELECT count(*) as totalM from materia_seleccionadas  where idMateria_seleccionadas= $i";
    $resultn1 = mysqli_query($conexion, $sqln1);
    $mostrarn1 = mysqli_fetch_assoc($resultn1);
    //echo $mostrarn['totalM'];
    array_push($arr, intval($mostrarn1['totalM']));
    array_push($arrC, intval($mostrarn1['totalM']));
}

$arrXX = array();
$arrYY = array();
$conexion2 = conexion();
$conexion3 = conexion();
//print_r($mostrar['total']);
$QUERY = "SELECT idMateria FROM materias_disponibles INTERSECT SELECT idMateria_seleccionadas 
FROM materia_seleccionadas as Ms INNER JOIN materias_disponibles AS Md ON Ms.idMateria_seleccionadas=Md.idMateria";
$resultQ = mysqli_query($conexion2, $QUERY);
mysqli_data_seek($resultQ,0);
while($row = mysqli_fetch_row($resultQ)){//Columna
    array_push($arrXX,$row[0]);
}
$total = count($arrXX);
for($i = 0; $i< $total; $i++){
    $QUERY2 = "SELECT materia FROM materias_disponibles where idMateria= '$arrXX[$i]'";
    $resultQ2 = mysqli_query($conexion2, $QUERY2);
    mysqli_data_seek($resultQ2,0);
    $row2 = mysqli_fetch_row($resultQ2);
    array_push($arrYY,$row2[0]);
}
/*
for ($i=0; $i< $mostrar['total'];$i++) {
    require_once "conexion.php";
    $conexionFFF = conexion();
    $topFF = array_pop($arr);
    $topArrKey1FF = (array_keys($arrC, $topFF));
    $sqlNombreMateria1FF = "SELECT materia,profesor from materias_disponibles where idMateria= '$topArrKey1FF[0]' ";
    $resultFFF = mysqli_query($conexionFFF, $sqlNombreMateria1FF);
    $extraido1FF = mysqli_fetch_array($resultFFF);
    array_push($arrXX, $extraido1FF[0]);
    array_push($arrYY, $topFF);
    mysqli_close(conexion());
    
}
*/

//print_r($arrXX);

//print_r($arrYY);

$datosXFF = json_encode($arrXX);
$datosYFF = json_encode($arrYY);

?>

<div id="Barras">
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
        datosYFinalF = crearCadenaBarras('<?php echo $datosYFF ?>');
        datosXFinalF = crearCadenaBarras('<?php echo $datosXFF ?>');
     

        var dataFF = [{
            x: datosXFinalF,
            y: datosYFinalF,
            type: 'bar',
            marker: {
                color: 'rgb(100,100,225)',
                opacity: 0.6,
                line: {
                    color: 'rgb(8,148,107)',
                    width: 1.5
                }

            }
        }];
        var layout2 = {
            title: 'Relación materias/registros',
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


        Plotly.newPlot('Barras', dataFF, layout2, config);
    </script>
</div>