/* lISTAR PRODUTOS */
$(function () {
    function verificarQuant(id_tam, id_person) {
        id_tam      = ((id_tam)     ? id_tam    : "");
        id_person   = ((id_person)  ? id_person : "");

        dados = { 
            listar_quantidade   : true,
            id_produto          : $("#id_produto_inp").val(),
            id_tamanho          : id_tam
        };

        $.get('api/controllers/Produtos.php', dados, function (retorna) {
            var objQtdProduto = jQuery.parseJSON(retorna);

            if (objQtdProduto.type === "success") {
                objQtdProduto.data.forEach( element => {
                    $("#id_qtd_produto").html(element.quatidade_disponivel);
                });
            }
        });
    }

    var url_atual = window.location.href;
    var url = url_atual.split("?id=");
    
    if (url) {
        if (url[1]) {
            listarProduto = { listarProduto : true, id_produto: url[1] }

            $.get('api/controllers/Produtos.php', listarProduto, function (retorna) {
                var dados_produto = jQuery.parseJSON(retorna);

                if (dados_produto.type == "success") {
                    var produto = dados_produto.data["0"];
                    var produto_imagens = dados_produto.data["0"].imagens;
                    var content_imagens = ``;

                    produto_imagens.forEach( (element, index) => {
                        content_imagens += `
                            <div class="imagens_view" style="${(index == 0) ? 'display: block;' : 'display: none;'}">
                                <div class="numbertext">${index+1} / ${produto_imagens.length}</div>
                                <img src="client/views/assets/img/images/${element.imagem_produto}" style="height: 525px; width: 470px; border-radius: 10px 10px 10px 10px;">
                            </div>
                        `;
                    });

                    $(".single_product_img").html(``);
                    
                    if ($(".single_product_img").html(content_imagens)) {
                        if(produto_imagens.length > 1) {
                            $(".single_product_img").append(`
                                <!-- Next and previous buttons -->
                                <a class="prev_image" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next_image" onclick="plusSlides(1)">&#10095;</a>

                                <!-- Image text -->
                                <div class="caption-container">
                                    <p id="caption_get"></p>
                                </div>
                            `);
                        }
                    }


                    $("#id_produto_inp").val(
                        (produto.id_produto ? produto.id_produto : 0)
                    );
                    $("#id_nome_produto").html(
                        (produto.nome_produto ? produto.nome_produto : 'Nome do produto')
                    );
                    $("#id_preco_produto").html(
                        (produto.preco_produto ? produto.preco_produto : 'Indisponível')
                    );
                    $("#id_qtd_produto").html(
                        (produto.quatidade_disponivel ? "-" : 'Sem estoque' )
                    );
                    
                    $("#id_categoria_produto").html(
                        (produto.nome_categoria ?  (produto.nome_categoria).replace("_", " ") : 'Sem categoria')
                    );

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

                    // Exibir personagem                    
                    var content_personagem_html = `<option selected style="display: none;">Personagem:</option>`;

                        content_personagem_html += `<option value="${dados_produto.data[0].id_personagem_produto}">${dados_produto.data[0].personagem}</option>`;

                    $("#id_personagem_selecionado").html(content_personagem_html);
                    // Exibir personagem end

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
        var id_personagem_selecionado = $("#id_personagem_selecionado").val();
        var tamanho_selecionado = $( "#id_tamanho_selecionado option:selected" ).text();
        var personagem_selecionado = $( "#id_personagem_selecionado option:selected" ).text();

        if (id_produto != 0 && id_produto > 0) {

            produtoCarrinho = { 
                cart : true, 
                id_produto, 
                qtd_produto, 
                id_tamanho_selecionado: id_tamanho_selecionado, 
                id_personagem_selecionado: id_personagem_selecionado, 
                tamanho_selecionado: tamanho_selecionado, 
                personagem_selecionado: personagem_selecionado 
            }
            
            $.get('api/controllers/Encomendas.php', produtoCarrinho, function (retorna) {
                var tipo = retorna.indexOf("alert_notification_error");
                var values = retorna.split("-|-")

                if (tipo === -1) {
                    exibirModal("Produto adicionado ao carrinho!", true, true);
                } else if (tipo > -1) {
                    exibirModal(values[0], false, false);
                }
            });
        }
    });

    $(document).on("change", "#id_tamanho_selecionado", function(){
        verificarQuant($(this).val() , $("#id_personagem_selecionado").val());
    })
});