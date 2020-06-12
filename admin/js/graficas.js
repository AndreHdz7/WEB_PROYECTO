
function readGraficas() {
   
        $('#cargaLineal').load('PHP/lineal.php');
		$('#cargaBarras').load('PHP/barras.php');
        $("#recarga").html(data);
    
}
(function ($) { $(document).ready(function(){ 
    readGraficas()}
    ); })(jQuery); 