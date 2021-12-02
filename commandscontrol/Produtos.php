<?php
    require_once "../commandsclass/Produtos.class.php";
    require_once "../commandsclass/datatable/ListarProduto.class.php";

    // Instanciando classes
    $objProduto = new Produtos();

    // Execução de métodos
    
    if(isset($_POST['listarProdutosTable'])){
        //instanciando classes
        $objProdutoTable = new ListarProduto();
        $dados = $objProdutoTable->listar();

        if ($dados) {
            echo json_encode($dados);
        }
    };
    
    if (isset($_GET['listarCategorias'])) {
        if ($dados = $objProduto->listarCategorias()) {
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
    }

    if (isset($_GET['listarCategoriasFilter'])) {
        if ($dados = $objProduto->listarCategoriasFilter()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhuma categoria filtrada",
            ];
        }

        echo json_encode($retorno);
    }

    if (isset($_GET['listarProdutos'])) {
        if ($dados = $objProduto->listar()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhum produto cadastrado",
            ];
        }

        echo json_encode($retorno);
    }

    if (isset($_GET['listarProduto'])) {
        $objProduto->listarProduto(intval($_GET['id_produto']));
        
        
        if ($dados = $objProduto->listarProduto(intval($_GET['id_produto']))) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhum produto cadastrado",
            ];
        }

        echo json_encode($retorno);
    }

    if (isset($_GET['btn_listar_produto'])) {
        $consulta = $objProduto->listarProduto(intval($_GET['id_produto']));
        $consultaCores = $objProduto->listarProdutoPersonagens(intval($_GET['id_produto']));
        $consultaTamanhos = $objProduto->listarProdutoTamanhos(intval($_GET['id_produto']));

        $dados = [
            "produto"   => $consulta, 
            "cores"     => $consultaCores, 
            "tamanhos"  => $consultaTamanhos,
        ];

        $retorno = [
            "type" => "success", 
            "data" => $dados,
        ];

        echo json_encode($retorno);
    }
    
    if (isset($_POST['btn_cadastrar'])) {

        // alocando posts nas variáveis
        $nome       = $_POST['prod_nome'];
        $categoria  = $_POST['prod_categ'];
        $preco      = $_POST['prod_preco'];
        $imagem     = $_POST['prod_imagem'];
        
        if($categoria == "" || $nome == "" || $preco == ""){
            echo "alert_notification_error_empty!-|-alert-warning";
        }
        elseif($categoria == null || $nome == null || $preco == null){
            echo "alert_notification_error_null!-|-alert-warning";
        }
        else{
            if ($categoria != 0) {
                if ((is_string($nome)) && (is_numeric($categoria)) && (is_numeric($preco))) {
                    $nome = ucfirst(strtolower($nome));

                    echo $objProduto->cadastrar($categoria, $nome, $preco, $imagem);
                    
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

            $ext = strtolower(substr($_FILES['nm_imageUpload']['name'], -4)); // pegar extensão
            
            $extValidas = array(".jpg",".jpeg",".png"); // extensões validas

            $verifica = 0;
            for ($i=0; $i < count($extValidas); $i++) { 
                if ($ext == $extValidas[$i]) $verifica++;
            }

            if ($verifica > 0) {
                $novoNome = md5(time()).$ext; // definir novo nome
                $dir = "../commandsview/assets/img/images/"; // definir diretório para upload da imagem
    
                // upload imagem
                if (move_uploaded_file($_FILES['nm_imageUpload']['tmp_name'], $dir.$novoNome)) {
                    echo 'true-|-'.$novoNome;
                }else{
                    echo 'false-|-Imagem_nao_enviada!';
                }
            }else{
                echo 'false-|-Extensao_Invalida!';
            }

        }else{
            echo 'false-|-erro_inesperado!';
        }
    }

    if (isset($_POST['btn_cadastrar_personagens'])) {
        $id_produto = $_POST['btn_cadastrar_personagens'];

        $personagensDefinidos   = ["Vermelho","Verde","Azul","Amarelo"];
        $tamanhosDefinidos      = ["1","2","4","6","8"];
        $personagens            = $_POST['personagem'];
        $tamanhos               = $_POST['tamanhos'];
        $quantidade_personagens = $_POST['quantidade_personagens'];
        $quantidade_tamanhos    = $_POST['quantidade_tamanhos'];
        $erro_personagens       = 0;
        $erro_tamanho           = 0;
        
        if(!($objProduto->cadastrarPersonagemProduto($id_produto, $personagens, $quantidade_personagens))){
            $erro_personagens++;
        }
        
        if (count($tamanhos) <= count($tamanhosDefinidos)) {
            for ($i = 0; $i < count($tamanhos); $i++) { 
                if ($tamanhos[$i] === "1" && $quantidade_tamanhos[$i] != 0 && $quantidade_tamanhos[$i] != "") {
                    if(!($objProduto->cadastrarTamProduto($id_produto, $tamanhosDefinidos[$i], $quantidade_tamanhos[$i]))){
                        $erro_tamanho++;
                    }
                }
            }
        }else {
            $erro_tamanho++;
        }

        if ($erro_personagens > 0 && $erro_tamanho > 0) {
            echo "alert_notification_error_tam_cor!-|-alert-danger";
        }elseif($erro_personagens > 0){
            echo "alert_notification_error_cor!-|-alert-danger";
        }elseif($erro_tamanho > 0){
            echo "alert_notification_error_tamanho!-|-alert-danger";
        }else{
            echo "Produto cadastrado com sucesso!";
        }
    }

    if (isset($_POST['editarProdutos'])) {
        $id_produto = 6;
        $nome = "Vestido Primário"; 
        $preco = 22; 
        $quantidade = 3; 
        $imagem = NULL;

        if ($objProduto->editar($id_produto, $nome, $preco, $quantidade, $imagem)) {
            echo "Editado!";
        }else {
            echo "alert_notification_error!-|-alert-danger";
        }
    }
    
    if (isset($_POST['btn_apagar'])) {
        $id_produto = intval($_POST['id_produto']);

        if(is_int($id_produto)):
            if ($objProduto->apagar($id_produto)):
                echo "Apagado!";
            else:
                echo "alert_notification_error!-|-alert-danger";
            endif;
        else:
            echo "alert_notification_error_data_bite!-|-alert-danger";
        endif;
    }

?>