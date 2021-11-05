/* lISTAR PRODUTOS */
$(function () {
    var url_atual = window.location.href;

    if (url = url_atual.split("?id=")) {
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
                } else {
                    location.href = 'loja';
                }
            });
        }

    }

    $(document).on('click', '.addToCart', function () {
        var id_produto = $("#id_produto_inp").val();
        var qtd_produto = $("#id_qtd_produto_inp").val();

        if (id_produto != 0 && id_produto > 0) {
            produtoCarrinho = { cart : true, id_produto, qtd_produto }

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