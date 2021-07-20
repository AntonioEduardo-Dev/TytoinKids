/* Content Modal */
function exibirModal(msgModal, tipoModal, corModal) {
    if (tipoModal) {
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body">
                            <div class="form-group">
                                <h5>`+msgModal+`</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");

    }else{
        switch (msgModal) {
            case "":
                msgModal = "Preencha todos os campos!";
                break;

            case "alert_notification_error_empty!":
                msgModal = "Preencha todos os campos!";
                break;
        
            default:
                msgModal = "Ocorreu um erro inesperado!";
                break;
        }
        
        $(".conteudo_modal_sm").html('');

        var conteudo = `<div class="modal-body">
                            <div class="form-group">
                                <h5>Erro: `+msgModal+`</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>`;

        $(".conteudo_modal_sm").append(conteudo);
        $(".modal_system_success_class").modal("hide");
        $(".modal_system_success_class").modal("show");
    }
}
