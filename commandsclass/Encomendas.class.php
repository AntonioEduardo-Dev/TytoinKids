<?php
    require_once "Connection.class.php";

    class Encomendas{
        public function quantidadeEncomendas(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

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
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

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
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT encomendas.id_encomenda, encomendas.quantidade, encomendas.data_hora, usuarios.nome, 
                        usuarios.email, usuarios.tipo_usuario, produtos.id_produto, produtos.nome_produto, 
                        produtos.preco_produto, produtos.quatidade_disponivel, produtos.imagem_produto, 
                        cor_produto.id_cor_produto, cor_produto.cor, tamanho_produto.id_tamanho_produto, tamanho_produto.tamanho 
                        FROM encomendas INNER JOIN usuarios ON encomendas.id_usuario_fk = usuarios.id_usuario 
                        INNER JOIN produtos ON encomendas.id_produto_fk = produtos.id_produto 
                        INNER JOIN cor_produto ON encomendas.id_cor_produto_fk = cor_produto.id_cor_produto 
                        INNER JOIN tamanho_produto ON encomendas.id_tamanho_produto_fk = tamanho_produto.id_tamanho_produto 
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

        public function cadastrarEncomendas($id_usuario_fk, $id_produto_fk, $id_cor_produto_fk, $id_tamanho_produto_fk, $quantidade, $data_hora){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
                $sql = "INSERT INTO encomendas VALUES (NULL, :id_usuario_fk, :id_produto_fk, :id_cor_produto_fk, :id_tamanho_produto_fk, :quantidade, :data_hora)";
            
                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":id_produto_fk", $id_produto_fk);
                $cadastrar->bindValue(":id_cor_produto_fk", $id_cor_produto_fk);
                $cadastrar->bindValue(":id_tamanho_produto_fk", $id_tamanho_produto_fk);
                $cadastrar->bindValue(":quantidade", $quantidade);
                $cadastrar->bindValue(":data_hora", $data_hora);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function editarEncomendas($id_encomenda, $id_produto_fk, $id_cor_produto_fk, $id_tamanho_produto_fk, $quantidade, $data_hora){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
                
                $sql = "UPDATE encomendas SET id_produto_fk = :, id_cor_produto_fk = :id_cor_produto_fk, id_tamanho_produto_fk = :id_tamanho_produto_fk, quantidade= :quantidade, data_hora = :data_hora WHERE encomendas.id_encomenda = :id_encomenda";

                $editar = $connection->prepare($sql);
                $editar->bindValue(":id_encomenda", $id_encomenda);
                $editar->bindValue(":id_produto_fk", $id_produto_fk);
                $editar->bindValue(":id_cor_produto_fk", $id_cor_produto_fk);
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

        public function apagarEncomendas($id_encomenda){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

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