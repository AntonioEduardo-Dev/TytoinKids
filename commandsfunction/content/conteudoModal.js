/* CONTENT MODAL */
function exibirModal(msgModal, tipoModal, corModal) {
    if (tipoModal) {
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body text-center">
                            <div>
                                <h1><i class="fas fa-thumbs-up"></i></h1>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h4>`+msgModal+`</h4>
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
        
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body text-center">
                            <div>
                                <h1><i class="fas fa-exclamation-circle"></i></h1>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h5>Erro: `+msgModal+`</h5>
                            </div>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");
        
        setTimeout(function(){
            $(".modal_system_success_class").modal("hide");
            location.reload();
        }, 1500);
    }
}
