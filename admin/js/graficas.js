
function readGraficas() {
   
        $('#cargaLineal').load('PHP/lineal.php');
        $('#cargaBarras').load('PHP/barras.php');
        $('#cargaRUA').load('PHP/barras2.php');
        $("#recarga").html(data);
    
}
(function ($) { $(document).ready(function(){ 
    readGraficas()}
    ); })(jQuery); 