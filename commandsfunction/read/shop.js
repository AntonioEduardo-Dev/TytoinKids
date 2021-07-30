/* lISTAR CATEGORIAS E PRODUTOS*/
$(function() {
    listarCategorias = {listarCategorias : true}

    $.post('commandscontrol/Produtos.php', listarCategorias, function(retorna) {
        $(".product-filters").html(retorna);
    }); 

    listarCategoriasFilter = {listarCategoriasFilter : true}

    $.post('commandscontrol/Produtos.php', listarCategoriasFilter, function(retorna) {
        $(".product-filter-button").html(retorna);
    }); 

    listarProdutos = {listarProdutos : true}

    $.post('commandscontrol/Produtos.php', listarProdutos, function(retorna) {
        $(".product-lists").html(retorna);
    }); 
});