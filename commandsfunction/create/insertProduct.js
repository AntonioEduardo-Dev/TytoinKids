/* INSERIR PRODUTOS */
$(function() {

    listarCategorias = {listarCategorias : true}

    $.post('../commandscontrol/Categorias.php', listarCategorias, function(retorna) {
        $("#id_categ").html(retorna);
    }); 

    $(document).on('click', '#id_cad', function() {

        if($('#id_imageUpload')[0].files[0]) {
            var data = new FormData();
            data.append('nm_imageUpload', $('#id_imageUpload')[0].files[0]);

            $.ajax({
                url: '../commandscontrol/Produtos.php',
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
                        returnMsg(resultado[1]);
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
                    prod_qtd        : $("#id_qtd").val(),
                    prod_preco      : $("#id_preco").val(),
                    prod_imagem     : prod_imagem
                }
        
                $.post('../commandscontrol/Produtos.php', dados, function(idRetorno) {
                    
                    var tipo = idRetorno.indexOf("alert_notification_error");

                    if (tipo === -1) {
                        var coresSelecionados       = [ $('#btn_id_check_cor_vermelho').prop("checked") == true ? 1 : 0,
                                                        $('#btn_id_check_cor_verde').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_cor_azul').prop("checked")     == true ? 1 : 0,
                                                        $('#btn_id_check_cor_amarelo').prop("checked")  == true ? 1 : 0
                                                    ]
                        var tamanhosSelecionados    = [ $('#btn_id_check_tam_p').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_m').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_g').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_gg').prop("checked")   == true ? 1 : 0,
                                                        $('#btn_id_check_tam_1').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_2').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_3').prop("checked")    == true ? 1 : 0,
                                                        $('#btn_id_check_tam_4').prop("checked")    == true ? 1 : 0
                                                    ];

                        var dados = {
                            btn_cadastrar_cores     : idRetorno,
                            cores                   : coresSelecionados,
                            tamanhos                : tamanhosSelecionados,
                        }

                        $.post('../commandscontrol/Produtos.php', dados, function(response) {
                            var tipo = response.indexOf("alert_notification_error");
                            if (tipo === -1) {
                                returnMsg(response);
                            } else if (tipo > -1) {
                                returnMsg(response);
                            }
                        });

                    } else if (tipo > -1) {
                        returnMsg(idRetorno);
                    }
                });
            }
        }, 100);
    });
});

function returnMsg(msg) {
    console.log(msg);
}