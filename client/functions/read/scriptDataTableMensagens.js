
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "api/controllers/Contato.php", data : {listarMensagensTable : true}, type: "POST"},
        "deferRender": true
    } );
} );