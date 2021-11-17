/* lISTAR PRODUTOS */
$(function () {
    var url_atual = window.location.href;
    var url = url_atual.split("?id=");
    
    if (url) {
        if (url[1]) {
            listarProduto = { listarProduto : true, id_produto: url[1] }

            $.get('commandscontrol/Produtos.php', listarProduto, function (retorna) {
                var dados_produto = jQuery.parseJSON(retorna);

                if (dados_produto.type == "success") {
                    var produto = dados_produto.data["0"];

                    $("#id_produto_inp").val(produto.id_produto == 0 || produto.id_produto == null ? 0 : produto.id_produto);
                    $("#id_nome_produto").html(produto.nome_produto == 0 || produto.nome_produto == null ? 'Nome do produto' : produto.nome_produto);
                    $("#id_preco_produto").html(produto.preco_produto == 0 || produto.preco_produto == null ? 'Indisponível' : produto.preco_produto);
                    $("#id_qtd_produto").html((produto.quatidade_disponivel == 0 || produto.quatidade_disponivel == null ? 'Sem estoque' : produto.quatidade_disponivel));
                    $("#imagem_produto").attr('src', (produto.imagem_produto == "" || produto.imagem_produto == null || produto.imagem_produto == "productind.jpg" ? 'commandsview/assets/img/images/productind.jpg' : 'commandsview/assets/img/images/' + produto.imagem_produto));
                    $("#id_categoria_produto").html((produto.nome_categoria == 0 || produto.nome_categoria == null ? 'Sem categoria' : produto.nome_categoria));

                    // Exibir tamanhos
                    var content_tam = [];

                    $.each(dados_produto.data, function (indice, dados_produto) {
                        content_tam.push(
                            {
                                id_tam_produto : dados_produto.id_tamanho_produto,
                                tamanho : dados_produto.tamanho
                            }
                        );

                    })
                    
                    content_tam = (content_tam).filter(function (a) {
                        return !this[JSON.stringify(a)] && (this[JSON.stringify(a)] = true);
                    }, Object.create(null))
                    
                    var content_tam_html = `<option selected style="display: none;">Tamanho:</option>`;

                    $.each(content_tam, function (indice, dados_produto) {
                        content_tam_html += `<option value="${dados_produto.id_tam_produto}">${dados_produto.tamanho}</option>`;
                    })

                    $("#id_tamanho_selecionado").html(content_tam_html);
                    // Exibir tamanhos end

                    // Exibir Cores
                    var content_cor = [];

                    $.each(dados_produto.data, function (indice, dados_produto) {
                        content_cor.push(
                            {
                                id_cor_produto : dados_produto.id_cor_produto,
                                cor : dados_produto.cor
                            }
                        );

                    })
                    content_cor = (content_cor).filter(function (a) {
                        return !this[JSON.stringify(a)] && (this[JSON.stringify(a)] = true);
                    }, Object.create(null))
                    
                    var content_cor_html = `<option selected style="display: none;">Cor:</option>`;

                    $.each(content_cor, function (indice, dados_produto) {
                        content_cor_html += `<option value="${dados_produto.id_cor_produto}">${dados_produto.cor}</option>`;
                    })

                    $("#id_cor_selecionado").html(content_cor_html);
                    // Exibir Cores end

                } else {
                    location.href = 'loja';
                }
            });
        }

    }

    $(document).on('click', '.addToCart', function () {
        var id_produto = $("#id_produto_inp").val();
        var qtd_produto = $("#id_qtd_produto_inp").val();
        var id_tamanho_selecionado = $("#id_tamanho_selecionado").val();
        var id_cor_selecionado = $("#id_cor_selecionado").val();
        var tamanho_selecionado = $( "#id_tamanho_selecionado option:selected" ).text();
        var cor_selecionado = $( "#id_cor_selecionado option:selected" ).text();

        if (id_produto != 0 && id_produto > 0) {
            produtoCarrinho = { 
                cart : true, 
                id_produto, 
                qtd_produto, 
                id_tamanho_selecionado: id_tamanho_selecionado, 
                id_cor_selecionado: id_cor_selecionado, 
                tamanho_selecionado: tamanho_selecionado, 
                cor_selecionado: cor_selecionado 
            }

            $.get('commandscontrol/Encomendas.php', produtoCarrinho, function (retorna) {
                var tipo = retorna.indexOf("alert_notification_error");
                var values = retorna.split("-|-")

                if (tipo === -1) {
                    exibirModal("Produto adicionado ao carrinho!", true);
                } else if (tipo > -1) {
                    exibirModal(values[0], false);
                }
            });
        }
    });
});