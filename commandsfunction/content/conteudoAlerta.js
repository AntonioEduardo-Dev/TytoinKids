/* Content Modal */
function exibirModal(msgModal, tipoModal, corModal) {
    if (tipoModal) {
        $(".conteudo_alerta").html('');

        var conteudo = `<div class="alert `+corModal+`" role="alert">
                            <h4 class="alert-heading">`+msgModal+`</h4>
                            <hr>
                            <p>Ocorreu tudo como o planejado!</p>
                        </div>`;

        if ($(".conteudo_alerta").append(conteudo)) {
            setTimeout(function(){
                $(".conteudo_alerta").hide();
                $("#id_cad").prop('disabled', false);
                location.reload();
            }, 1500);
        }

    }else{
        switch (msgModal) {
            case "alert_notification_error!":
                msgModal = "Ocorreu um erro na operação, se o erro persistir contate a administração!";
                break;

            case "alert_notification_error_data_bite!":
                msgModal = "Verifique dados digitados incorretamente!";
                break;

            case "alert_notification_error_null!":
                msgModal = "Verifique possíveis campos nulos!";
                break;

            case "alert_notification_error_empty!":
                msgModal = "Preencha todos os campos!";
                break;

            case "alert_notification_error_categoria_null!":
                msgModal = "Verifique a categoria selecionada!";
                break;
        
            case "alert_notification_error_tam_cor!":
                msgModal = "Ocorreu um erro no modulo de cores e tamanhos, se o erro persistir contate a administração!";
                break;

            case "alert_notification_error_cor!":
                msgModal = "Ocorreu um erro no modulo de cores, se o erro persistir contate a administração!";
                break;

            case "alert_notification_error_tamanho!":
                msgModal = "Ocorreu um erro no modulo de tamanhos, se o erro persistir contate a administração!";
                break;
        
            default:
                msgModal = "Ocorreu um erro inesperado!";
                break;
        }
        
        $(".conteudo_alerta").html('');

        var conteudo = `<div class="alert `+corModal+`" role="alert">
                            <h4 class="alert-heading">Oops!!!</h4>
                            <hr>
                            <p>`+msgModal+`</p>
                        </div>`;

        if ($(".conteudo_alerta").append(conteudo)) {
            setTimeout(function(){
                $(".conteudo_alerta").hide();
                $("#id_cad").prop('disabled', false);
                location.reload();
            }, 1500);
        }

    }
}
