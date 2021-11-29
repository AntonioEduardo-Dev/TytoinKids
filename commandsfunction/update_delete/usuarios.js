/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                var dados = {
                    btn_listar_usuario : true,
                    id_usuario         : identificador
                }
                $.get('commandscontrol/Usuarios.php', dados, function(retorno) {
                    var objCliente = jQuery.parseJSON(retorno);

                    if (objCliente.type == "success") {
                        var conteudoModal;

                        dados_usuario = objCliente.data[0];
                        console.log(dados_usuario);

                        $(".conteudo_modal_lg").html('');   

                        conteudoModal = `
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                            <h5>
                                            <button class="btn btn-link" type="button">
                                                Visualizar usuários
                                            </button>
                                            </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="ml-3 mr-3">
                                                <div class="col pl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Nome*" id="id_nome" value="Nome: ${dados_usuario.nome}" disabled>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Email*" id="id_nome" value="Email: ${dados_usuario.email}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="CPF*" id="id_nome" value="CPF: ${dados_usuario.cpf}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Usuário*" id="id_nome" value="Usuário: ${dados_usuario.tipo_usuario}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Encomendas*" id="id_nome" value="Encomendas: ${dados_usuario.quantidade_encomendas}" disabled>
                                                        </div>
                                                    </div>
                                                    <hr>	
                                                    <div class="row mt-2">
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Telefone*" id="id_nome" value="Telefone: ${dados_usuario.fone}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="WhatsApp*" id="id_nome" value="WhatsApp: ${dados_usuario.whatsapp}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="insta*" id="id_nome" value="Instagram: ${dados_usuario.insta}" disabled>
                                                        </div>
                                                    </div>	
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="CEP*" id="id_nome" value="CEP: ${dados_usuario.cep}" disabled>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Endereço*" id="id_nome" value="Endereço: ${dados_usuario.endereco}" disabled>
                                                        </div>
                                                    </div>	
                                                    <div class="row mt-2">
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Bairro*" id="id_nome" value="Bairro: ${dados_usuario.bairro}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Complemento*" id="id_nome" value="Complemento: ${dados_usuario.complemento}" disabled>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" placeholder="Numero*" id="id_nome" value="Numero: ${dados_usuario.numero}" disabled>
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
                        
                    } else if (objCliente.type != "success") {
                        exibirModal(objCliente.data, false);
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
                id_usuario    : identificador
            }
        }
    });
});