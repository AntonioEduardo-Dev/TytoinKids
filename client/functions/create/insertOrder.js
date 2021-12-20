/* INSERIR ENCOMENDA */
$(function() {

    $(document).on('click', '.add_item_cart', function() {
        var dados = {
            btn_cadastrar   : true,
        }

        $.post('api/controllers/Encomendas.php', dados, function(retorno) {
            var tipo = retorno.indexOf("alert_notification_error");
            retorno = retorno.split("-|-");

            if (tipo === -1) {
                exibirModal(retorno[0], true, true);
            } else if (tipo > -1) {
                exibirModal(retorno[0], false, true);
            }
        });
        
    });
});