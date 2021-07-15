<?php
    require_once "commandsclass/Manutencao.class.php";
    
    function getStatus(){
        //instanciando classe
        $userStat = new Manutencao();
        return $userStat->validar();
    }
?>