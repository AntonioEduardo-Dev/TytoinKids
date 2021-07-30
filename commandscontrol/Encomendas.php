<?php
    session_start();
    require_once "../commandsclass/Encomendas.class.php";
    require_once "../commandsclass/Produtos.class.php";

    //instanciando classes
    $objEncomenda = new Encomendas();
    $objProduto = new Produtos();

    //execução de métodos
    if (isset($_POST["cart"])):
        $id_produto = $_POST["id_produto"];
        $qtd_produto = intval($_POST["qtd_produto"]);
        if($qtd_produto > 0):
            $qtd_produto_disp = intval($objProduto->quantidadeProdutosDisponiveis($id_produto));
            
            if($qtd_produto_disp != 0):
                if($qtd_produto_disp != NULL):
                    if($qtd_produto <= $qtd_produto_disp):
                        $disponibilidade = "true";
                    else:
                        $disponibilidade = "false";
                    endif;
                else:
                    $disponibilidade = "true";
                endif;
            else:
                $disponibilidade = "false";
            endif;

            if ($disponibilidade == "true"):
                $dados = $objProduto->listarAll($id_produto);

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

                if (empty($_SESSION["cart"])):
                    $_SESSION["cart"] = [];
                endif;
                array_push($_SESSION["cart"], $idProduto.",".$imgProduto.",".$nomeProduto.",".$preco_produto.",".$qtd_produto.",".$qtd_produto_disp);

                var_dump ($_SESSION["cart"]);
            else:
                echo "alert_notification_error_qtd_disp!-|-alert-danger";
            endif;
        else:
            echo "alert_notification_error_qtd_insert!-|-alert-danger";
        endif;

        /*
        if (isset($_SESSION["cart"])):
        else:
            $_SESSION["cart"] = "produto";
        endif;
        */
    endif;

    if(isset($_POST["btn_unset"])):
        $linha = $_POST["linha"];
        if(isset($_SESSION["cart"])):
            unset($_SESSION["cart"][$linha]);
            if(empty($_SESSION["cart"])):
                session_destroy();
            endif;

            echo "Removido!-|-alert-success";
        else:
            echo "alert_notification_error!-|-alert-danger";
        endif;
    endif;

    if(isset($_POST["btn_cadastrar"])):
        if(isset($_SESSION["cart"])):
            foreach ($_SESSION['cart'] as $key => $value) {
                # code...
            }
            if(true):
                echo "Sucesso, encomenda cadastrada!-|-alert-success";
            endif;
        else:
            echo "alert_notification_error_cart_empty!-|-alert-danger";
        endif;
    endif;
?>