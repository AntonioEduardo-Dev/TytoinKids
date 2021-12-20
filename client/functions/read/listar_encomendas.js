// Exibir dados das encomendas
$(function() {
    const capitalize = (s) => {
        if (typeof s !== 'string') return ''
        return s.charAt(0).toUpperCase() + s.slice(1)
    }

    const verifyColor = (s) => {
        if (s === 'finalizado') return 'success';
        if (s === 'aprovado')   return 'info';
        if (s === 'pendente')   return 'warning';
        if (s === 'recusado')   return 'danger';
    }

    var id_user = $("#id_usuario").val();
    
    if (id_user != "") {
        var dados = {
            btn_listar_encomendas   : true,
            id_usuario              : id_user
        }
        $.get('api/controllers/Encomendas.php', dados, function(retorna) {
            var encomendas = jQuery.parseJSON(retorna);

            $("#tbody_data").html(``);
            if (encomendas.type == "success") {
                encomendas.data.forEach((dados_encomenda, index) => {
                    var status = `
                        <td><span class="badge badge-pill badge-${verifyColor(dados_encomenda.status)}">${capitalize(dados_encomenda.status)}</span></td>
                    `;
    
                    $("#tbody_data").append(`
                        <tr>
                            <td scope="row">${(index+1)}</td>
                            <td>${dados_encomenda.nome_produto}</td>
                            <td>${dados_encomenda.data_hora}</td>
                            <td>${dados_encomenda.quantidade}</td>
                            ${status}
                            <td>
                                <button class="btn btn-lg" name="btn_nm_view" alt="Visualizar" value="${dados_encomenda.id_encomenda}" id="btn_view_order">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            }else{
                $("#tbody_data").append(`
                    <tr>
                        <td colspan="6" class="text-center">${encomendas.data}</td>
                    </tr>
                `);
            }
        });
    }
    
    $(document).on('click', '#btn_view_order', function() {
        var id_encomenda = $(this).val();
        
        var dados = {
            btn_listar_encomenda  : true,
            id_encomenda
        }
        
        $.get('api/controllers/Encomendas.php', dados, function(retorno) {
            var objEncomenda = jQuery.parseJSON(retorno);

            if (objEncomenda.type == "success") {
                var encomenda = objEncomenda.data[0];
                // encomenda = encomenda[0];

                /* DADOS USUÁRIO */
                var nome_autor = encomenda.nome;
                var email_autor = encomenda.email;
                var fone_autor = encomenda.fone;
                var whats_autor = encomenda.whatsapp;
                /* FIM DADOS USUÁRIO */

                /* DADOS ENCOMENDA */
                var personagem_produto = encomenda.personagem;
                var tamanho_produto = encomenda.tamanho;
                var quantidade = encomenda.quantidade;
                // var quatidade_disponivel = encomenda.quatidade_disponivel;
                var data_hora = encomenda.data_hora;
                /* FIM DADOS ENCOMENDA */
                
                /* DADOS PRODUTO */
                var id_produto = encomenda.id_produto;
                var nome_produto = encomenda.nome_produto;
                var preco_produto = encomenda.preco_produto;
                var imagem_produto = encomenda.imagem_produto;
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
                                        <div class="row mt-3">
                                            <div class="col-lg ml-1">
                                                <h6 class="">Dados produto :</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg text-center">
                                                        <img class="mt-3 mb-3" src="client/views/assets/img/images/${imagem_produto}" alt="${nome_produto}" style="width: 100px; height: 100px;">
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
                                            <div class="col-lg-6">
                                                <input type="text" placeholder="Telefone: " id="telefone_autor" value="Telefone: ${fone_autor}" required disabled>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder="Whatsapp: " id="whatsapp_autor" value="Whatsapp: ${whats_autor}" required disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg ml-1">
                                                <h6 class="">Dados encomenda :</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="text" placeholder="Personagem: " id="id_personagem" value="Personagem: ${personagem_produto}" required disabled>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder="Tamanho: " id="id_tamanho" value="Tamanho: ${tamanho_produto}" required disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <input type="text" placeholder="Solicitado: " id="id_qtd_solicitado" value="Solicitado: ${quantidade}" required disabled>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" placeholder="Pedido: " id="id_data_pedido" value="Pedido: ${data_hora}" required disabled>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" placeholder="Prazo: " id="id_prazo_pedido" value="Prazo: ${data_hora}" required disabled>
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
    });
});