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
        const mensagens = {
            "alert_notification_error!"                 : "Ocorreu um erro na operação, se o erro persistir entre em contato com a administração!",
            "alert_notification_error_data_bite!"       : "Verifique dados digitados incorretamente!",
            "alert_notification_error_null!"            : "Verifique possíveis campos nulos!",
            "alert_notification_error_empty!"           : "Preencha todos os campos!",
            "alert_notification_error_categoria_null!"  : "Verifique a categoria selecionada!",
            "alert_notification_error_id!"              : "Ocorreu um erro na consulta do id do produto!",
            "alert_notification_error_tam_cor!"         : "Ocorreu um erro no modulo de cores e tamanhos, se o erro persistir contate a administração!",
            "alert_notification_error_cor!"             : "Ocorreu um erro no modulo de cores, se o erro persistir entre em contato com a administração!",
            "alert_notification_error_tamanho!"         : "Ocorreu um erro no modulo de tamanhos, se o erro persistir entre em contato com a administração!",
            "alert_notification_error_qtd_disp!"        : "Quantidade solicitada não disponível!",
            "alert_notification_error_qtd_insert!"      : "Verifique a quantidade selecionada!",
            "alert_notification_error_cart_empty!"      : "Carrinho vazio!",
            "Imagem_nao_enviada!"                       : "Imagem não enviada!",
            "Extensao_Invalida!"                        : "Extensão Inválida!",
            "erro_inesperado!"                          : "Ocorreu um erro inesperado!",
            "default"                                   : "Ocorreu um erro inesperado!"
        }

        msgModal = mensagens[msgModal] || mensagens.default;

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
