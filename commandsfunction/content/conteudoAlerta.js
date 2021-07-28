/* CONTENT ALERT/ALERTA */
function exibirModalAlerta(msgModal, tipoModal, corModal) {
    if (tipoModal) {
        $(".conteudo_alerta").html('');

        var conteudo = `<div class="alert `+corModal+`" role="alert">
                            <h4 class="alert-heading">`+msgModal+`</h4>
                            <hr>
                            <p>Ocorreu tudo como o planejado!</p>
                        </div>`;

        if ($(".conteudo_alerta").html(conteudo)) {
            $('.conteudo_alerta').hide();
            $(".conteudo_alerta").slideDown();
            $("#id_cad").prop('disabled', true);

            setTimeout(function(){
                $('.conteudo_alerta').hide('hidden');
                $("#id_cad").prop('disabled', false);
                location.reload();
            }, 1500);
        }

    }else{
        switch (msgModal) {
            case "alert_notification_error!":
                msgModal = "Ocorreu um erro na operação, se o erro persistir entre em contato com a administração!";
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

            case "alert_notification_error_id!":
                msgModal = "Ocorreu um erro na consulta do id do produto!";
                break;
        
            case "alert_notification_error_tam_cor!":
                msgModal = "Ocorreu um erro no modulo de cores e tamanhos, se o erro persistir contate a administração!";
                break;

            case "alert_notification_error_cor!":
                msgModal = "Ocorreu um erro no modulo de cores, se o erro persistir entre em contato com a administração!";
                break;

            case "alert_notification_error_tamanho!":
                msgModal = "Ocorreu um erro no modulo de tamanhos, se o erro persistir entre em contato com a administração!";
                break;
            
            case "Imagem_nao_enviada!":
                msgModal = "Imagem não enviada!";
                break;

            case "Extensao_Invalida!":
                msgModal = "Extensão Inválida!";
                break;

            case "erro_inesperado!":
                msgModal = "Ocorreu um erro inesperado!";
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

        if ($(".conteudo_alerta").html(conteudo)) {
            $('.conteudo_alerta').hide();
            $(".conteudo_alerta").slideDown();
            $("#id_cad").prop('disabled', true);

            setTimeout(function(){
                $('.conteudo_alerta').hide('hidden');
                $("#id_cad").prop('disabled', false);
            }, 2000);
        }

    }
}
