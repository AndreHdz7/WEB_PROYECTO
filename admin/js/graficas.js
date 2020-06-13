
function readGraficas() {
   
        $('#cargaLineal').load('PHP/lineal.php');
        $('#cargaBarras').load('PHP/barras.php');
        $('#cargaRUA').load('PHP/barras2.php');
        $('#cargaTOP3').load('PHP/top3materias.php');
       
    
}
(function ($) { $(document).ready(function(){ 
    readGraficas()}
    ); })(jQuery); 