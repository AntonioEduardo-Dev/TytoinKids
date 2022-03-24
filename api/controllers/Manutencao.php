<?php
    function getStatus(){
        require_once "api/models/Manutencao.class.php";

        //instanciando classe
        $userStatus = new Manutencao();
        return $userStatus->validar();
    }

    if (isset($_POST["verificarStatus"]) && $_POST["verificarStatus"] != ""){
        require_once "../models/Manutencao.class.php";
        
        //instanciando classe
        $userStatus = new Manutencao();
        echo (($userStatus->validar()) ? "true" : "false");
    }
?>