$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "api/controllers/Encomendas.php", data : {listarEncomendasTable : true}, type: "POST"},
        "deferRender": true
    } );
} );