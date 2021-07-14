/* INSERIR PRODUTOS */
$(function() {

    $(document).on('click', '#id_cad', function() {

        if($('#id_imageUpload')[0].files[0]) {
            var data = new FormData();
            data.append('nm_imageUpload', $('#id_imageUpload')[0].files[0]);

            $.ajax({
                url: '../../commandscontrol/Produtos.php',
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
                        erroMsg(resultado[1]);
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
        
                $.post('../../commandscontrol/Produtos.php', dados, function(response) {
                    console.log("Response: "+response);
                    
                    var tipo = response.indexOf("alert_notification_error");
                    if (tipo === -1) {
                        // console.log('Status Ok');
                        alert("Status Ok");
                    } else if (tipo > -1) {
                        // console.log('Ocorreu um erro');
                        alert("Ocorreu um erro");
                    }
                });
            }
        }, 100);
    });
});

function erroMsg(msg) {
    alert(msg);
}