<?php
    require_once "conexion.php";
    $conexion = conexion();
    $sql="SELECT count(materia) as total from materias_disponibles";
    $result=mysqli_query($conexion,$sql);
    $mostrar = mysqli_fetch_assoc($result);
    $arr=array();
   // echo $mostrar['total'];
    for($i = 0; $i<$mostrar['total']; $i++){
        $sqln="SELECT count(*) as totalM from materia_seleccionadas  where idMateria_seleccionadas= $i";
        $resultn=mysqli_query($conexion,$sqln);
        $mostrarn = mysqli_fetch_assoc($resultn);
        //echo $mostrarn['totalM'];
        array_push($arr,$mostrarn['totalM']);
    }
   // print_r ($arr);
    $datosY=json_encode($arr);

?>







<?php 
    require_once "conexion.php";
    $conexion2 = conexion();
    $sql2="SELECT materia, idMateria from materias_disponibles";
    $result2=mysqli_query($conexion2,$sql2);
    $valoresX=array();
   
    while ($ver = mysqli_fetch_row($result2)) {
		array_push($valoresX, $ver[0]); //monto
	 
    }
   
    //print_r ($valoresX);
    $datosX=json_encode($valoresX);

?>

<div id="graficaBarras">
    <script type="text/javascript">
        function tomarCount(json){
            var counter = JSON.parse(json);
            return counter;
    }
    </script>
    <script type="text/javascript">
        function crearCadenaBarras(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed) {
				arr.push(parsed[x]);
			}

			return arr;
		}
    </script>
    <script type="text/javascript">
    
    datosY=crearCadenaBarras('<?php echo $datosY ?>');
    datosX=crearCadenaBarras('<?php echo $datosX ?>');
    
        var data = [
        {
            x: datosX,
            y: datosY,
            type: 'bar'
        }
        ];
        var layout2 = {
			title: 'Relacion materias inscritas',
			xaxis: {
				title: ''
			},
			yaxis: {
				title: 'Total inscritas'
			}
		};
        Plotly.newPlot('graficaBarras', data,layout2);
    </script>
</div>