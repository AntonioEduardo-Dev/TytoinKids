/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '#id_cad_duvida', function() {
        $("#id_cad_duvida").prop('disabled', true);
        
        var form_nome       = $("#id_name").val();
        var form_email      = $("#id_email").val();
        var form_fone       = $("#id_phone").val();
        var form_mensagem   = $("#id_message").val();

        var dados = {
            form_cadastrar_duvida   : true,
            nome                    : form_nome,
            email                   : form_email,
            fone                    : form_fone,
            mensagem                : form_mensagem
        }
        
        $.post('api/controllers/Contato.php', dados, function(retorno) {
            var tipo = retorno.indexOf("alert_notification_error");
            retorno = retorno.split("-|-");

            if (tipo === -1) {
                exibirModalAlerta(retorno[0], true, "alert-success");
            } else if (tipo > -1) {
                exibirModalAlerta(retorno[0], false, retorno[1]);
            }

            $("#id_cad_duvida").prop('disabled', false);
        });
        
    });
});