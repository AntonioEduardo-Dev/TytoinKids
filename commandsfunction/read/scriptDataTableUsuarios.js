
$(document).ready(function() {    
    var table = $('#table_dinamic_js').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {url: "commandscontrol/Usuarios.php", data : {listarUsersTable : true}, type: "POST"},
        "deferRender": true
    } );
} );