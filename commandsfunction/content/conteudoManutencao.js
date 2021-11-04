/* CONFIRMAÇÃO MODO MANUTENÇÃO */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        var tipo = $(this).val();

        $('.conteudo_modal_sm').html('');
        
        var cardHeader = `<div class="card">
                            <div class="card-header">
                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <h4>Confirmação</h4>
                                    </div>
                                    <div class="col mr-3">
                                        <h4><a><i class="fas fa-window-close close-btn float-right" data-dismiss="modal"></i></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mt-2 ml-3 mr-3">`;
        
        var conteudo            = `<div class="col text-center">
                                        <h4>Voçê tem certeza da sua escolha?</h4>
                                        <div class="form-group row">
                                            <div class="col">
                                                <input type="submit" class="btn btn-login alter_status" name="`+tipo+`" value="Confirmar">
                                            </div>
                                        </div>
                                    </div>`;

        var cardBody = `
                                </div>
                            </div>
                        </div>`;

        var fullCard = cardHeader+conteudo+cardBody;

        $(".conteudo_modal_sm").append(fullCard);

        $('.modal_system_success_class').modal('show')
    });

    $(document).on('click', '.modal_sistem_close', function() {
        $('.modal_system_success_class').modal('hide')
    });

});