$(function(){
    setTimeout(() => {
        var conteudo_loja = $(".product-lists").html();
        console.log(conteudo_loja);
    }, 300);
});

//fechar paginacao
$('div .pagination-wrap').hide();

//iniciar a paginacao
setTimeout( function() {
    // iniciarPor(5);
}, 1000)

habilitarTabela();

//funcao de pegar estrutura da tabela
function habilitarTabela(){
    var divPagination = `
        <ul>
            <li name="buttonPrevious"><a href="javascript:void(0)">Anterior</a></li>
            <li name=""><a class="active" href="javascript:void(0)">1</a></li>
            <li name="buttonNext"><a href="javascript:void(0)">Próximo</a></li>
        </ul>`;

    $('.pagination-wrap').html("");
    $('.pagination-wrap').append(divPagination);
}

function tableShow() {
    $('.pagination-wrap').show('slow');
}

function tableHide() {
    $('.pagination-wrap').hide('fast');
}

//exibir linha de resultados nao encontrados
function noResults(colunas){
    var Nolinha     = ``;
    
    if($('.pagination-wrap').length == 0){
        $('.pagination-wrap').append(Nolinha).show();
    }
}

//function responsavel pela paginacao
function iniciarPor(QtdLinhas){
    var pageAtual = 1;
    var trnum = 0;
    var table = '#tabelaEstatica';
    var totalRows = $(table+' tbody tr').length;
    var totalColums = $(table+' thead th').length;

    $('.pagination').html('');
    
    if(totalRows > 5){
        tableShow();
    }else{
        tableHide();
    }

    if(totalRows == 0){
        if($('.pagination-wrap').length > 0){
            $('.pagination-wrap').remove();
        }

        noResults(totalColums);
    }else{

        $(table+' tr').slice(1).each(function() {
            trnum++
            if(trnum > QtdLinhas){
                $(this).hide();
            }
            if(trnum <= QtdLinhas){
                $(this).show();
            }
        })

        if (totalRows > QtdLinhas) {
            $('li[name=buttonNext]').prop('disabled', false);
            $('li[name=buttonPrevious]').prop('disabled', true);

            var pagenum = Math.ceil(totalRows/QtdLinhas);

            $('#btn-info-data').val(pageAtual+' de '+pagenum);

            $('#Previous , #Next, #primeiroResult, #ultimoResult').on('click', function(){
            var trIndex = 0;
                if (this.id == 'Previous') {

                    $('li[name=buttonNext]').removeClass('active');
                    $('li[name=buttonPrevious]').addClass('active');

                    if(pageAtual > 1){
                        pageAtual--;
                        $('li[name=buttonPrevious]').prop('disabled', false);
                    }else{
                        $('li[name=buttonPrevious]').prop('disabled', true);
                    }
                    if(pageAtual < pagenum){
                        $('li[name=buttonNext]').prop('disabled', false);
                    }else{
                        $('li[name=buttonNext]').prop('disabled', true);
                    }
                    if(pageAtual <= 1){
                        $('li[name=buttonPrevious]').prop('disabled', true);
                    }else{
                        $('li[name=buttonPrevious]').prop('disabled', false);
                    }

                    $('#btn-info-data').val(pageAtual+' de '+pagenum);
                    
                    $('li[name=buttonPrevious]').val(pageAtual);
                    
                }
                else if (this.id == 'Next') {

                    $('li[name=buttonPrevious]').removeClass('active');
                    $('li[name=buttonNext]').addClass('active');

                    pageAtual++; 
                    if(pageAtual == pagenum){
                        $('li[name=buttonNext]').prop('disabled', true);
                    }else{
                        $('li[name=buttonNext]').prop('disabled', false);
                    }

                    if(pageAtual > 1){
                        $('li[name=buttonPrevious]').prop('disabled', false);
                    }else{
                        $('li[name=buttonPrevious]').prop('disabled', true);
                    }

                    $('#btn-info-data').val(pageAtual+' de '+pagenum);
                    
                    $('li[name=buttonNext]').val(pageAtual);

                }
                else if (this.id == 'primeiroResult') {

                    $('li[name=buttonPrevious]').removeClass('active');
                    $('li[name=buttonNext]').removeClass('active');

                    pageAtual = 1; 
                    if(pageAtual < pagenum){
                        $('li[name=buttonNext]').prop('disabled', false);
                    }else{
                        $('li[name=buttonNext]').prop('disabled', true);
                    }
                    if(pageAtual <= 1){
                        $('li[name=buttonPrevious]').prop('disabled', true);
                    }else{
                        $('li[name=buttonPrevious]').prop('disabled', false);
                    }

                    $('#btn-info-data').val(pageAtual+' de '+pagenum);

                    $('li[name=buttonNext]').val(pageAtual);

                }
                else if (this.id == 'ultimoResult') {

                    $('li[name=buttonPrevious]').removeClass('active');
                    $('li[name=buttonNext]').removeClass('active');

                    pageAtual = pagenum;
                    
                    if(pageAtual == pagenum){
                        $('li[name=buttonNext]').prop('disabled', true);
                    }else{
                        $('li[name=buttonNext]').prop('disabled', false);
                    }
                    if(pageAtual > 1){
                        $('li[name=buttonPrevious]').prop('disabled', false);
                    }else{
                        $('li[name=buttonPrevious]').prop('disabled', true);
                    }
                    $('#btn-info-data').val(pageAtual+' de '+pagenum);

                    $('li[name=buttonNext]').val(pageAtual);

                }
                $(table+' tr').slice(1).each(function() {
                    trIndex++

                    if(trIndex > (QtdLinhas*pageAtual) || trIndex <= ((QtdLinhas*pageAtual)-QtdLinhas)){
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                })
            })
        }
        
        if(totalRows <= QtdLinhas){
            $('li[name=buttonNext]').prop('disabled', true);
            $('li[name=buttonPrevious]').prop('disabled', true);
        }
        
        if(totalRows <= QtdLinhas){
            $('div .pagination-wrap').hide();
        }else{
            $('div .pagination-wrap').show();
        }
    }
};

// function responsavel pela busca dos registros
$("#btn_de_busca").on("keyup", function () {
    //varialvel responsavel por armazenar o value da caixa de pesquisa
    var value = $(this).val().toLowerCase(); 

    //function responsavel por filtrar as linhas da tabela
    $(".product-lists").filter(function () { 

        //function responsavel por exibir as linhas filtradas
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });

    //verificar se existe uma row de resultados nao encontrados
    if($('.pagination-wrap').length > 0){
        $('.pagination-wrap').remove();
    }

    //verificar se existe linhas visiveis
    if($(".product-lists:visible").length == 0){

        var totalColums = $('#tabelaEstatica thead th').length;
        noResults(totalColums);
    }

    //condicao responsavel por verificar se a caixa de pesquisa esta vazia
    if($(this).val().toLowerCase() == ''){

        //condicao responsavel por verificar se o tamanho da pesquisa é a necessaria para chamar a function
        iniciarPor(parseInt($("#maxRowsResults").val()));

    }else{
        $('div .pagination-wrap').hide();
    }
});

//function responsavel por verificar se houve mudança do select
$('#DadosPag').on('change', function () {
    $('#tbody tr').remove();
    iniciarPor(5);
});