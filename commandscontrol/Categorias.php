<?php
    require_once "../commandsclass/Categorias.class.php";
    
    //instanciando classes
    $objCategoria = new Categorias();

    //execucao de metodos

    if (isset($_POST['listar'])) {
        $objCategoria->listarCategorias();
    }

    if (isset($_POST['listarCategorias'])) {
        $objCategoria->listarSelectCategorias();
    }

    if (isset($_POST['btn_cadastrar'])) {
    
        // alocando posts nas variaveis
        $nome_categ = $_POST['categ_nome'];

        if($nome_categ == ""){
            echo "alert_notification_error_empty!-|-alert-warning";
        }
        elseif($nome_categ == null){
            echo "alert_notification_error_null!-|-alert-warning";
        }
        else{
            if (is_string($nome_categ)) {
                $nome_categ = ucfirst(strtolower($nome_categ));

                if ($objCategoria->cadastrar($nome_categ)) {
                    echo "Success!";
                }else{
                    echo "alert_notification_error!-|-alert-danger";
                }
            } else {
                echo "alert_notification_error_data_bite!-|-alert-warning";
            }
        }
        
    }

    if (isset($_POST['apagarCategoria'])) {
        if ($objCategoria->apagar($id_categoria)) {
            echo "Apagado!";
        }else{
            echo "alert_notification_error!-|-alert-danger";
        }
    }
?>