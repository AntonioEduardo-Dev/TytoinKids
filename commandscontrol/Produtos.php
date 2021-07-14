<?php
    require_once "../commandsclass/Produtos.class.php";

    //instanciando classes
    $objProduto = new Produtos();

    //execucao de metodos
    if (isset($_POST['btn_cadastrar'])) {

        // alocando posts nas variaveis
        $nome       = $_POST['prod_nome'];
        $categoria  = $_POST['prod_categ'];
        $preco      = $_POST['prod_qtd'];
        $quantidade = $_POST['prod_preco'];
        $imagem     = $_POST['prod_imagem'];
        
        if($categoria == "" || $nome == "" || $preco == "" || $quantidade == ""){
            echo "alert_notification_error_empty!";
        }
        elseif($categoria == null || $nome == null || $preco == null || $quantidade == null){
            echo "alert_notification_error_null!";
        }
        else{
            if ((is_string($nome)) && (is_numeric($categoria)) && (is_numeric($preco)) && (is_numeric($quantidade))) {
                $nome = ucfirst(strtolower($nome));

                if ($objProduto->cadastrar($categoria, $nome, $preco,$quantidade,$imagem)) {
                    echo "Success!";
                }else{
                    echo "alert_notification_error!";
                }
            } else {
                echo "alert_notification_error_data_bite!";
            }
        }
        
    }
    if(isset($_FILES['nm_imageUpload'])){
        if (!empty($_FILES['nm_imageUpload'])){

            $ext = strtolower(substr($_FILES['nm_imageUpload']['name'], -4)); // pegar extensao
            
            $extValidas = array(".jpg",".jpeg",".png"); // extensoes validas

            $verifica = 0;
            for ($i=0; $i < count($extValidas); $i++) { 
                if ($ext == $extValidas[$i]) $verifica++;
            }

            if ($verifica > 0) {
                $novoNome = md5(time()).$ext; // definir novo nome
                $dir = "../commandview/assets/img/newImages/"; // definir diretorio para upload da imagem
    
                // upload imagem
                if (move_uploaded_file($_FILES['nm_imageUpload']['tmp_name'], $dir.$novoNome)) {
                    echo 'true-|-'.$novoNome;
                }else{
                    echo 'false-|-Imagem não enviada';
                }
            }else{
                echo 'false-|-Extensão Inválida';
            }

        }else{
            echo 'false-|-Ocorreu um erro inesperado';
        }
    }

    if (isset($_POST['listarCategorias'])) {
        $objProduto->listarCategorias();
    }

    if (isset($_POST['listarProdutos'])) {
        $objProduto->listar();
    }

    if (isset($_POST['listarProduto'])) {
        $objProduto->listarProduto($_POST['id_produto']);
    }

    if (isset($_POST['editarProdutos'])) {
        $id_produto = 6;
        $nome = "Vestido Primário"; $preco = 22; $quantidade = 3; $imagem = NULL;

        if ($objProduto->editar($id_produto,$nome,$preco,$quantidade,$imagem)) {
            echo "Editado!";
        }
    }
    
    if (isset($_POST['apagarProdutos'])) {
        if ($objProduto->apagar($id_produto)) {
            echo "Apagado!";
        }
    }

?>