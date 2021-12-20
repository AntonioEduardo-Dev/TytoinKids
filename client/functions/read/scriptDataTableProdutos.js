
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "api/controllers/Produtos.php", data : {listarProdutosTable : true}, type: "POST"},
        "deferRender": true
    } );
} );