<?php
    require_once "Connection.class.php";

    class Manutencao{
        public function validar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            
            $sql = "SELECT * FROM manutencao WHERE id_manutencao = 1";
            
            $consulta = $connection->prepare($sql);
            $consulta->execute();

            $vl = $consulta->rowCount();
            
            if($vl > 0):
                $dados = $consulta->fetchAll();
                
                $valStatus = intval($dados[0]["status"]);
                
                if($valStatus === 1):
                    $status = true;
                else:
                    $status = false;
                endif;

            else:
                $status = false;
            endif;

            return $status;
        }

        public function alterar($statusManutencao){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "UPDATE manutencao SET status = :statusManutencao WHERE manutencao.id_manutencao = 1";
                
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":statusManutencao", $statusManutencao);
                
                return ($consulta->execute()) ? true : false;
            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>