var dados = [];

var tamanhoPagina = 10;
var pagina = 0;

function retornarDados() {
    dados = [];

    var content_elements = document.getElementsByClassName("content-product");

    Array.prototype.forEach.call(content_elements, function(element) {
        dados.push([element]);
    });

    return dados;
}

function paginar_content_full() {
    ($('.pagination_div').removeClass('d-none')).addClass('d-none');
    var page_content = $('#products-content-system').html("");

    dados.forEach(element => {
        page_content.append(element);
    });
}

function paginar_content() {
    var page_content = $('#products-content-system').html("");

    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
        page_content.append(dados[i][0]);
    }
    $('.numeracao').html('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
}

function ajustarButtons() {
    $('.proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
    $('.anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
}

$(function() {
    dados = retornarDados();

    $('#proximo').click(function() {
        if (pagina < dados.length / tamanhoPagina - 1) {
            pagina++;
            paginar_content();
            ajustarButtons();
        }
    });
    $('#anterior').click(function() {
        if (pagina > 0) {
            pagina--;
            paginar_content();
            ajustarButtons();
        }
    });
    setTimeout(() => {
        if (dados.length > tamanhoPagina) {
            paginar_content();
            ajustarButtons();
            $('.col_pagination').removeClass("d-none");
        } else {
            $('.col_pagination').removeClass("d-none").addClass("d-none");
        }
    }, 200);
    
    setTimeout(() => {
        dados = retornarDados();
    }, 100);
});