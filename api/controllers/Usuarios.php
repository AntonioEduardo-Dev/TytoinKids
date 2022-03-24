<?php
    require_once "../models/Usuarios.class.php";
    require_once "functions/validar_email.php";
    require_once "functions/validar_campos.php";

    // Instanciando classes
    $objUsuario = new Usuarios();

    if(isset($_POST['listarUsersTable'])){
        //instanciando classes
        $dados = $objUsuario->listar();

        if ($dados) {
            echo json_encode($dados);
        }
    };

    if(isset($_GET['btn_listar_usuario'])){
        $id_usuario = ( isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : "");

        if ($dados = $objUsuario->listarDadosId($id_usuario)) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhum usuário cadastrado",
            ];
        }

        echo json_encode($retorno);
    };

    if(isset($_POST["form_cadastrar_usuario"])){
        
        // alocando posts nas variáveis
        $email      = (isset($_POST['email']) ? $_POST['email'] : "");
        $nome       = (isset($_POST['nome']) ? $_POST['nome'] : "");
        $senha      = (isset($_POST['senha']) ? $_POST['senha'] : "");
        $cpf        = (isset($_POST['cpf']) ? $_POST['cpf'] : "");

        //
        $fone       = (isset($_POST['fone']) ? $_POST['fone'] : "");
        $whatsapp   = (isset($_POST['whatsapp']) ? $_POST['whatsapp'] : "");
        $insta      = (isset($_POST['insta']) ? $_POST['insta'] : "");

        //
        $id_cidade_fk   = (isset($_POST['id_cidade_fk']) ? $_POST['id_cidade_fk'] : "");
        $cep            = (isset($_POST['cep']) ? $_POST['cep'] : "");
        $endereco       = (isset($_POST['endereco']) ? $_POST['endereco'] : "");
        $bairro         = (isset($_POST['bairro']) ? $_POST['bairro'] : "");
        $complemento    = (isset($_POST['complemento']) ? $_POST['complemento'] : "");
        $numero         = (isset($_POST['numero']) ? $_POST['numero'] : "");

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