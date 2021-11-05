<?php
    require_once "Connection.class.php";

    class Categorias{
        public function listarCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM categorias";
            
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listarSelectCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM categorias LIMIT 10";
            
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function quantidadeCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM categorias";
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->rowCount() : 0 );
                
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrar($nome){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO categorias(id_categoria, nome_categoria) VALUES (NULL, :nome)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":nome", $nome);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagarCategorias($id_categoria){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
                
                $sql = "DELETE FROM categorias WHERE categorias.id_categoria = :id_categoria";
                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_categoria", $id_categoria);

                return (($apagar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>