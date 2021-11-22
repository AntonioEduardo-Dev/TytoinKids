$(document).ready(function(){
    $('#id_cep').mask('00000-000');
    $('#id_fone').mask('(00) 00000-0000');
    $('#id_whatsapp').mask('(00) 00000-0000');
    $('#id_cpf').mask('000.000.000-00');
});

/* INSERIR USUÁRIO */
$(function() {
    $(document).on('click', '#id_cad_user', function() {
        $("#id_cad_user").prop('disabled', true);
        
        var form_nome       = $("#id_nome").val();
        var form_cpf        = $("#id_cpf").val();
        var form_email      = $("#id_email").val();
        var form_senha      = $("#id_senha").val();
        
        var form_fone           = $("#id_fone").val();
        var form_whatsapp       = $("#id_whatsapp").val();
        var form_insta          = $("#id_insta").val();

        var form_id_cidade_fk   = $("#id_cidade_fk").val();
        var form_cep            = $("#id_cep").val();
        var form_endereco       = $("#id_endereco").val();
        var form_bairro         = $("#id_bairro").val();
        var form_complemento    = $("#id_complemento").val();
        var form_numero         = $("#id_numero").val();

        var dados = {
            form_cadastrar_usuario   : true,
            nome     : form_nome,
            cpf      : form_cpf,
            email    : form_email,
            senha    : form_senha,
            
            fone            : form_fone,
            whatsapp        : form_whatsapp,
            insta           : form_insta,

            id_cidade_fk    : form_id_cidade_fk,
            cep             : form_cep,
            endereco        : form_endereco,
            bairro          : form_bairro,
            complemento     : form_complemento,
            numero          : form_numero
        }

        $.post('commandscontrol/Usuarios.php', dados, function(retorno) {
            var tipo = retorno.indexOf("alert_notification_error");
            retorno = retorno.split("-|-");
            
            if (tipo === -1) {
                exibirModalAlerta(retorno[0], true, "alert-success");
            } else if (tipo > -1) {
                exibirModalAlerta(retorno[0], false, retorno[1]);
            }

            $("#id_cad_user").prop('disabled', false);
        });
        
    });
});