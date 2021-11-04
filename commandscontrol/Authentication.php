<?php
	session_start();
    require_once "../commandsclass/Authentication.class.php";

    if (isset($_POST["btn_realizar_login"])) {

        if ((isset($_POST["id_email"])) 
            && (isset($_POST["id_senha"])) 
            && (($_POST["id_email"]) != "") 
            && (($_POST["id_senha"]) != ""))
        {
            $email = $_POST["id_email"];
            $senha = $_POST["id_senha"];

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(is_string($email) && is_string($senha)){

                    $autenticar = new Authentication($email,$senha);
                    $retorno    = $autenticar->validar();
                    
                    if(!empty($_SESSION["user"])){
                        session_unset();
                    };
                    
                    $user = [
                        "id"        => (($retorno[0]["id_usuario"]) != "")         ? $retorno[0]["id_usuario"]                 : 0,
                        "email"     => (($retorno[0]["email"]) != "")              ? strtolower($retorno[0]["email"])          : "convidado@convidado",
                        "nome"      => (($retorno[0]["nome"]) != "")               ? strtolower($retorno[0]["nome"])           : "convidado",
                        "status"    => (($retorno[0]["status"]) != "")             ? $retorno[0]["status"]                     : 1,
                        "tipo_user" => (($retorno[0]["tipo_usuario"]) != "")       ? strtolower($retorno[0]["tipo_usuario"])   : "convidado",
                        "acesso"    => (($retorno[0]["primeiro_acesso"]) != "")    ? $retorno[0]["primeiro_acesso"]            : 1
                    ];
                    
                    if($_SESSION["user"] = $user){
                        echo "Login realizado com sucesso!-|-alert-success";
                    }else{
                        echo "alert_notification_error!-|-alert-danger";
                    };

                }else{
                    echo "alert_notification_error!-|-alert-danger";
                };

            }else{
                echo "alert_notification_error!-|-alert-danger";
            };
            
        }else{
            echo "alert_notification_error!-|-alert-danger";
        };
    }
?>