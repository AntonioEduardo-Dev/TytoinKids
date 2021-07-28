<?php
    require_once "../commandsclass/Authentication.class.php";

    if (isset($_POST["btn_realizar_login"])) {

        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        if(is_string($email) && is_string($senha)):
            $autenticar = new Authentication($email,$senha);
            echo $autenticar->validar();
        else:
            echo "Not is a String!";
        endif;
    }
?>