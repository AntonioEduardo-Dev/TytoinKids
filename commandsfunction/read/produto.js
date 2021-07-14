/* lISTAR PRODUTOS */
$(function() {
    if(location.search.slice(1)){
        var query = location.search.slice(1);
        var partes = query.split('&');
        var data = {};
        partes.forEach(function (parte) {
            var chaveValor = parte.split('=');
            var chave = chaveValor[0];
            var valor = chaveValor[1];
            data[chave] = valor;
        });

        listarProduto = {listarProduto : true, id_produto : data["id"]}
        $.post('../commandscontrol/Produtos.php', listarProduto, function(retorna) {
            var values = retorna.split("-&-");
            
            $("#id_nome_produto").html(values[1] == 0 || values[1] == null ? 'Nome do produto' : values[1]);
            $("#id_preco_produto").html(values[2] == 0 || values[2] == null ? 'Indisponível' : values[2]);
            $("#id_qtd_produto").html((values[3] == 0 || values[3] == null ? 'Sem estoque' : values[3]));
            $("#imagem_produto").attr('src', 'assets/img/newImages/'+values[4]);
            $("#id_categoria_produto").html((values[5] == 0 || values[5] == null ? 'Sem categoria' : values[5]));
            
            console.log(test);
        });
    }
});