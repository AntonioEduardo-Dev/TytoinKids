/* lISTAR CATEGORIAS E PRODUTOS*/
$(function () {
    listarCategorias = { listarCategorias : true }

    $.get('commandscontrol/Produtos.php', listarCategorias, function (retorna) {
        var objCategFilter = jQuery.parseJSON(retorna);

        if (objCategFilter.type == "success") {
            var content = `<ul> 
                        <li class="li active" data-filter="*">Todos</li>`;

            $.each(objCategFilter.data, function (indice, dados_categoria) {
                content += `
                        <li class="li" data-filter=".${dados_categoria.nome_categoria}">${(dados_categoria.nome_categoria).replace("_", " ")}</li>
                `;
            })

            content += `</ul>`;
        }

        $(".product-filters").html(content);
    });

    listarCategoriasFilter = { listarCategoriasFilter : true }

    $.get('commandscontrol/Produtos.php', listarCategoriasFilter, function (retorna) {
        var objCategFilter = jQuery.parseJSON(retorna);

        if (objCategFilter.type == "success") {
            var content = `<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active text-center" data-filter="*" data-toggle="list" href="loja" role="tab" aria-controls="home">
                            <i class="fas fa-angle-right"></i>
                            Todos
                            <span class="badge badge-primary-custom badge-pill">Qtd</span>
                        </a>
            `;
            $.each(objCategFilter.data, function (indice, dados_categoria) {
                if (dados_categoria.quantidade && dados_categoria.quantidade > 0) {
                    content += `<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-filter=".${dados_categoria.nome_categoria}" data-toggle="list" href="loja" role="tab" aria-controls="home">
                                        <i class="fas fa-angle-right"></i>
                                        ${(dados_categoria.nome_categoria).replace("_", " ")}
                                        <span class="badge badge-primary-custom badge-pill">${dados_categoria.quantidade}</span>
                                    </a>
                    `;
                }
            })
        }

        $(".product-filter-button").html(content);
    });

    listarProdutos = { listarProdutos : true }

    $.get('commandscontrol/Produtos.php', listarProdutos, function (retorna) {
        var objProdutos = jQuery.parseJSON(retorna);
        console.log(objProdutos);
        if (objProdutos.type == "success") {
            var content = ``;
            
            $.each(objProdutos.data, function (indice, dados_produto) {
                content += `<div class="col-lg-4 col-md-6 text-center ${dados_produto.nome_categoria}">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="produto?id=${dados_produto.id_produto}" id="single-product-item" data-id="${dados_produto.id_produto}"><img src="commandsview/assets/img/images/${dados_produto.imagem_produto}" style="width: 200px; height: 200px;" alt="${dados_produto.nome_produto}"></a>
                                    </div>
                                    <h3>${dados_produto.nome_produto}</h3>
                                    <p class="product-price"><span>P/Quantidade</span> R$${dados_produto.preco_produto} </p>
                                    <a href="produto?id=${dados_produto.id_produto}" data-id="${dados_produto.id_produto}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho</a>
                                </div>
                            </div>
                `;
            })
        } else {
            content = `
                    <div class="col-lg-4 col-md-6 text-center indisponível"></div>
                    <div class="col-lg-4 col-md-6 text-center indisponível">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a><img src="commandsview/assets/img/images/productind.jpg" alt="Produtos Indisponíveis"></a>
                            </div>
                            <h3>Produtos Indisponíveis</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$00.00 </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center indisponível"></div>
            `;
        }

        $(".product-lists").html(content);
    });

    listarTamanhos = { listarTamanhos : true }

    $.get('commandscontrol/Produtos.php', listarTamanhos, function (retorna) {
        var objTamanhos = jQuery.parseJSON(retorna);

        if (objTamanhos.type = "success") {
            $("#id_tamanho_select").html("<option hidden selected>Tamanho:</option>");
            
            objTamanhos.data.forEach( element => {
                $("#id_tamanho_select").append(`<option value="${element.id_tamanho}">Tamanho: ${element.tamanho}</option>`);
            });
        }
    });

});