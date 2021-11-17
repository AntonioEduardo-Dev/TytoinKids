$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "commandsview/datatable/server_processing_encomendas.php", type: "POST"},
        "deferRender": true
    } );
} );