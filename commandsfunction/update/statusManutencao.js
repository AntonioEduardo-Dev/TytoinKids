/* ATUALIZAR STATUS */
$(function() {

    $(document).on('click', '.alter_status', function() {
        var tipo = $(this).attr('name');

        if(tipo === "Ativar"){
            status = 1;
            alterStatus(status);
        }else if(tipo === "Desativar"){
            status = 0;
            alterStatus(status);
        }else{
            $('.modal_system_open_class').modal('hide');
        }

    });

    function alterStatus(status) {
        var dados = {
            btn_alterar_status : status
        }

        $.post('../commandscontrol/setManutencao.php', dados, function(response) {
            console.log("Response: "+response);
            
            var tipo = response.indexOf("alert_notification_error");
            
            if (tipo === -1) {
                console.log('ok');
                $('.modal_system_open_class').modal('hide');
            } else if (tipo > -1) {
                console.log('Ocorreu um erro');
                $('.modal_system_open_class').modal('hide');
            }
        });
    }
});
