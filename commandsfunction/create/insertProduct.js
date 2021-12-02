/* INSERIR PRODUTO */
$(function() {

    listarCategorias = {listarCategorias : true}

    $.post('commandscontrol/Categorias.php', listarCategorias, function(retorna) {
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

    $(document).on('click', '#id_cad', function() {

        if($('#id_imageUpload')[0].files[0]) {
            var data = new FormData();
            data.append('nm_imageUpload', $('#id_imageUpload')[0].files[0]);

            $.ajax({
                url: 'commandscontrol/Produtos.php',
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) 
                {
                    var resultado = data.split('-|-');
    
                    if (resultado[0] == "true") {
                        prod_imagem = resultado[1];
                    }else {
                        exibirModalAlerta(resultado[1],false,"alert-danger");
                    }
                }
            });
        }else{
            prod_imagem = "productind.jpg";
        }

        setTimeout(function() {
            if(typeof prod_imagem != 'undefined'){
                var dados = {
                    btn_cadastrar   : $("#id_cad").val(),
                    prod_categ      : $("#id_categ").val(),
                    prod_nome       : $("#id_nome").val(),
                    prod_preco      : $("#id_preco").val(),
                    prod_imagem     : prod_imagem
                }
        
                $.post('commandscontrol/Produtos.php', dados, function(idRetorno) {
                    
                    var tipo = idRetorno.indexOf("alert_notification_error");
                    idRetorno = idRetorno.split("-|-");

                    // if (tipo === -1) {
                        var personagens_selecionados= [ $('#btn_id_check_cor_vermelho').prop("checked") == true ? 1 : 0,
                                                        $('#btn_id_check_cor_verde').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_cor_azul').prop("checked")     == true ? 1 : 0,
                                                        $('#btn_id_check_cor_amarelo').prop("checked")  == true ? 1 : 0
                                                    ];

                        var quantidade_personagens        = [ $('#btn_id_check_cor_vermelho').val() > 0 ? 1 : 0,
                                                        $('#btn_id_check_cor_verde').val()    > 0 ? 1 : 0,
                                                        $('#btn_id_check_cor_azul').val()     > 0 ? 1 : 0,
                                                        $('#btn_id_check_cor_amarelo').val()  > 0 ? 1 : 0
                                                    ];

                        var tamanhosSelecionados    = [ $('#btn_id_check_tam_1').prop("checked")   == true ? 1 : 0,
                                                        $('#btn_id_check_tam_2').prop("checked")   == true ? 1 : 0,
                                                        $('#btn_id_check_tam_4').prop("checked")   == true ? 1 : 0,
                                                        $('#btn_id_check_tam_6').prop("checked")   == true ? 1 : 0,
                                                        $('#btn_id_check_tam_8').prop("checked")   == true ? 1 : 0
                                                    ];

                        var quantidade_tamanhos     = [ $('#btn_id_qtd_tam_1').val()  > 0 ? $('#btn_id_qtd_tam_1').val() : 0,
                                                        $('#btn_id_qtd_tam_2').val()  > 0 ? $('#btn_id_qtd_tam_2').val() : 0,
                                                        $('#btn_id_qtd_tam_4').val()  > 0 ? $('#btn_id_qtd_tam_4').val() : 0,
                                                        $('#btn_id_qtd_tam_6').val()  > 0 ? $('#btn_id_qtd_tam_6').val() : 0,
                                                        $('#btn_id_qtd_tam_8').val()  > 0 ? $('#btn_id_qtd_tam_8').val() : 0
                                                    ];

                        var dados = {
                            btn_cadastrar_personagens   : idRetorno[0],
                            personagens                 : personagens_selecionados,
                            quantidade_personagens      : quantidade_personagens,
                            tamanhos                    : tamanhosSelecionados,
                            quantidade_tamanhos         : quantidade_tamanhos
                        }
                        console.log(dados);
                        /*
                        $.post('commandscontrol/Produtos.php', dados, function(response) {
                            var tipo = response.indexOf("alert_notification_error");
                            retorno = response.split("-|-");

                            if (tipo === -1) {
                                exibirModalAlerta(retorno[0],true,"alert-success");
                            } else if (tipo > -1) {
                                exibirModalAlerta(retorno[0],false,retorno[1]);
                            }
                        });
                        */
                    // } else if (tipo > -1) {
                    //     exibirModalAlerta(idRetorno[0],false,idRetorno[1]);
                    // }
                });
            }
        }, 100);
    });
});