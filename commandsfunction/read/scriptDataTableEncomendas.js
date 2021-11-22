$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "commandscontrol/Encomendas.php", data : {listarEncomendasTable : true}, type: "POST"},
        "deferRender": true
    } );
} );