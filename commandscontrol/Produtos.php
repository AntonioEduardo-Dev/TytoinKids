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

    if (isset($_GET['listarPersonagens'])) {
        if ($dados = $objProduto->listarPersonagens()) {
            $retorno = [
                "type" => "success", 
                "data" => $dados,
            ];
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhum personagem cadastrado",
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

    if (isset($_GET['listar_quantidade'])) {
        $id_produto = $_GET['id_produto'];
        $id_tamanho = $_GET['id_tamanho'];

        if ($dados = $objProduto->quantidadeProdutosTamanho($id_produto, $id_tamanho)) {
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

    if (isset($_GET['listarTamanhos'])) {
        if ($dados = $objProduto->listarTamanhos()) {
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
        $consulta_personagem = $objProduto->listarProdutoPersonagens(intval($_GET['id_produto']));
        $consultaTamanhos = $objProduto->listarProdutoTamanhos(intval($_GET['id_produto']));

        $dados = [
            "produto"       => $consulta, 
            "personagem"    => $consulta_personagem, 
            "tamanhos"      => $consultaTamanhos,
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
        $imagens    = $_POST['prod_imagens'];
        
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

                    if($id_produto = $objProduto->cadastrar($categoria, $nome, $preco, $imagens)){
                        if (isset($imagens) && is_array($imagens) && count($imagens) > 0 ) {
                            foreach ($imagens as $key => $imagem) {
                                $objProduto->cadastrarImagemProduto($id_produto, $imagem["nome_imagem"]);
                            }
                        }

                        echo $id_produto;

                    } else {
                        echo "alert_notification_error_id!-|-alert-warning";
                    }
                    
                } else {
                    echo "alert_notification_error_data_bite!-|-alert-warning";
                }
            }else {
                echo "alert_notification_error_categoria_null!-|-alert-warning";
            }
        }
        
    }

    if(isset($_FILES['nm_cadastro_imagens'])){
        
        if (!empty($_FILES['nm_cadastro_imagens'])){
            $imagens = $_FILES['nm_cadastro_imagens'];
            $erro_ext_imagens = 0;
            $nomes_imagens = [];

            foreach ($imagens['name'] as $key => $imagem) {
                $ext = strtolower(substr($imagem, -4)); // pegar extensão

                $extValidas = array(".jpg",".png"); // extensões validas

                for ($i=0; $i < count($extValidas); $i++) { 
                    if ($ext == $extValidas[$i]) $erro_ext_imagens++;
                }
                
                if ($erro_ext_imagens > 0) {
                    $novoNome = $key.md5(microtime()).$ext; // definir novo nome
                    $dir = "../commandsview/assets/img/images/"; // definir diretório para upload da imagem
        
                    // upload imagem
                    move_uploaded_file($imagens['tmp_name'][$key], $dir.$novoNome);

                    $imagem_nome = [
                        "nome_imagem" => $novoNome
                    ];

                    array_push($nomes_imagens, $imagem_nome);
                }else{
                    $erro_ext_imagens = 0;
                }
            }

            echo json_encode($nomes_imagens);

        }else{
            echo 'false-|-erro_inesperado!';
        }
        
    }

    if (isset($_POST['btn_cadastrar_personagens'])) {
        $id_produto = $_POST['id_produto'];

        $tamanhosDefinidos      = ["1","2","4","6","8"];
        $id_personagem          = $_POST['id_personagem'];
        $tamanhos               = $_POST['tamanhos'];
        $erro_personagens       = 0;
        $erro_tamanho           = 0;

        if (isset($id_personagem) && $id_personagem != "") {
            if(!($objProduto->cadastrarPersonagemProduto($id_produto, $id_personagem))){
                $erro_personagens++;
            }
    
            foreach ($tamanhos as $indic => $dados_tamanho) {
                if ($dados_tamanho['qtd_tamanho'] != 0) {
                    if(!($objProduto->cadastrarTamProduto($id_produto, 
                        $dados_tamanho['id_tamanho'], 
                        $dados_tamanho['qtd_tamanho'])))
                    {
                        $erro_tamanho++;
                    }
                }
            }
    
            if ($erro_personagens > 0 && $erro_tamanho > 0) {
                echo "alert_notification_error_tam_person!-|-alert-danger";
            }elseif($erro_personagens > 0){
                echo "alert_notification_error_person!-|-alert-danger";
            }elseif($erro_tamanho > 0){
                echo "alert_notification_error_tamanho!-|-alert-danger";
            }else{
                echo "Produto cadastrado com sucesso!";
            }
        }else{
            echo "alert_notification_error_person_insert!-|-alert-danger";
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

        if(is_int($id_produto)){
            if ($objProduto->apagar($id_produto)){
                echo "Apagado!";
            }else {
                echo "alert_notification_error!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    }

?>