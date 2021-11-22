/* INSERIR ENCOMENDA */
$(function() {

    $(document).on('click', '.modal_system_open', function() {
        value = ($(this).attr('name')).split("-|-");

        btn_clicked     = value[0];
        identificador   = value[1];
        
        if (identificador) {
            if (btn_clicked === "btn_nm_edit") {
                var dados = {
                    btn_listar_encomenda  : true,
                    id_encomenda          : identificador
                }

                $.get('../commandscontrol/Encomendas.php', dados, function(retorno) {
                    var objEncomenda = jQuery.parseJSON(retorno);
                    
                    if (objEncomenda.type == "success") {
                        var encomenda = objEncomenda.data;

                        // id_encomenda          = encomenda[0].id_encomenda;
                        // nome_encomenda        = encomenda[0].nome_encomenda;
                        // preco_encomenda       = encomenda[0].preco_encomenda;
                        // qtd_encomenda         = encomenda[0].quatidade_disponivel;
                        // img_encomenda         = encomenda[0].imagem_encomenda;
                        // categoria_encomenda   = encomenda[0].nome_categoria;

                        /* DADOS USUÁRIO */
                        var nome_autor = encomenda[0].nome;
                        var email_autor = encomenda[0].email;
                        var tipo_usuario = encomenda[0].tipo_usuario;
                        /* FIM DADOS USUÁRIO */

                        /* DADOS ENCOMENDA */
                        var id_encomenda = encomenda[0].id_encomenda;
                        var id_cor_produto = encomenda[0].id_cor_produto;
                        var id_tamanho_produto = encomenda[0].id_tamanho_produto;
                        var cor_produto = encomenda[0].cor;
                        var tamanho_produto = encomenda[0].tamanho;
                        var quantidade = encomenda[0].quantidade;
                        var quatidade_disponivel = encomenda[0].quatidade_disponivel;
                        var data_hora = encomenda[0].data_hora;
                        /* FIM DADOS ENCOMENDA */
                        
                        /* DADOS PRODUTO */
                        var id_produto = encomenda[0].id_produto;
                        var nome_produto = encomenda[0].nome_produto;
                        var preco_produto = encomenda[0].preco_produto;
                        var imagem_produto = encomenda[0].imagem_produto;
                        /* FIM DADOS PRODUTO */

                        var conteudoModal = "";

                        conteudoModal = `
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                        
                                    <div class="row">
                                        <div class="col">
                                            <h5>
                                            <button class="btn btn-link" type="button">
                                                Visualizar Encomenda
                                            </button>
                                            </h5>
                                        </div>
                                        <div class="col mr-3">
                                            <h4><a><i class="fas fa-window-close close-btn float-right mt-4 mr-3" data-dismiss="modal"></i></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="ml-3 mr-3">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-lg ml-1">
                                                        <h6 class="">Dados usuário :</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Autor da encomenda: " id="id_nome_autor" value="Autor: ${nome_autor}" required disabled>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email: " id="email_autor" value="Email: ${email_autor}" required disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <input type="text" placeholder="Telefone: " id="telefone_autor" value="Telefone: ${email_autor}" required disabled>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" placeholder="Whatsapp: " id="whatsapp_autor" value="Whatsapp: ${email_autor}" required disabled>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" placeholder="Status: " id="status_autor" value="Status: ${tipo_usuario}" required disabled>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg ml-1">
                                                        <h6 class="">Dados encomenda :</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Cor: " id="id_cor" value="Cor: ${cor_produto}" required disabled>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Tamanho: " id="id_tamanho" value="Tamanho: ${tamanho_produto}" required disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <input type="text" placeholder="Solicitado: " id="id_qtd_solicitado" value="Solicitado: ${quantidade}" required disabled>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" placeholder="Disponível: " id="id_qtd_disp" value="Disponível: ${quatidade_disponivel}" required disabled>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" placeholder="Pedido: " id="id_data_pedido" value="Pedido: ${data_hora}" required disabled>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" placeholder="Prazo: " id="id_prazo_pedido" value="Prazo: ${data_hora}" required disabled>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg ml-1">
                                                        <h6 class="">Dados produto :</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg text-center">
                                                                <img class="mt-3 mb-3" src="../commandsview/assets/img/images/${imagem_produto}" alt="${nome_produto}" style="width: 100px; height: 100px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg">
                                                                <input type="text" placeholder="Nome do produto: " id="id_nome_produto" value="Nome do produto: ${nome_produto}" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg">
                                                                <input type="text" placeholder="Preço do produto: " id="id_preco_produto" value="Preço do produto: ${preco_produto}" required disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>								
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        $(".conteudo").html(conteudoModal);
                        $(".modal_system_open_class").modal("hide");
                        $(".modal_system_open_class").modal("show");

                    } else if (objEncomenda.type != "success") {
                        exibirModal(objEncomenda.data, false);
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
                id_encomenda   : identificador
            }

            $.post('commandscontrol/Encomendas.php', dados, function(retorno) {
                var tipo = retorno.indexOf("alert_notification_error");
                retorno = retorno.split("-|-");

                if($('.modal_system_delete').modal('hide')){
                    if (tipo === -1) {
                        exibirModal(retorno[0],true);
                    } else if (tipo > -1) {
                        exibirModal(retorno[0],false);
                    }
                }
            });
        }
    });
    
});