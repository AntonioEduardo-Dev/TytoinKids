/* INSERIR PRODUTOS */
$(function() {

    $(document).on('click', '#id_cad', function() {
        var dados = {
            btn_cadastrar   : $("#id_cad").val(),
            categ_nome      : $("#id_nome").val()
        }

        $.post('../commandscontrol/Categorias.php', dados, function(response) {
            console.log("Response: "+response);
            
            var tipo = response.indexOf("alert_notification_error");
            if (tipo === -1) {
                console.log('ok');
            } else if (tipo > -1) {
                console.log('Ocorreu um erro');
            }
        });
        
    });
});