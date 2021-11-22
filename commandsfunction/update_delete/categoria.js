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
                $('#id_opc_delete').val(identificador);
                $('.modal_system_delete').modal('show');
            }
        }
    });

    $(document).on('click', '#id_opc_delete', function() {
        identificador = ($(this).val());
        
        if (identificador) {
            var dados = {
                btn_apagar   : true,
                id_categoria    : identificador
            }
    
            $.post('commandscontrol/Categorias.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");

                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0],true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0],false);
                    }
                }
            });
        }
    });
});