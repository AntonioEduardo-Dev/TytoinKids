/* CONTENT MODAL */
function exibirModal(msgModal, tipoModal) {
    if (tipoModal) {
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body text-center">
                            <div>
                                <h1><i class="fas fa-thumbs-up"></i></h1>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h4>${msgModal}</h4>
                            </div>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");

        setTimeout(function(){
            $(".modal_system_success_class").modal("hide");
            location.reload();
        }, 1500);

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
        
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body text-center">
                            <div>
                                <h1><i class="fas fa-exclamation-circle"></i></h1>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h5>Erro: ${msgModal}</h5>
                            </div>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");
        
        setTimeout(function(){
            $(".modal_system_success_class").modal("hide");
            location.reload();
        }, 2000);
    }
}
