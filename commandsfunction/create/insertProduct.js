/* INSERIR PRODUTO */
$(function() {

    listarCategorias = {listarCategorias : true}

    $.get('commandscontrol/Categorias.php', listarCategorias, function(retorna) {
        var objCateg = jQuery.parseJSON(retorna);
        var content = ``;

        if (objCateg.type == "success") {
            content = `<option selected style="display: none;">Categoria do produto*</option>`;

            $.each(objCateg.data, function (indice, dados_categoria) {
                content += `<option value="${dados_categoria.id_categoria}">${dados_categoria.nome_categoria}</option>`;
            })
        }else{
            content = `<option selected style="display: none;">Cadastre uma categoria no sistema!</option>`;
        }

        $("#id_categ").html(content);
    }); 

    listarPersonagens = {listarPersonagens : true}

    $.get('commandscontrol/Produtos.php', listarPersonagens, function(retorna) {
        var objCateg = jQuery.parseJSON(retorna);
        var content = ``;
        $("#id_personagem").html(content);

        if (objCateg.type == "success") {
            content = `<option selected style="display: none;">Personagem do produto*</option>`;

            $.each(objCateg.data, function (indice, dados_categoria) {
                content += `<option value="${dados_categoria.id_personagem}">${dados_categoria.personagem}</option>`;
            })
        }else{
            content = `<option selected style="display: none;">Cadastre uma categoria no sistema!</option>`;
        }

        $("#id_personagem").html(content);
    }); 

    listarTamanhos = {listarTamanhos : true}

    $.get('commandscontrol/Produtos.php', listarTamanhos, function(retorna) {
        var objTamanho = jQuery.parseJSON(retorna);
        if (objTamanho.type == "success") {
            $(".content-tamanhos").html("");

            objTamanho.data.forEach( ( tamanhos, indice ) => {
                if (indice != 0 && indice % 1 == 0) {
                    $(".content-tamanhos").append(`
                        <hr>
                    `);
                }
                $(".content-tamanhos").append(`
                    <div class='row mt-3'>
                        <div class="col-lg-2">
                            <h4 class="mt-3 pl-5">${tamanhos.tamanho} : </h4>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" placeholder="Quantidade disponível*" id="btn_id_qtd_tam_${tamanhos.id_tamanho}">
                        </div>
                    </div>
                `);
            });
        }
    }); 

    $(document).on('click', '#id_cad', function(e) {
        e.preventDefault();

        if(($('#id_imageUpload')[0].files).length != 0) {
            var data = new FormData();
            var prod_imagens = undefined;

            $.each($("#id_imageUpload")[0].files, function(i, file) {
                data.append('nm_cadastro_imagens[]', file);
            });

            $.ajax({
                url: 'commandscontrol/Produtos.php',
                async: false,
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) 
                {
                    $("#id_mensagem_image").html(data);

                    var resultado = data.split('-|-');
    
                    if (resultado[0] != false) {
                        prod_imagens = (jQuery.parseJSON(data));
                    }else {
                        exibirModalAlerta(resultado[1],false,"alert-danger");
                    }
                }
            });
        }else{
            prod_imagens = "productind.jpg";
        }

        setTimeout(function() {
            if(typeof prod_imagens != 'undefined'){
                var dados = {
                    btn_cadastrar   : $("#id_cad").val(),
                    prod_categ      : $("#id_categ").val(),
                    prod_nome       : $("#id_nome").val(),
                    prod_preco      : $("#id_preco").val(),
                    prod_imagens    : prod_imagens
                }
                
                $.post('commandscontrol/Produtos.php', dados, function(idRetorno) {
                    
                    var tipo = idRetorno.indexOf("alert_notification_error");
                    idRetorno = idRetorno.split("-|-");

                    if (tipo === -1) {
                        var personagem_selecionado  = $("#id_personagem").val();

                        var tamanhos = [
                            {
                                id_tamanho      : "1",
                                qtd_tamanho     : $('#btn_id_qtd_tam_1').val()  > 0 ? $('#btn_id_qtd_tam_1').val() : 0
                            },
                            {
                                id_tamanho      : "2",
                                qtd_tamanho     : $('#btn_id_qtd_tam_2').val()  > 0 ? $('#btn_id_qtd_tam_2').val() : 0
                            },
                            {
                                id_tamanho      : "3",
                                qtd_tamanho     : $('#btn_id_qtd_tam_4').val()  > 0 ? $('#btn_id_qtd_tam_4').val() : 0
                            },
                            {
                                id_tamanho      : "4",
                                qtd_tamanho     : $('#btn_id_qtd_tam_6').val()  > 0 ? $('#btn_id_qtd_tam_6').val() : 0
                            },
                            {
                                id_tamanho      : "5",
                                qtd_tamanho     : $('#btn_id_qtd_tam_8').val()  > 0 ? $('#btn_id_qtd_tam_8').val() : 0
                            },
                            {
                                id_tamanho      : "6",
                                qtd_tamanho     : $('#btn_id_qtd_tam_10').val()  > 0 ? $('#btn_id_qtd_tam_10').val() : 0
                            }
                        ];

                        var dados = {
                            btn_cadastrar_personagens   : true,
                            id_produto                  : idRetorno[0],
                            id_personagem               : personagem_selecionado,
                            tamanhos                    : tamanhos
                        }
                        $.post('commandscontrol/Produtos.php', dados, function(retorno) {
                            var tipo = retorno.indexOf("alert_notification_error");
                            retorno = retorno.split("-|-");
                            
                            if (tipo === -1) {
                                exibirModalAlerta(retorno[0],true,"alert-success");
                            } else if (tipo > -1) {
                                exibirModalAlerta(retorno[0],false,retorno[1]);
                            }
                        });
                    } else if (tipo > -1) {
                        exibirModalAlerta(idRetorno[0],false,idRetorno[1]);
                    }
                });
            }
        }, 100);
    });
});