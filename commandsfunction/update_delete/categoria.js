/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                $(".conteudo_modal_sm").html('');
            }else if (btn_clicked === "btn_nm_remove") {
                var dados = {
                    btn_apagar   : btn_clicked,
                    id_categoria    : identificador
                }
        
                $.post('commandscontrol/Categorias.php', dados, function(retorno) {
                    var tipo = retorno.indexOf("alert_notification_error");
                    retorno = retorno.split("-|-");
                    
                    if (tipo === -1) {
                        exibirModal(retorno[0],true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0],false);
                    }
                });
            }
        }
    });
});