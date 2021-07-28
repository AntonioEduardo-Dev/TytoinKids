<?php
    require_once "../commandsclass/Categorias.class.php";
    
    //instanciando classes
    $objCategoria = new Categorias();

    //execução de métodos
    if(isset($_POST['listar'])):
        $objCategoria->listarCategorias();
    endif;

    if(isset($_POST['listarCategorias'])):
        $objCategoria->listarSelectCategorias();
    endif;

    if (isset($_POST['btn_cadastrar'])):
        // alocando post nas variáveis
        $nome_categorias = $_POST['categ_nome'];

        if($nome_categorias == ""):
            echo "alert_notification_error_empty!-|-alert-warning";
        elseif($nome_categorias == null):
            echo "alert_notification_error_null!-|-alert-warning";
        else:
            if (is_string($nome_categorias)):
                strtolower($nome_categorias);
                $nome_categorias = ucfirst(str_replace(" ","_",$nome_categorias));

                if ($objCategoria->cadastrar($nome_categorias)):
                    echo "Sucesso!";
                else:
                    echo "alert_notification_error!-|-alert-danger";
                endif;

            else:
                echo "alert_notification_error_data_bite!-|-alert-warning";
            endif;

        endif;
        
    endif;

    if(isset($_POST['btn_apagar'])):
        $id_categoria = intval($_POST['id_categoria']);

        if(is_int($id_categoria)):
            if($objCategoria->apagarCategorias($id_categoria)):
                echo "Apagado!";
            else:
                echo "alert_notification_error!-|-alert-danger";
            endif;
        else:
            echo "alert_notification_error_data_bite!-|-alert-danger";
        endif;
    endif;
?>