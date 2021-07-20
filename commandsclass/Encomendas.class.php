<?php
    require_once "Connection.class.php";

    class Encomendas{
        public function quantidadeEncomendas(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();

            try {
                $sql = "SELECT * FROM encomendas";
            
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
        public function cadastrarEncomendas(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
        public function editarEncomendas(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
        public function apagarEncomendas(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
    }
?>