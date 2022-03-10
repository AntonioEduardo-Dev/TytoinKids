var dados = [];

var tamanhoPagina = 8;
var pagina = 0;

function retornarDados() {
    dados = [];

    var content_elements = document.getElementsByClassName("content-product");

    Array.prototype.forEach.call(content_elements, function(element) {
        dados.push([element]);
    });

    return dados;
}

function pesquisar_content() {
    query = $.trim($('#btn_de_busca').val()); //remove espaços em branco

    // Itera sobre cada linha de sua tabela
    $('.content-product').each(function() {
        ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible'): $(this).show().addClass('visible');
    });
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
    
    $('#btn_de_busca').keyup(function(event) {
        var data = "";
        if (event.keyCode == 27 || $(this).val() == '') {
            data = $(this).val('');
            $('#products-content-system').removeClass('visible').show().addClass('visible');
            location.reload();
        } else {
            paginar_content_full();
            pesquisar_content();
        }
    });
});