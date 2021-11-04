/* lISTAR CATEGORIAS E PRODUTOS*/
$(function() {
    $(document).on('click', '.btn_logar_now', function() {
        var id_email = $("#floatingInputEmail").val();
        var id_senha = $("#floatingInputPassword").val();

        login = {btn_realizar_login : true, id_email, id_senha}
    
        $.post('commandscontrol/Authentication.php', login, function(retorna) {
            var tipo = retorna.indexOf("alert_notification_error");
            retorna = retorna.split("-|-");
            
            if (tipo === -1) {
                exibirModal(retorna[0],true);
            } else if (tipo > -1) {
                exibirModal(retorna[0],false);
            }
        });
    });
});