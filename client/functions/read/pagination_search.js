var dados = [
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ],
            [
                `<div class="col-lg-4 col-md-6 text-center Super_Luxo Moranguinho 1">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="produto?id=1" id="single-product-item" data-id="1"><img src="client/views/assets/img/images/07b563d455de30f9d62c7f3be83ced926.png" style="width: 180px; height: 200px;" alt="Luxinho"></a>
                        </div>
                        <hr>
                        <a href="produto?id=1" id="single-product-item" data-id="1">
                            <h3>Luxinho</h3>
                            <p class="product-price"><span>P/Quantidade</span> R$20.00 </p>
                        </a>
                    </div>
                </div>`
            ]
        ];

var tamanhoPagina = 6;
var pagina = 0;

function paginar_content() {
    var page_content = $('#products-content-system').html("");

    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
        page_content.append(dados[i][0]);
    }
    $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
}

function ajustarButtons() {
    $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
    $('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
}

$(function() {
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
        }
    }, 1000);
    
    $('#btn_de_busca').keyup(function(event) {
        var data = "";
        if (event.keyCode == 27 || $(this).val() == '') {
            data = $(this).val('');
            $('#products-content-system').removeClass('visible').show().addClass('visible');

        } else {
            query = $.trim($(this).val()); //remove espaços em branco

            // Itera sobre cada linha de sua tabela
            $('#products-content-system').each(function() {

                // Verifica se alguma coluna da linha corrente possui a informação, caso não possua a linha é ocultada
                ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible'): $(this).show().addClass('visible');
            });
        }
    });
});