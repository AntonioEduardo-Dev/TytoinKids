<?php
    require_once "../models/Produtos.class.php";
    require_once "../models/datatable/ListarProduto.class.php";

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
        $id_produto = ((isset($_GET['id_produto']))? intval($_GET['id_produto']) : "");
        $id_tamanho = ((isset($_GET['id_tamanho']))? intval($_GET['id_tamanho']) : "");

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
        $id_produto = ((isset($_GET['id_produto']))? intval($_GET['id_produto']) : "");

        if ($dados_produto = $objProduto->listarProduto($id_produto)) {
            if ($imagens_produto = $objProduto->listarImagensProduto($id_produto)) {
                $dados      = array();
                $imagens    = array();

                foreach ($imagens_produto as $key_imagem => $imagem) {
                    $imagens[$key_imagem] = [
                        "id_imagem_produto"     => $imagem["id_imagem_produto"],
                        "imagem_produto"        => $imagem["imagem_produto"]
                    ];
                }

                foreach ($dados_produto as $key_produto => $produto) {
                    $novos_dados = [
                        "id_produto"                => $produto["id_produto"], 
                        "nome_produto"              => $produto["nome_produto"], 
                        "preco_produto"             => $produto["preco_produto"], 
                        "id_categoria"              => $produto["id_categoria"], 
                        "nome_categoria"            => $produto["nome_categoria"], 
                        "id_tamanho_produto"        => $produto["id_tamanho_produto"], 
                        "quatidade_disponivel"      => $produto["quatidade_disponivel"], 
                        "id_personagem_produto"     => $produto["id_personagem_produto"], 
                        "id_tamanho"                => $produto["id_tamanho"], 
                        "tamanho"                   => $produto["tamanho"],
                        "id_personagem"             => $produto["id_personagem"],
                        "personagem"                => $produto["personagem"],
                        "imagens"                   => $imagens
                    ];

                    $dados[$key_produto] = $novos_dados;
                }

                $retorno = [
                    "type" => "success", 
                    "data" => $dados,
                ];
            } else {
                $retorno = [
                    "type" => "error",
                    "data" => "Nenhuma imagem cadastrada",
                ];
            }
        } else {
            $retorno = [
                "type" => "error",
                "data" => "Nenhum produto cadastrado",
            ];
        }

        echo json_encode($retorno);
    }

    if (isset($_GET['btn_listar_produto'])) {
        $id_produto = ((isset($_GET['id_produto']))? intval($_GET['id_produto']) : "");
        
        $consulta                       = $objProduto->listarProduto($id_produto);
        $consulta_personagem            = $objProduto->listarProdutoPersonagens($id_produto);
        $consultaTamanhos               = $objProduto->listarProdutoTamanhos($id_produto);
        $consultaPersonagensDisponiveis = $objProduto->listarPersonagens();
        $consultaTamanhosDisponiveis    = $objProduto->listarTamanhos();

        $dados = [
            "produto"                       => $consulta, 
            "personagem"                    => $consulta_personagem, 
            "tamanhos"                      => $consultaTamanhos, 
            "personagens_disponiveis"       => $consultaPersonagensDisponiveis, 
            "tamanhos_disponiveis"          => $consultaTamanhosDisponiveis,
        ];

        $retorno = [
            "type" => "success", 
            "data" => $dados,
        ];

        echo json_encode($retorno);
    }
    
    if (isset($_POST['btn_cadastrar'])) {

        // alocando posts nas variáveis
        $nome       = (isset($_POST['prod_nome'])       ? $_POST['prod_nome']   : "");
        $categoria  = (isset($_POST['prod_categ'])      ? $_POST['prod_categ']  : "");
        $preco      = (isset($_POST['prod_preco'])      ? $_POST['prod_preco']  : "");
        $imagens    = (isset($_POST['prod_imagens'])    ? $_POST['prod_imagens']: "");
        
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

                    if($id_produto = $objProduto->cadastrar($categoria, $nome, $preco, $categoria)){
                        if (isset($imagens) && is_array($imagens) && count($imagens) > 0 ) {
                            foreach ($imagens as $key => $imagem) {
                                $objProduto->cadastrarImagemProduto($id_produto, $imagem["nome_imagem"]);
                            }
                        }

                        echo intval($id_produto);
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
                    $dir = "../views/assets/img/images/"; // definir diretório para upload da imagem
        
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
        $id_produto = ((isset($_POST['id_produto'])) ? intval($_POST['id_produto']) : "");

        $tamanhosDefinidos      = ["1","2","4","6","8"];
        $id_personagem          = (isset($_POST['id_personagem']) ? $_POST['id_personagem'] : "");
        $tamanhos               = (isset($_POST['tamanhos']) ? $_POST['tamanhos'] : "");
        $erro_personagens       = 0;
        $erro_tamanho           = 0;

        if(isset($id_produto) && is_int($id_produto)){
            if (isset($id_personagem) && $id_personagem != "" && $id_produto != "") {
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
                    $objProduto->apagarImagensProduto($id_produto);
                    $objProduto->apagar($id_produto);
                    echo "alert_notification_error_tam_person!-|-alert-danger";
                }elseif($erro_personagens > 0){
                    $objProduto->apagarImagensProduto($id_produto);
                    $objProduto->apagar($id_produto);
                    echo "alert_notification_error_person!-|-alert-danger";
                }elseif($erro_tamanho > 0){
                    $objProduto->apagarImagensProduto($id_produto);
                    $objProduto->apagar($id_produto);
                    echo "alert_notification_error_tamanho!-|-alert-danger";
                }else{
                    echo "Produto cadastrado com sucesso!";
                }
            }else{
                echo "alert_notification_error_person_insert!-|-alert-danger";
            }
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    }

    if (isset($_POST['btn_editar_produto'])) {
        // alocando posts nas variáveis
        $nome       = (isset($_POST['prod_nome'])       ? $_POST['prod_nome']   : "");
        $categoria  = (isset($_POST['prod_categ'])      ? $_POST['prod_categ']  : "");
        $preco      = (isset($_POST['prod_preco'])      ? $_POST['prod_preco']  : "");
        // $imagens    = (isset($_POST['prod_imagens'])    ? $_POST['prod_imagens']: "");
        
        $id_produto = (isset($_POST['id_produto']) ? intval($_POST['id_produto']) : "");

        $tamanhosDefinidos      = ["1","2","4","6","8"];
        $id_personagem          = (isset($_POST['id_personagem']) ? $_POST['id_personagem'] : "");
        $tamanhos               = (isset($_POST['tamanhos']) ? $_POST['tamanhos'] : "");
        $erro_personagens       = 0;
        $erro_tamanho           = 0;
        $erro_imagens           = 0;
        $qtd_tamanho            = 0;

        if (isset($tamanhos)) {
            foreach ($tamanhos as $key => $tamanho) {
                if (intval($tamanho['qtd_tamanho']) == 0) {
                    $qtd_tamanho++;
                }
            }
        }
        
        if(isset($id_produto) && is_int($id_produto)){
            if($categoria == "" || $nome == "" || $preco == "" || !(isset($id_personagem)) || $id_personagem == ""){
                echo "alert_notification_error_empty!-|-alert-warning";
            }
            elseif($categoria == null || $nome == null || $preco == null){
                echo "alert_notification_error_null!-|-alert-warning";
            }
            elseif($qtd_tamanho == 6){
                echo "alert_notification_error_empty!-|-alert-warning";
            }
            else{
                if ((is_string($nome)) && (is_numeric($categoria)) && (is_numeric($preco))) {
                    // $nome = ucfirst(strtolower($nome));

                    if($objProduto->editar($id_produto, $nome, $preco, $categoria)){
                        if (isset($imagens) && is_array($imagens) && count($imagens) > 0 ) {
                            foreach ($imagens as $key => $imagem) {
                                if(!($objProduto->cadastrarImagemProduto($id_produto, $imagem["nome_imagem"]))){
                                    $erro_imagens++;
                                }
                            }
                        }

                        if ($erro_imagens == 0) {

                            if (isset($id_personagem) && $id_personagem != "") {
                                if(!($objProduto->editarPersonagemProduto($id_produto, $id_personagem))){
                                    $erro_personagens++;
                                }
                                if (isset($tamanhos)) {
                                    $objProduto->apagarTamanhosProduto($id_produto);

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
                                }
                        
                                if ($erro_personagens > 0 && $erro_tamanho > 0) {
                                    $objProduto->apagarImagensProduto($id_produto);
                                    $objProduto->apagar($id_produto);
                                    echo "alert_notification_error_tam_person!-|-alert-danger";
                                }elseif($erro_personagens > 0){
                                    $objProduto->apagarImagensProduto($id_produto);
                                    $objProduto->apagar($id_produto);
                                    echo "alert_notification_error_person!-|-alert-danger";
                                }elseif($erro_tamanho > 0){
                                    $objProduto->apagarImagensProduto($id_produto);
                                    $objProduto->apagar($id_produto);
                                    echo "alert_notification_error_tamanho!-|-alert-danger";
                                }else{
                                    echo "Produto editado com sucesso!";
                                }

                            }else{
                                $objProduto->apagarImagensProduto($id_produto);
                                $objProduto->apagar($id_produto);
                                echo "alert_notification_error_person_insert!-|-alert-danger";
                            }
                        }else {
                            $objProduto->apagarImagensProduto($id_produto);
                            $objProduto->apagar($id_produto);
                            echo "alert_notification_error!-|-alert-danger";
                        }
                    } else {
                        echo "alert_notification_error_id!-|-alert-warning";
                    }
                    
                } else {
                    echo "alert_notification_error_data_bite!-|-alert-warning";
                }
            }
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    }
    
    if (isset($_POST['btn_apagar'])) {
        $id_produto = ((isset($_POST['id_produto'])) ? intval($_POST['id_produto']) : "");

        if(isset($id_produto) && is_int($id_produto)){
            if ($objProduto->apagarImagensProduto($id_produto)){
                if ($objProduto->apagar($id_produto)){
                    echo "Apagado!";
                }else {
                    echo "alert_notification_error!-|-alert-danger";
                };
            }else {
                echo "alert_notification_error!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_data_bite!-|-alert-danger";
        };
    }

?>