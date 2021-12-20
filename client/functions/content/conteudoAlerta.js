/* CONTENT ALERT/ALERTA */
function exibirModalAlerta(msgModal, tipoModal, corModal) {
    if (tipoModal) {
        $(".conteudo_alerta").html('');

        var conteudo = `<div class="alert ${corModal}" role="alert">
                            <h4 class="alert-heading">${msgModal}</h4>
                            <hr>
                            <p>Ocorreu tudo como o planejado!</p>
                        </div>`;

        if ($(".conteudo_alerta").html(conteudo)) {
            $('.conteudo_alerta').hide();
            $(".conteudo_alerta").slideDown();
            $("#id_cad").prop('disabled', true);

            setTimeout(function(){
                $('.conteudo_alerta').hide('hidden');
                $("#id_cad").prop('disabled', false);
                location.reload();
            }, 1500);
        }

    }else{
        var mensagens = viewMsgs();

        msgModal = mensagens[msgModal] || mensagens.default;

        $(".conteudo_alerta").html('');

        var conteudo = `<div class="alert ${corModal}" role="alert">
                            <h4 class="alert-heading">Oops!!!</h4>
                            <hr>
                            <p class="text-dark">${msgModal}</p>
                        </div>`;

        if ($(".conteudo_alerta").html(conteudo)) {
            $('.conteudo_alerta').hide();
            $(".conteudo_alerta").slideDown();
            $("#id_cad").prop('disabled', true);

            setTimeout(function(){
                $('.conteudo_alerta').hide('hidden');
                $("#id_cad").prop('disabled', false);
            }, 2000);
        }

    }
}
