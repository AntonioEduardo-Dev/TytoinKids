/* CONTENT MSGS */
function viewMsgs() {
    const mensagens = {
        "alert_notification_error!"                 : "Ocorreu um erro na operação, se o erro persistir entre em contato com o suporte!",
        "alert_notification_error_error_login!"     : "Email do usuário ou senha incorretos. Tente novamente!",
        "alert_notification_error_data_bite!"       : "Verifique dados digitados incorretamente!",
        "alert_notification_error_null!"            : "Verifique possíveis campos nulos!",
        "alert_notification_error_empty!"           : "Preencha todos os campos!",
        "alert_notification_error_categoria_null!"  : "Verifique a categoria selecionada!",
        "alert_notification_error_id!"              : "Ocorreu um erro na consulta do id do produto!",
        "alert_notification_error_tam_person!"      : "Ocorreu um erro no modulo de personagens e tamanhos, se o erro persistir entre em contato com o suporte!",
        "alert_notification_error_person!"          : "Ocorreu um erro no modulo de personagens, se o erro persistir entre em contato com o suporte!",
        "alert_notification_error_tamanho!"         : "Ocorreu um erro no modulo de tamanhos, se o erro persistir entre em contato com o suporte!",
        "alert_notification_error_qtd_disp!"        : "Quantidade solicitada não disponível!",
        "alert_notification_error_id_insert!"       : "Produto já inserido no carrinho!",
        "alert_notification_error_qtd_insert!"      : "Verifique a quantidade selecionada!",
        "alert_notification_error_tam_insert!"      : "Verifique o tamanho selecionado!",
        "alert_notification_error_person_insert!"   : "Verifique o personagem selecionado!",
        "alert_notification_error_cart_empty!"      : "Carrinho vazio!",
        "alert_notification_error_session_empty!"   : "Realize login para continuar!",
        "alert_notification_error_invalid_email!"   : "Email inválido!",
        "alert_notification_error_qtd_empty!"       : "Quantidade vazia!",
        "Imagem_nao_enviada!"                       : "Imagem não enviada!",
        "Extensao_Invalida!"                        : "Extensão Inválida!",
        "erro_inesperado!"                          : "Ocorreu um erro inesperado!!",
        "default"                                   : "Ocorreu um erro inesperado!"
    }

    return mensagens;
}
/* FIM CONTENT MSGS */

/* CONTENT MODAL */
function exibirModal(msgModal, tipoModal, reload_page) {
    if (tipoModal) {
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body text-center">
                            <div>
                                <h1><i class="fas fa-thumbs-up"></i></h1>
                            </div>
                            <hr>
                            <div class="form-group text-dark">
                                <h4>${msgModal}</h4>
                            </div>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");

        setTimeout(function(){
            $(".modal_system_success_class").modal("hide");
            location.reload();
        }, 2500);

    }else{
        var mensagens = viewMsgs();

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

            if (reload_page) {
                location.reload();
            }
        }, 2500);
    }
}
/* FIM CONTENT MODAL */
