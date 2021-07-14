// Exibir dados do produto

$(function() {
    $(document).on('click', '#single-product-item', function() {
        var data = $(this).data('id');
        // window.location.href = "product.php?id="+data+"";
    });
    $(document).on('click', '.cart-btn', function() {
        console.log($(this).data('id'));
    });
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
        console.log(data); 
    }
});