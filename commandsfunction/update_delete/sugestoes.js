/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                var dados = {
                    btn_listar_sugestao  : true,
                    id_mensagem          : identificador
                }
                $.get('commandscontrol/Contato.php', dados, function(retorno) {
                    var objMensagem = jQuery.parseJSON(retorno);
                    console.log(objMensagem);

                    if (objMensagem.type == "success") {
                        var conteudoModal;

                        dados_mensagem = objMensagem.data[0];

                        $(".conteudo_modal_lg").html('');

                        conteudoModal = `
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                            <h5>
                                            <button class="btn btn-link" type="button">
                                                Visualizar sugestão
                                            </button>
                                            </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="ml-3 mr-3">
                                                <div class="col pl">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Email*" id="id_nome" value="Email: ${dados_mensagem.email}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Nome*" id="id_nome" value="Nome: ${dados_mensagem.nome}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Whatsapp*" id="id_nome" value="Whatsapp: ${dados_mensagem.whatsapp}" disabled>
                                                        </div>
                                                    </div>	
                                                    <div class="row">
                                                        <div class="col-lg mt-2">                                                            
								                            <textarea name="message" id="id_message" placeholder="Mensagem*" maxlength="255" rows="4" disabled>Sugestão: ${dados_mensagem.mensagem}</textarea>
                                                        </div>
                                                    </div>								
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                        $(".conteudo_modal_lg").html(conteudoModal);
                        
                        if ($(".modal_system_open_class").modal("hide")) {
                            $(".modal_system_open_class").modal("show");
                        }
                        
                    } else if (objMensagem.type != "success") {
                        exibirModal(objMensagem.data, false, true);
                    }
                });
            }else if (btn_clicked === "btn_nm_remove") {
                $('#id_opc_delete').val(identificador);
                $('.modal_system_delete').modal('show');
            }
        }
    });

    $(document).on('click', '#id_opc_delete', function() {
        identificador = ($(this).val());
        
        if (identificador) {
            var dados = {
                btn_apagar   : true,
                id_sugestao    : identificador
            }
    
            $.post('commandscontrol/Contato.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");

                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0],true, true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0], false, true);
                    }
                }
            });
        }
    });
});