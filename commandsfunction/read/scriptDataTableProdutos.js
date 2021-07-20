
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "../commandview/datatable/server_processing_produtos.php", type: "POST"},
        "deferRender": true
    } );
} );