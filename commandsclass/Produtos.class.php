<?php
    require_once "Connection.class.php";

    class Produtos{
        public function listar(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listarCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT DISTINCT(categorias.nome_categoria) 
                        FROM categorias INNER JOIN produtos 
                        ON categorias.id_categoria = produtos.id_categoria_fk LIMIT 10";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarCategoriasFilter(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT categorias.nome_categoria, (SELECT count(produtos.id_produto) FROM produtos 
                        INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria 
                        WHERE produtos.id_categoria_fk = categorias.id_categoria ) as quantidade 
                        FROM categorias LIMIT 10";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProduto($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria_fk = categorias.id_categoria WHERE id_produto = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoCores($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT cor FROM cor_produto WHERE cor_produto.id_produto_fk = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoTamanhos($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT tamanho FROM tamanho_produto WHERE tamanho_produto.id_produto_fk = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function quantidadeProdutos(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos";
                $consulta = $connection->prepare($sql);
               
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->rowCount() : 0 );
                
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function quantidadeProdutosDisponiveis($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT quatidade_disponivel FROM produtos WHERE produtos.id_produto = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() 
                        && $consulta->rowCount() > 0 
                        && $dados = $consulta->fetchAll()) 
                        ? $dados[0][0] : 0 );
                        
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarTodos($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM produtos WHERE produtos.id_produto = :id_produto";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrar($categoria, $nome, $preco, $quantidade, $imagem){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO produtos(id_produto, id_categoria_fk, nome_produto, preco_produto, quatidade_disponivel, imagem_produto) VALUES (NULL, :categoria, :nome, :preco, :quantidade, :imagem)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":categoria", $categoria);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":preco", $preco);
                $cadastrar->bindValue(":quantidade", $quantidade);
                $cadastrar->bindValue(":imagem", $imagem);

                return (($cadastrar->execute()) ? $connection->lastInsertId() : "alert_notification_error_id!");

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarCorProduto($id_produto, $cor){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "INSERT INTO cor_produto (id_cor_produto, id_produto_fk, cor) VALUES (NULL, :id_produto, :cor)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":cor", $cor);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarTamProduto($id_produto, $tamanho){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "INSERT INTO tamanho_produto (id_tamanho_produto, id_produto_fk, tamanho) VALUES (NULL, :id_produto, :tamanho)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":tamanho", $tamanho);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editar($id_produto,$nome,$preco,$quantidade,$imagem){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "UPDATE produtos SET nome_produto = :nome, preco_produto = :preco, quatidade_disponivel = :quantidade, imagem_produto = :imagem WHERE produtos.id_produto = :id_produto";
                $atualizar = $connection->prepare($sql);
                $atualizar->bindValue(":id_produto", $id_produto);
                $atualizar->bindValue(":nome", $nome);
                $atualizar->bindValue(":preco", $preco);
                $atualizar->bindValue(":quantidade", $quantidade);
                $atualizar->bindValue(":imagem", $imagem);
                
                return (($atualizar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagar($id_produto){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "DELETE FROM produtos WHERE produtos.id_produto = :id_produto";
                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_produto", $id_produto);

                return (($apagar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>