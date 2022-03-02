<?php
    require_once "Connection.class.php";

    class Produtos extends Connection{
        public function listar(){
            try {
                $connection = $this->conectar();

                $sql = "SELECT *, 
                        (SELECT imagens_produto.id_imagem_produto 
                        FROM imagens_produto 
                        WHERE imagens_produto.id_produto_fk = produtos.id_produto 
                        ORDER BY imagens_produto.id_imagem_produto 
                        ASC LIMIT 1) 
                        AS id_imagem_produto, 
                        (SELECT imagens_produto.imagem_produto FROM imagens_produto 
                        WHERE imagens_produto.id_produto_fk = produtos.id_produto 
                        ORDER BY imagens_produto.id_imagem_produto 
                        ASC LIMIT 1) 
                        AS imagem_produto,
                        (SELECT GROUP_CONCAT(personagens.personagem SEPARATOR ' ') 
                        FROM personagens 
                        INNER JOIN personagem_produto 
                        ON personagens.id_personagem = personagem_produto.id_personagem_fk
                        WHERE personagem_produto.id_produto_fk = produtos.id_produto) 
                        AS personagens,
                        (SELECT GROUP_CONCAT(tamanhos.tamanho SEPARATOR ' ') 
                        FROM tamanhos 
                        INNER JOIN tamanho_produto 
                        ON tamanhos.id_tamanho = tamanho_produto.id_tamanho_fk 
                        WHERE tamanho_produto.id_produto_fk = produtos.id_produto) 
                        AS tamanhos
                        FROM produtos 
                        INNER JOIN categorias 
                        ON produtos.id_categoria_fk = categorias.id_categoria";
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
                $connection = $this->conectar();

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

        public function listarPersonagens(){
            try {
                $connection = $this->conectar();

                $sql = "SELECT DISTINCT(personagens.personagem), id_personagem FROM personagens";
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
                $connection = $this->conectar();

                $sql = "SELECT DISTINCT(categorias.nome_categoria) AS nome_categoria, 
                        (SELECT count(produtos.id_produto) 
                        FROM produtos WHERE produtos.id_categoria_fk = categorias.id_categoria ) AS quantidade 
                        FROM categorias INNER JOIN produtos ON categorias.id_categoria = produtos.id_categoria_fk 
                        GROUP BY nome_categoria 
                        ORDER BY quantidade DESC LIMIT 10";
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
                $connection = $this->conectar();

                $sql = "SELECT produtos.id_produto, produtos.nome_produto, produtos.preco_produto, 
                        categorias.*, tamanho_produto.id_tamanho_produto, tamanho_produto.quatidade_disponivel, 
                        personagem_produto.id_personagem_produto, tamanhos.id_tamanho, tamanhos.tamanho, 
                        personagens.id_personagem, personagens.personagem, 
                        (SELECT imagens_produto.id_imagem_produto 
                        FROM imagens_produto 
                        WHERE imagens_produto.id_produto_fk = produtos.id_produto 
                        ORDER BY imagens_produto.id_imagem_produto 
                        ASC LIMIT 1) 
                        AS id_imagem_produto, 
                        (SELECT imagens_produto.imagem_produto 
                        FROM imagens_produto 
                        WHERE imagens_produto.id_produto_fk = produtos.id_produto 
                        ORDER BY imagens_produto.id_imagem_produto 
                        ASC LIMIT 1)  
                        AS imagem_produto 
                        FROM produtos INNER JOIN categorias 
                        ON produtos.id_categoria_fk = categorias.id_categoria 
                        INNER JOIN tamanho_produto 
                        ON produtos.id_produto = tamanho_produto.id_produto_fk 
                        INNER JOIN personagem_produto 
                        ON produtos.id_produto = tamanho_produto.id_produto_fk 
                        INNER JOIN tamanhos 
                        ON tamanhos.id_tamanho = tamanho_produto.id_tamanho_fk 
                        INNER JOIN personagens 
                        ON personagens.id_personagem = personagem_produto.id_personagem_fk
                        WHERE id_produto = :id_produto";

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

        public function listarImagensProduto($id_produto){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM imagens_produto WHERE imagens_produto.id_produto_fk = :id_produto";

                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "");

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarTamanhos(){
            try {
                $connection = $this->conectar();
                $status = 1;

                $sql = "SELECT * FROM tamanhos WHERE status = :status";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":status", $status);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarProdutoPersonagens($id_produto){
            try {
                $connection = $this->conectar();

                $sql = "SELECT personagens.personagem, personagens.id_personagem 
                        FROM personagem_produto 
                        INNER JOIN personagens 
                        ON personagem_produto.id_personagem_fk = personagens.id_personagem 
                        WHERE personagem_produto.id_produto_fk = :id_produto 
                        LIMIT 1";
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
                $connection = $this->conectar();

                $sql = "SELECT DISTINCT(tamanhos.id_tamanho), tamanhos.tamanho, tamanho_produto.quatidade_disponivel 
                        FROM tamanho_produto 
                        INNER JOIN tamanhos 
                        ON tamanho_produto.id_tamanho_fk = tamanhos.id_tamanho
                        WHERE tamanho_produto.id_produto_fk = :id_produto";
                        
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
        
        public function quantidadeProdutosTamanho($id_produto, $id_tamanho){
            try {
                $connection = $this->conectar();

                $sql = "SELECT quatidade_disponivel 
                        FROM tamanho_produto 
                        WHERE tamanho_produto.id_produto_fk = :id_produto && tamanho_produto.id_tamanho_produto = :id_tamanho LIMIT 1";
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->bindValue(":id_tamanho", $id_tamanho);
               
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function quantidadeProdutosDisponiveis($id_produto, $id_tamanho){
            try {
                $connection = $this->conectar();

                $sql = "SELECT quatidade_disponivel 
                        FROM tamanho_produto 
                        WHERE tamanho_produto.id_produto_fk = :id_produto 
                        && tamanho_produto.id_tamanho_produto = :id_tamanho LIMIT 1";
                        
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_produto", $id_produto);
                $consulta->bindValue(":id_tamanho", $id_tamanho);
                
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
                $connection = $this->conectar();

                $sql = "SELECT *, 
                        (SELECT imagens_produto.imagem_produto FROM imagens_produto WHERE imagens_produto.id_produto_fk = produtos.id_produto ORDER BY imagens_produto.id_imagem_produto ASC LIMIT 1) AS imagem_produto 
                        FROM produtos 
                        WHERE produtos.id_produto = :id_produto";
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

        public function cadastrar($categoria, $nome, $preco, $imagem){
            try {
                $connection = $this->conectar();

                $sql = "INSERT INTO produtos(id_produto, id_categoria_fk, nome_produto, preco_produto) VALUES (NULL, :categoria, :nome, :preco)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":categoria", $categoria);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":preco", $preco);

                return (($cadastrar->execute()) ? $connection->lastInsertId() : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarPersonagemProduto($id_produto, $id_personagem){
            try {
                $connection = $this->conectar();
    
                $sql = "INSERT INTO personagem_produto VALUES (NULL, :id_produto, :id_personagem)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":id_personagem", $id_personagem);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarTamProduto($id_produto, $tamanho, $quantidade){
            try {
                $connection = $this->conectar();
    
                $sql = "INSERT INTO tamanho_produto VALUES (NULL, :id_produto, :tamanho, :quantidade)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":tamanho", $tamanho);
                $cadastrar->bindValue(":quantidade", $quantidade);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarImagemProduto($id_produto, $imagem_nome){
            try {
                $connection = $this->conectar();
    
                $sql = "INSERT INTO imagens_produto VALUES (NULL, :id_produto, :imagem_nome)";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":imagem_nome", $imagem_nome);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editar($id_produto, $nome, $preco, $categoria){
            try {
                $connection = $this->conectar();
    
                $sql = "UPDATE produtos SET id_categoria_fk = :categoria, nome_produto = :nome, preco_produto = :preco WHERE produtos.id_produto = :id_produto";

                $atualizar = $connection->prepare($sql);
                $atualizar->bindValue(":id_produto", $id_produto);
                $atualizar->bindValue(":categoria", $categoria);
                $atualizar->bindValue(":nome", $nome);
                $atualizar->bindValue(":preco", $preco);
                
                return (($atualizar->execute()) ? true : false);
            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function editarPersonagemProduto($id_produto, $id_personagem){
            try {
                $connection = $this->conectar();
    
                $sql = "UPDATE personagem_produto SET personagem_produto.id_personagem_fk = :id_personagem WHERE personagem_produto.id_produto_fk = :id_produto";
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_produto", $id_produto);
                $cadastrar->bindValue(":id_personagem", $id_personagem);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagar($id_produto){
            try {
                $connection = $this->conectar();
    
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
        
        public function apagarImagensProduto($id_produto){
            try {
                $connection = $this->conectar();
    
                $sql = "DELETE FROM imagem_produto WHERE imagem_produto.id_produto_fk = :id_produto";
                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_produto", $id_produto);

                return (($apagar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagarTamanhosProduto($id_produto){
            try {
                $connection = $this->conectar();
    
                $sql = "DELETE FROM tamanho_produto WHERE tamanho_produto.id_produto_fk = :id_produto";
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