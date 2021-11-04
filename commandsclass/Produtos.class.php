<?php
    require_once "Connection.class.php";

    class Produtos{
        public function listar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria WHERE 1";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    foreach ($dados as $indice => $dado) {
                        echo '<div class="col-lg-4 col-md-6 text-center '.$dado['nome_categoria'].'">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="produto?id='.$dado['id_produto'].'" id="single-product-item" data-id="'.$dado['id_produto'].'"><img src="commandsview/assets/img/images/'.$dado['imagem_produto'].'" alt="'.$dado['nome_produto'].'"></a>
                                    </div>
                                    <h3>'.$dado['nome_produto'].'</h3>
                                    <p class="product-price"><span>P/Quantidade</span> R$'.$dado['preco_produto'].' </p>
                                    <a href="carrinho" data-id="'.$dado['id_produto'].'"" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho</a>
                                </div>
                            </div>';
                    }
                else:
                    echo '<div class="col-lg-4 col-md-6 text-center indisponível"></div>
                            <div class="col-lg-4 col-md-6 text-center indisponível">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a><img src="commandsview/assets/img/images/productind.jpg" alt="Produtos Indisponíveis"></a>
                                    </div>
                                    <h3>Produtos Indisponíveis</h3>
                                    <p class="product-price"><span>P/Quantidade</span> R$00.00 </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-center indisponível"></div>';
                endif;

            } catch (PDOException $e) {
                echo "Erro de listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listarCategorias(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT DISTINCT(categorias.nome_categoria) 
                        FROM categorias INNER JOIN produtos 
                        ON categorias.id_categoria = produtos.id_categoria_fk 
                        WHERE 1 = 1 LIMIT 10";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    echo '<ul>
                            <li class="li active" data-filter="*">Todos</li>';
                    foreach ($dados as $indice => $dado) {
                        echo '
                        <li class="li" data-filter=".'.$dado['nome_categoria'].'">'.$dado['nome_categoria'].'</li>';
                    }
                    echo "</ul>";
                endif;

            } catch (PDOException $e) {
                echo "Erro de listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarCategoriasFilter(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT categorias.nome_categoria, (SELECT count(produtos.id_produto) FROM produtos WHERE produtos.id_categoria_fk=categorias.id_categoria ) as quantidade FROM categorias WHERE 1 = 1 LIMIT 10";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    echo '  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active text-center" data-filter="*" data-toggle="list" href="loja" role="tab" aria-controls="home">
                                <i class="fas fa-angle-right"></i>
                                Todos
                                <span class="badge badge-primary-custom badge-pill">Qtd</span>
                            </a>';
                    foreach ($dados as $indice => $dado) {
                        echo '  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-filter=".'.$dado['nome_categoria'].'" data-toggle="list" href="loja" role="tab" aria-controls="home">
                                    <i class="fas fa-angle-right"></i>
                                    '.$dado['nome_categoria'].'
                                    <span class="badge badge-primary-custom badge-pill">'.$dado['quantidade'].'</span>
                                </a>';
                    }
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProduto($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria WHERE id_produto = :id_produto";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    foreach ($dados as $dado) {
                        echo $dado["id_produto"]."-|-".$dado["nome_produto"]."-|-".$dado["preco_produto"]."-|-".$dado["quatidade_disponivel"]."-|-".$dado["imagem_produto"]."-|-".$dado["nome_categoria"];
                    }
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoCores($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT cor FROM cor_produto WHERE cor_produto.id_produto_fk = :id_produto";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    $resultado = "-|-att";
                    
                    for ($i = 0; $i < $vl; $i++) { 
                        $resultado .= "-|-".$dados[$i]["cor"];
                    }
                    echo $resultado;
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoTamanhos($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT tamanho FROM tamanho_produto WHERE tamanho_produto.id_produto_fk = :id_produto";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    $resultado = "-|-att";

                    for ($i = 0; $i < $vl; $i++) { 
                        $resultado .= "-|-".$dados[$i]["tamanho"];
                    }
                    echo $resultado;
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function quantidadeProdutos(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT * FROM produtos";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                return $vl;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function quantidadeProdutosDisponiveis($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT quatidade_disponivel FROM produtos WHERE produtos.id_produto = :id_produto";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->execute();

                $vl = $consulta->rowCount();
                if($vl > 0){
                    $dados = $consulta->fetchAll();
                    return $dados[0][0];
                }else{
                    return 0;
                }

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarAll($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT * FROM produtos WHERE produtos.id_produto = :id_produto";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0):
                    $dados = $consulta->fetchAll();
                    return $dados;
                else:
                    return "";
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrar($categoria, $nome, $preco, $quantidade, $imagem){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "INSERT INTO produtos(id_produto, id_categoria_fk, nome_produto, preco_produto, quatidade_disponivel, imagem_produto) VALUES (NULL, :categoria, :nome, :preco, :quantidade, :imagem)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":categoria", $categoria);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":preco", $preco);
                $cadastrar->bindValue(":quantidade", $quantidade);
                $cadastrar->bindValue(":imagem", $imagem);

                if($cadastrar->execute()):
                    return $connection->lastInsertId();
                else:
                    return "alert_notification_error_id!";
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarCorProduto($id_produto, $cor){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "INSERT INTO cor_produto (id_cor_produto, id_produto_fk, cor) VALUES (NULL, :id_produto, :cor)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":cor", $cor);
                
                if($cadastrar->execute()):
                    return true;
                else:
                    return false;
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarTamProduto($id_produto, $tamanho){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "INSERT INTO tamanho_produto (id_tamanho_produto, id_produto_fk, tamanho) VALUES (NULL, :id_produto, :tamanho)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":tamanho", $tamanho);

                if($cadastrar->execute()):
                    return true;
                else:
                    return false;
                endif;

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editar($id_produto,$nome,$preco,$quantidade,$imagem){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "UPDATE produtos SET nome_produto = :nome, preco_produto = :preco, quatidade_disponivel = :quantidade, imagem_produto = :imagem WHERE produtos.id_produto = :id_produto";

                $atualizar = $connection->prepare($sql);
                $atualizar->bindValue(":id_produto", $id_produto);
                $atualizar->bindValue(":nome", $nome);
                $atualizar->bindValue(":preco", $preco);
                $atualizar->bindValue(":quantidade", $quantidade);
                $atualizar->bindValue(":imagem", $imagem);

                if($atualizar->execute()):
                    return true;
                else:
                    return false;
                endif;
                
            } catch (PDOException $e) {
                echo "Erro de editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagar($id_produto){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "DELETE FROM produtos WHERE produtos.id_produto = :id_produto";

                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_produto", $id_produto);

                if($apagar->execute()):
                    return true;
                else:
                    return false;
                endif;
                
            } catch (PDOException $e) {
                echo "Erro de apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>