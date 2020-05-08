$(document).ready(function(){
    var DatosTabla;
     // Click, Doble click
    $('#bootstrap-data-table tbody').on('click', 'tr', function() {
         /*Obtiene una coleccion de elementos hijos td que hemos seleccionado
        Con la funcion map(), regresamos un arreglo con los valores que 
        se meten dentro de ella*/
        DatosTabla = $(this).children("td").map(function() {
            return $(this).text();
        }).get();
    });
    
    //Añadimos los datos seleccionados, a la tabla de materias sellecionadas
    var t = $('#Seleccionadas').DataTable();
    $('#bootstrap-data-table tbody').on( 'click', function () {
        t.row.add( [DatosTabla[0],DatosTabla[1],DatosTabla[2]
        ] ).draw( false );
 
    } );
   
});
