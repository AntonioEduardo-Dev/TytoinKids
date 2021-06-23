<?php
    require_once "../commandsclass/Produtos.class.php";

    //instanciando classes
    $objProduto = new Produtos();

    //definindo variaveis
    $test = 1;
    $nome = "Jonh"; $preco = 22; $quantidade = 3; $imagem = NULL;
    $id_produto = 6;

    //execucao de metodos
    if (isset($_POST['cadastrarProdutos'])) {
        if ($objProduto->cadastrar($nome,$preco,$quantidade,$imagem)) {
            echo "Cadastrado!";
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