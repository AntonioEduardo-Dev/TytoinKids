/* lISTAR CATEGORIAS E PRODUTOS*/
$(function () {
    listarCategoriasFilter = { listarCategoriasFilter : true }

    $.get('api/controllers/Produtos.php', listarCategoriasFilter, function (retorna) {
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

    $.get('api/controllers/Produtos.php', listarProdutos, function (retorna) {
        var objProdutos = jQuery.parseJSON(retorna);
        console.log(objProdutos);
        if (objProdutos.type == "success") {
            var content = ``;
            
            $.each(objProdutos.data, function (indice, dados_produto) {
                content += `<div class="col-lg-3 col-md-4 col-sm-6 text-center content-product ${dados_produto.nome_categoria} ${dados_produto.personagens} ${dados_produto.tamanhos}">
                                <div class="single-product-item border border-light">
                                    <a href="produto?id=${dados_produto.id_produto}" id="single-product-item" data-id="${dados_produto.id_produto}"><img src="client/views/assets/img/images/${dados_produto.imagem_produto}" style="width: 100%; height: 260px;" alt="${dados_produto.nome_produto}"></a>
                                    <a href="produto?id=${dados_produto.id_produto}" id="single-product-item" data-id="${dados_produto.id_produto}">
                                        <h3 class="pt-5">${dados_produto.nome_produto}</h3>
                                        <p class="product-price"><span>P/Quantidade</span> R$${dados_produto.preco_produto} </p>
                                    </a>
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
                                <a><img src="client/views/assets/img/images/productind.jpg" alt="Produtos Indisponíveis"></a>
                            </div>
                            <hr>
                            <h3>Produtos Indisponíveis</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$00.00 </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center indisponível"></div>
            `;
        }

        $(".product-lists").html(content);
    });

    /*================ Listagem de personagens ================*/
    
    listarPersonagens = { listarPersonagens : true }

    $.get('api/controllers/Produtos.php', listarPersonagens, function (retorna) {
        var objPersonagens = jQuery.parseJSON(retorna);
        if (objPersonagens.type == "success") {
            $("#id_personagem_select").html("<option data-filter='*' selected>Personagem: Todos</option>");
        
            objPersonagens.data.forEach( element => {
                $("#id_personagem_select").append(`<option data-filter=".${element.personagem}" value="${element.id_personagem}">Personagem: ${element.personagem}</option>`);
            });
        }else{
            $("#id_personagem_select").html("<option data-filter='*' selected>Personagem: Indisponível</option>");
        }
    });

    /*================ Listagem de tamanhos ================*/

    listarTamanhos = { listarTamanhos : true }

    $.get('api/controllers/Produtos.php', listarTamanhos, function (retorna) {
        var objTamanhos = jQuery.parseJSON(retorna);

        if (objTamanhos.type == "success") {
            $("#id_tamanho_select").html("<option data-filter='*' selected>Tamanho: Todos</option>");
            
            objTamanhos.data.forEach( element => {
                $("#id_tamanho_select").append(`<option data-filter=".${element.tamanho}" value="${element.id_tamanho}">Tamanho: ${element.tamanho}</option>`);
            });
        }else{
            $("#id_tamanho_select").html("<option data-filter='*' selected>Tamanho: Indisponível</option>");
        }
    });

});