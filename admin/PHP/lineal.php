<?php
    require_once "conexion.php";
    $conexion3 = conexion();
    $sql3="SELECT count(numBoleta) as totalU from usuarios ";
    $result3=mysqli_query($conexion3,$sql3);
    $mostrarn = mysqli_fetch_assoc($result3);
    //echo $mostrarn['totalU'];
    
    $DatoUser = json_encode($mostrarn['totalU']);

?>
<div id="graficaL"> 
    <script type="text/javascript">
        function tomarCount(json){
            var counter = JSON.parse(json);
            return counter;
         }
    </script>
    <script type="text/javascript">
     datosY=tomarCount('<?php echo $DatoUser ?>');
     
    var trace1 = {
			labels: ['Usuarios'],
			values: [parseInt(datosY)],
			type: 'pie',
			
		}


    var layout = {
			title: 'Usuarios loggueados en el sistema',
			xaxis: {
				title: 'Total Usuarios'
			},
			yaxis: {
				title: 'Usuarios'
			}
		};

		var data = [trace1];

    Plotly.newPlot('graficaL', data,layout);

</script>
</div>