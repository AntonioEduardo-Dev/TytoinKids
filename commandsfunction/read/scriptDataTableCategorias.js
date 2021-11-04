
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "../commandsview/datatable/server_processing_categorias.php", type: "POST"},
        "deferRender": true
    } );
    
    $('#table_dinamic_js tbody').on('click', '.modal_system_open', function () {
        
    /*
        var data = table.row(this).data();
        Avalue = $(this).attr('name');
        alert( 'You clicked on '+Avalue+'\'s row' );
        
            var data = table.row( $(this).parents('tr') ).data();
            alert( data[4] +" Linha é: "+ data[ 4 ] );
        */

    } );
} );