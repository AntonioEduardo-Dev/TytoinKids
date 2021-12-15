<?php
    require_once "Connection.class.php";

    class Encomendas extends Connection{
        public function quantidadeEncomendas(){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM encomendas";
            
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->rowCount() : 0 );
                
            } catch (PDOException $e) {
                echo "Erro ao listar quantidade: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarEncomendas(){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM encomendas";
            
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
                
            } catch (PDOException $e) {
                echo "Erro ao listar quantidade: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarEncomendasId($id_encomenda){
            try {
                $connection = $this->conectar();

                $sql = "SELECT encomendas.id_encomenda, encomendas.quantidade, encomendas.data_hora, usuarios.nome, 
                        usuarios.email, usuarios.tipo_usuario, produtos.id_produto, produtos.nome_produto, 
                        produtos.preco_produto, imagens_produto.imagem_produto, 
                        personagem_produto.id_personagem_produto, personagens.personagem, tamanho_produto.id_tamanho_produto, tamanho_produto.id_tamanho_fk, tamanhos.tamanho 
                        FROM encomendas 
                        INNER JOIN usuarios 
                        ON encomendas.id_usuario_fk = usuarios.id_usuario 
                        INNER JOIN produtos 
                        ON encomendas.id_produto_fk = produtos.id_produto 
                        INNER JOIN personagem_produto 
                        ON encomendas.id_personagem_produto_fk = personagem_produto.id_personagem_produto 
                        INNER JOIN tamanho_produto 
                        ON encomendas.id_tamanho_produto_fk = tamanho_produto.id_tamanho_produto 
                        INNER JOIN tamanhos 
                        ON tamanho_produto.id_tamanho_fk = tamanhos.id_tamanho 
                        INNER JOIN imagens_produto 
                        ON imagens_produto.id_produto_fk = produtos.id_produto 
                        INNER JOIN personagens 
                        ON personagem_produto.id_personagem_fk = personagens.id_personagem 
                        WHERE id_encomenda = :id_encomenda";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_encomenda", $id_encomenda);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : false );
                
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarEncomendas($id_usuario_fk, $id_produto_fk, $id_personagem_produto_fk, $id_tamanho_produto_fk, $quantidade, $data_hora){
            try {
                $connection = $this->conectar();
    
                $sql = "INSERT INTO encomendas VALUES (NULL, :id_usuario_fk, :id_produto_fk, :id_personagem_produto_fk, :id_tamanho_produto_fk, :quantidade, :data_hora, :status)";
            
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":id_produto_fk", $id_produto_fk);
                $cadastrar->bindValue(":id_personagem_produto_fk", $id_personagem_produto_fk);
                $cadastrar->bindValue(":id_tamanho_produto_fk", $id_tamanho_produto_fk);
                $cadastrar->bindValue(":quantidade", $quantidade);
                $cadastrar->bindValue(":data_hora", $data_hora);
                $cadastrar->bindValue(":status", "pendente");

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editarEncomendas($id_encomenda, $id_produto_fk, $id_personagem_produto_fk, $id_tamanho_produto_fk, $quantidade, $data_hora){
            try {
                $connection = $this->conectar();
                
                $sql = "UPDATE encomendas SET id_produto_fk = :, id_personagem_produto_fk = :id_personagem_produto_fk, id_tamanho_produto_fk = :id_tamanho_produto_fk, quantidade= :quantidade, data_hora = :data_hora WHERE encomendas.id_encomenda = :id_encomenda";

                $editar = $connection->prepare($sql);
                $editar->bindValue(":id_encomenda", $id_encomenda);
                $editar->bindValue(":id_produto_fk", $id_produto_fk);
                $editar->bindValue(":id_personagem_produto_fk", $id_personagem_produto_fk);
                $editar->bindValue(":id_tamanho_produto_fk", $id_tamanho_produto_fk);
                $editar->bindValue(":quantidade", $quantidade);
                $editar->bindValue(":data_hora", $data_hora);

                return (($editar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function atualizarStatusEncomenda($id_encomenda, $status){
            try {
                $connection = $this->conectar();
                
                $sql = "UPDATE encomendas SET status = :status WHERE encomendas.id_encomenda = :id_encomenda";

                $editar = $connection->prepare($sql);
                $editar->bindValue(":id_encomenda", $id_encomenda);
                $editar->bindValue(":status", $status);

                return (($editar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagarEncomendas($id_encomenda){
            try {
                $connection = $this->conectar();

                $sql = "DELETE FROM encomendas WHERE encomendas.id_encomenda = :id_encomenda";

                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_encomenda", $id_encomenda);

                return (($apagar->execute()) ? true : false);
    
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>