<?php
    require_once "../commandsclass/Contato.class.php";
    require_once "funcoes/validar_email.php";

    if(isset($_POST["form_cadastrar_duvida"])){

        // alocando posts nas variáveis
        $nome       = $_POST['nome'];
        $email      = $_POST['email'];
        $fone       = $_POST['fone'];
        $mensagem   = $_POST['mensagem'];
        
        if($email == "" || $nome == "" || $fone == "" || $mensagem == ""){
            echo "alert_notification_error_empty!-|-alert-warning";
        }
        elseif($email == null || $nome == null || $fone == null || $mensagem == null){
            echo "alert_notification_error_null!-|-alert-warning";
        }
        else{
            if (validar_email($email) != "") {
                $objDuvida = new Contato($email, $nome, $fone, $mensagem);
                $retorno   = $objDuvida->cadastrarDuvida();
                        
                if($retorno){
                    echo "Cadastro realizado com sucesso!-|-alert-success";
                }else{
                    echo "alert_notification_error!-|-alert-danger";
                };
            }
            else{
                echo "alert_notification_error_invalid_email!-|-alert-danger";
            }
        }

    };
?>