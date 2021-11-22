<?php
    require_once "../commandsclass/Categorias.class.php";
    require_once "../commandsclass/datatable/ListarCategoria.class.php";
    
    //instanciando classes
    $objCategoria = new Categorias();

    //execução de métodos
    if(isset($_POST['listar'])){
        if ($dados = $objCategoria->listarCategorias()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhuma categoria cadastrada",
            ];
        }

        echo json_encode($retorno);
    };

    //execução de métodos
    if(isset($_POST['listarCategoriasTable'])){
        //instanciando classes
        $objCategoriaTable = new ListarCategoria();
        $dados = $objCategoriaTable->listar();

        if ($dados) {
            echo json_encode($dados);
        }
    };


    if(isset($_POST['listarCategorias'])){
        if ($dados = $objCategoria->listarSelectCategorias()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhuma categoria cadastrada",
            ];
        }

        echo json_encode($retorno);
    };

    if (isset($_POST['btn_cadastrar'])){
        // alocando post nas variáveis
        $nome_categorias = $_POST['categ_nome'];

        if($nome_categorias == ""){
            echo "alert_notification_error_empty!-|-alert-warning";
        }elseif($nome_categorias == null){
            echo "alert_notification_error_null!-|-alert-warning";
        }else{
            if (is_string($nome_categorias)){
                strtolower($nome_categorias);
                $nome_categorias = ucfirst(str_replace(" ","_",$nome_categorias));

                if ($objCategoria->cadastrar($nome_categorias)){
                    echo "Sucesso!";
                }else{
                    echo "alert_notification_error!-|-alert-danger";
                };

            }else{
                echo "alert_notification_error_data_bite!-|-alert-warning";
            };

        };
        
    };

    if(isset($_POST['btn_apagar'])){
        $id_categoria = intval($_POST['id_categoria']);

        if(is_int($id_categoria)){
            if($objCategoria->apagarCategorias($id_categoria)){
                echo "Apagado!";
            }else{
                echo "alert_notification_error!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    };
?>