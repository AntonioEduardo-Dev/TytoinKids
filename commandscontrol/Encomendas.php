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

                if (isset($_SESSION["cart"])):
                    $_SESSION["cart"] = array_map(null, $_SESSION["cart"], $cart);
                else:
                    $array = [];
                    $_SESSION["cart"] = array_map(null, $cart, $cart);

                endif;

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
?>