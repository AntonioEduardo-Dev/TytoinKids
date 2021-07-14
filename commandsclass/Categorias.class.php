<?php
    require_once "Connection.class.php";

    class Categorias{
        public function listarCategorias(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "SELECT * FROM categorias WHERE 1";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if ($vl > 0) {
                    $dados = $consulta->fetchAll();
                    echo '<ul>
                            <li class="li active" data-filter="*">Todos</li>';
                    foreach ($dados as $indice => $dado) {
                        echo '
                        <li class="li" data-filter=".'.$dado['nome_categoria'].'">'.$dado['nome_categoria'].'</li>';
                    }
                    echo "</ul>";
                }
            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrar($nome){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {
                $sql = "INSERT INTO categorias(id_categoria, nome_categoria) VALUES (NULL, :nome)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":nome", $nome);

                if ($cadastrar->execute()) {
                    return true;
                }else{
                    return false;
                }

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function apagar($id_categoria){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
            try {

            } catch (PDOException $e) {
                echo "Erro de cadastrar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>