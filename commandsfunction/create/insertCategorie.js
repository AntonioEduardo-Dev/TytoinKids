/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '#id_cad', function() {
        $("#id_cad").prop('disabled', true);

        var dados = {
            btn_cadastrar   : $("#id_cad").val(),
            categ_nome      : $("#id_nome").val()
        }

        $.post('commandscontrol/Categorias.php', dados, function(retorno) {
            var tipo = retorno.indexOf("alert_notification_error");
            retorno = retorno.split("-|-");

            if (tipo === -1) {
                exibirModalAlerta(retorno[0],true,"alert-success");
            } else if (tipo > -1) {
                exibirModalAlerta(retorno[0],false,retorno[1]);
            }
        });
        
    });
});