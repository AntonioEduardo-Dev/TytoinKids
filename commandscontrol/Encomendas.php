<?php
    session_start();
    require_once "../commandsclass/Encomendas.class.php";
    require_once "../commandsclass/Produtos.class.php";

    //instanciando classes
    $objEncomenda = new Encomendas();
    $objProduto = new Produtos();

    //execução de métodos
    if (isset($_GET["cart"])){
        $id_produto = $_GET["id_produto"];
        $qtd_produto = intval($_GET["qtd_produto"]);
        if($qtd_produto > 0){
            $qtd_produto_disp = intval($objProduto->quantidadeProdutosDisponiveis($id_produto));
            
            if($qtd_produto_disp != 0){
                if($qtd_produto_disp != NULL){
                    if($qtd_produto <= $qtd_produto_disp){
                        $disponibilidade = "true";
                    }else{
                        $disponibilidade = "false";
                    };
                }else{
                    $disponibilidade = "true";
                };
            }else{
                $disponibilidade = "false";
            };

            if ($disponibilidade == "true"){
                $dados = $objProduto->listarTodos($id_produto);

                $idProduto              = ((isset($dados[0]["id_produto"]))             ? $dados[0]["id_produto"] : "Indisponível");
                $imgProduto             = ((isset($dados[0]["imagem_produto"]))         ? $dados[0]["imagem_produto"] : "productind.jpg");
                $nomeProduto            = ((isset($dados[0]["nome_produto"]))           ? $dados[0]["nome_produto"] : "Indisponível");
                $preco_produto          = ((isset($dados[0]["preco_produto"]))          ? $dados[0]["preco_produto"] : "Indisponível");
                $qtd_produto_disp       = ((isset($dados[0]["quatidade_disponivel"]))   ? $dados[0]["quatidade_disponivel"] : "Indisponível");

                $cart = [
                    0 => $idProduto,
                    1 => $imgProduto,
                    2 => $nomeProduto,
                    3 => $preco_produto,
                    4 => $qtd_produto,
                    5 => $qtd_produto_disp,
                ];

                if (empty($_SESSION["cart"])){
                    $_SESSION["cart"] = [];
                };
                array_push($_SESSION["cart"], $idProduto.",".$imgProduto.",".$nomeProduto.",".$preco_produto.",".$qtd_produto.",".$qtd_produto_disp);

                var_dump ($_SESSION["cart"]);
            }else{
                echo "alert_notification_error_qtd_disp!-|-alert-danger";
            };
        }else{
            echo "alert_notification_error_qtd_insert!-|-alert-danger";
        };
    };

    if(isset($_GET["btn_unset"])){
        $linha = $_GET["linha"];
        if(isset($_SESSION["cart"])){
            unset($_SESSION["cart"][$linha]);
            if(empty($_SESSION["cart"])){
                session_destroy();
            };

            echo "Removido!-|-alert-success";
        }else{
            echo "alert_notification_error!-|-alert-danger";
        };
    };

    if(isset($_POST["btn_cadastrar"])){
        if(isset($_SESSION["cart"])){
            foreach ($_SESSION['cart'] as $key => $value) {
                # code...
            }
            if(true){
                echo "Sucesso, encomenda cadastrada!-|-alert-success";
            };
        }else{
            echo "alert_notification_error_cart_empty!-|-alert-danger";
        };
    };
?>