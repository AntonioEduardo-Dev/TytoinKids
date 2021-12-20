<?php
    require_once "../models/Manutencao.class.php";
    
    //instanciando classe
    $user = new Manutencao();

    if (isset($_POST['btn_alterar_status'])) {
        $valor = intval($_POST['btn_alterar_status']);

        if($valor !== 0 && $valor !== 1){
            if ($valor === true) {
                $valor = 1;
            }else{
                $valor = 0;
            }
        }
        
        if ($user->alterar($valor)) {
            echo "Sucesso!";
        }else{
            echo "alert_notification_error!-|-alert-danger";
        }
    }
?>