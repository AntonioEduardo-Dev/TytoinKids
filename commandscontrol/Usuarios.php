<?php
    require_once "../commandsclass/Usuarios.class.php";
    require_once "funcoes/validar_email.php";
    require_once "funcoes/validar_campos.php";

    // Instanciando classes
    $objUsuario = new Usuarios();

    if(isset($_POST["form_cadastrar_usuario"])){
        
        // alocando posts nas variáveis
        $email      = $_POST['email'];
        $nome       = $_POST['nome'];
        $senha      = $_POST['senha'];
        $cpf        = $_POST['cpf'];

        //
        $fone       = $_POST['fone'];
        $whatsapp   = $_POST['whatsapp'];
        $insta      = $_POST['insta'];

        //
        $id_cidade_fk   = $_POST['id_cidade_fk'];
        $cep            = $_POST['cep'];
        $endereco       = $_POST['endereco'];
        $bairro         = $_POST['bairro'];
        $complemento    = $_POST['complemento'];
        $numero         = $_POST['numero'];

        //
        $pode_vazio = [ "form_cadastrar_usuario" , "id_cidade_fk", "complemento", "insta" ];

        if (validar_campos($_POST, $pode_vazio)) {
            $id_usuario = $objUsuario->cadastrar($email, $nome, $senha, $cpf);

            if ($id_usuario) {
                if ($objUsuario->cadastrarContato($id_usuario, $fone, $whatsapp, $insta)) {
                    if ($objUsuario->cadastrarEndereco($id_usuario, $id_cidade_fk, $cep, $endereco, $bairro, $complemento, $numero)) {
                        echo "Usuário cadastrado com sucesso!";
                    }else{
                        echo "alert_notification_error_id!-|-alert-danger";
                    }
                }else{
                    echo "alert_notification_error_id!-|-alert-danger";
                }
            }else{
                echo "alert_notification_error_id!-|-alert-danger";
            }
        }else{
            echo "alert_notification_error_empty!-|-alert-danger";
        }

    };
?>