<?php
    require_once "../commandsclass/Autentication.class.php";

    if (isset($_POST["btn_logar"])) {
        $email = "a.edu@gmail.com";
        $senha = 123;
        
        $autenticar = new Autentication($email,$senha);
        $autenticar->validar();
    }
?>