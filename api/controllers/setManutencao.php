<?php
    require_once "../models/Manutencao.class.php";
    
    //instanciando classe
    $user = new Manutencao();

    if (isset($_POST['btn_alterar_status']) && $_POST['btn_alterar_status'] != "") {
        $valor = intval($_POST['btn_alterar_status']);

        if($valor !== 0 && $valor !== 1){
            $valor = ( ($valor === true) ? 1 : 0);
        }
        
        echo (($user->alterar($valor)) ? "Sucesso!" : "alert_notification_error!-|-alert-danger");
    }
?>