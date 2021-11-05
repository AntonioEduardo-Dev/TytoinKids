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
        public function cadastrarEncomendas(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        public function editarEncomendas(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        public function apagarEncomendas(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
    
            } catch (PDOException $e) {
                echo "Erro ao apagar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>