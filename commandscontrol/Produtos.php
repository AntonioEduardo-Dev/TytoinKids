<?php
    require_once "../commandsclass/Produtos.class.php";

    //instanciando classes
    $objProduto = new Produtos();

    //execucao de metodos
    
    if (isset($_POST['listarCategorias'])) {
        $objProduto->listarCategorias();
    }

    if (isset($_POST['listarProdutos'])) {
        $objProduto->listar();
    }

    if (isset($_POST['listarProduto'])) {
        $objProduto->listarProduto(intval($_POST['id_produto']));
    }
    
    if (isset($_POST['btn_cadastrar'])) {

        // alocando posts nas variaveis
        $nome       = $_POST['prod_nome'];
        $categoria  = $_POST['prod_categ'];
        $preco      = $_POST['prod_preco'];
        $quantidade = $_POST['prod_qtd'];
        $imagem     = $_POST['prod_imagem'];
        
        if($categoria == "" || $nome == "" || $preco == "" || $quantidade == ""){
            echo "alert_notification_error_empty!-|-alert-warning";
        }
        elseif($categoria == null || $nome == null || $preco == null || $quantidade == null){
            echo "alert_notification_error_null!-|-alert-warning";
        }
        else{
            if ($categoria != 0) {
                if ((is_string($nome)) && (is_numeric($categoria)) && (is_numeric($preco)) && (is_numeric($quantidade))) {
                    $nome = ucfirst(strtolower($nome));

                    echo $objProduto->cadastrar($categoria, $nome, $preco,$quantidade,$imagem);
                    /*
                    if ($objProduto->cadastrar($categoria, $nome, $preco,$quantidade,$imagem)) {
                        echo "Success!";
                    }else{
                        echo "alert_notification_error!";
                    }
                    */
                } else {
                    echo "alert_notification_error_data_bite!-|-alert-warning";
                }
            }else {
                echo "alert_notification_error_categoria_null!-|-alert-warning";
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
                $dir = "../commandview/assets/img/images/"; // definir diretorio para upload da imagem
    
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

    if (isset($_POST['btn_cadastrar_cores'])) {
        $id_produto = $_POST['btn_cadastrar_cores'];

        $cores              = [];
        $coresDefinidos     = ["Vermelho","Verde","Azul","Amarelo"];
        $tamanhos           = [];
        $tamanhosDefinidos  = ["P","M","G","GG","1","2","3","4"];
        $cores              = $_POST['cores'];
        $tamanhos           = $_POST['tamanhos'];
        $erroCores          = 0;
        $erroTamanho        = 0;
        
        if (count($cores) <= count($coresDefinidos)) {
            for ($i = 0; $i < count($cores); $i++) { 
                if ($cores[$i] === "1") {
                    if(!($objProduto->cadastrarCorProduto($id_produto, $coresDefinidos[$i]))){
                        $erroCores++;
                    }
                }
            }    
        }else {
            $erroCores++;
        }
        
        if (count($tamanhos) <= count($tamanhosDefinidos)) {
            for ($i = 0; $i < count($tamanhos); $i++) { 
                if ($tamanhos[$i] === "1") {
                    if(!($objProduto->cadastrarTamProduto($id_produto, $tamanhosDefinidos[$i]))){
                        $erroTamanho++;
                    }
                }
            }
        }else {
            $erroTamanho++;
        }

        if ($erroCores > 0 && $erroTamanho > 0) {
            echo "alert_notification_error_tam_cor!-|-alert-danger";
        }elseif($erroCores > 0){
            echo "alert_notification_error_cor!-|-alert-danger";
        }elseif($erroTamanho > 0){
            echo "alert_notification_error_tamanho!-|-alert-danger";
        }else{
            echo "Produto cadastrado com sucesso!";
        }
    }

    if (isset($_POST['editarProdutos'])) {
        $id_produto = 6;
        $nome = "Vestido Primário"; $preco = 22; $quantidade = 3; $imagem = NULL;

        if ($objProduto->editar($id_produto,$nome,$preco,$quantidade,$imagem)) {
            echo "Editado!";
        }else {
            echo "alert_notification_error!-|-alert-danger";
        }
    }
    
    if (isset($_POST['apagarProdutos'])) {
        if ($objProduto->apagar($id_produto)) {
            echo "Apagado!";
        }else {
            echo "alert_notification_error!-|-alert-danger";
        }
    }

?>