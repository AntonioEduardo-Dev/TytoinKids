
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "api/controllers/Usuarios.php", data : {listarUsersTable : true}, type: "POST"},
        "deferRender": true
    } );
} );