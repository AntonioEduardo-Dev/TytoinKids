<?php
    function getStatus(){
        require_once "api/models/Manutencao.class.php";

        //instanciando classe
        $userStat = new Manutencao();
        return $userStat->validar();
    }

    if (isset($_POST["verificarStatus"])){
        require_once "../models/Manutencao.class.php";
        
        //instanciando classe
        $userStat = new Manutencao();
        if($userStat->validar()){
            echo "true";
        } else {
            echo "false";
        }
    }
?>