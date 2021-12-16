/* INSERIR CATEGORIA */
$(function() {
    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                var dados = {
                    btn_listar_categoria  : true,
                    id_categoria          : identificador
                }
                $.get('commandscontrol/Categorias.php', dados, function(retorno) {
                    var objCategoria = jQuery.parseJSON(retorno);

                    if (objCategoria.type == "success") {
                        var conteudoModal;

                        dados_categoria = objCategoria.data[0];

                        $(".conteudo_modal_lg").html('');

                        conteudoModal = `
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                            <h5>
                                            <button class="btn btn-link" type="button">
                                                Editar Produto
                                            </button>
                                            </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="ml-3 mr-3">
                                                <div class="col pl">
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <p class="">Categoria*
                                                                <input type="text" placeholder="Categoria*" id="id_nome_categoria" value="${dados_categoria.nome_categoria}" required>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-lg">
                                                            <div class="col-lg mt-1">
                                                                <h6 class="">Itens com * são obrigatórios</h6>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <div class="row mt-3">
                                                        <div class="col-lg conteudo_alerta">
                                                        </div>
                                                    </div>										
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input hidden value="${(identificador).replace(" ", "")}" id="id_editar_produto_hidden">
                                                            <input type="submit" name="cadastrar" value="Editar" id="id_editar_produto">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="submit" name="cancelar" value="Cancelar" id="id_cancel" data-dismiss="modal">
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
                        
                    } else if (objCategoria.type != "success") {
                        exibirModal(objCategoria.data, false, true);
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
                id_categoria    : identificador
            }
    
            $.post('commandscontrol/Categorias.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");

                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0], true, true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0], false, true);
                    }
                }
            });
        }
    });

    $(document).on('click', '#id_editar_produto', function() {
        identificador = ($("#id_editar_produto_hidden").val());
        categoria_desc = ($("#id_nome_categoria").val());
        
        if (identificador) {
            var dados = {
                btn_editar      : true,
                id_categoria    : identificador,
                categoria_desc
            }
            
            $.post('commandscontrol/Categorias.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");

                if($('.modal_system_open_class').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0], true, true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0], false, true);
                    }
                }
            });
        }
    });
});