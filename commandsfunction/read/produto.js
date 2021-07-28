/* lISTAR PRODUTOS */
$(function() {
    var url_atual = window.location.href;

    if(url = url_atual.split("?id=")){
        if (url[1]) {
            listarProduto = {listarProduto : true, id_produto : url[1]}

            $.post('commandscontrol/Produtos.php', listarProduto, function(retorna) {
                var values = retorna.split("-|-")
                if (values[0] == null || values[0] == "" || values[0] < 1) {
                    location.href = 'loja';
                }else{
                    $("#id_nome_produto").html(values[1] == 0 || values[1] == null ? 'Nome do produto' : values[1]);
                    $("#id_preco_produto").html(values[2] == 0 || values[2] == null ? 'Indisponível' : values[2]);
                    $("#id_qtd_produto").html((values[3] == 0 || values[3] == null ? 'Sem estoque' : values[3]));
                    $("#imagem_produto").attr('src', (values[4] == "" || values[4] == null || values[4] == "productind.jpg" ? 'commandview/assets/img/images/productind.jpg' : 'commandview/assets/img/images/'+values[4]));
                    $("#id_categoria_produto").html((values[5] == 0 || values[5] == null ? 'Sem categoria' : values[5]));
                }
            });
        }

    }
});