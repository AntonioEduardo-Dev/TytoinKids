/* ATUALIZAR STATUS */
$(function() {
    verify();

    $(document).on('click', '.alter_status', function() {
        var tipo = $(this).attr('name');
        
        if(tipo === "Ativar"){
            status = 1;
            alterStatus(status);
        }else if(tipo === "Desativar"){
            status = 0;
            alterStatus(status);
        }else{
            $('.modal_system_success_class').modal('hide');
        }

    });

    function alterStatus(status) {
        var dados = {
            btn_alterar_status : status
        }

        $.post('../commandscontrol/setManutencao.php', dados, function(response) {
            var tipo = response.indexOf("alert_notification_error");
            
            $('.modal_system_success_class').modal('hide');
            
            setTimeout(function(){
                if (tipo === -1) {
                    exibirModal("Status alterado com sucesso!",true);
                } else if (tipo > -1) {
                    exibirModal(values[0],false);
                }
            }, 800);
        });
    }

    function verify() {
        var dados = {
            verificarStatus : true
        }

        $.post('../commandscontrol/Manutencao.php', dados, function(response) {
            console.log("Response: "+response);
            
            var tipo = response.indexOf("alert_notification_error");
            
            if (tipo === -1) {
                if (response == "true") {
                    $("[name='btn_on']").prop("disabled",true);
                    $("[name='btn_off']").prop("disabled",false);
                }else{
                    $("[name='btn_off']").prop("disabled",true);
                    $("[name='btn_on']").prop("disabled",false);
                }
            } else if (tipo > -1) {
                console.log('Ocorreu um erro');
            }
        });
    }
});
