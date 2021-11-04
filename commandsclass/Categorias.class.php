<?php
    require_once "Connection.class.php";

    class Categorias{
        public function listarCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM categorias";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if($vl > 0):
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
        
        public function listarSelectCategorias(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "SELECT * FROM categorias LIMIT 10";
            
                $consulta = $connection->prepare($sql);
                $consulta->execute();

                $vl = $consulta->rowCount();

                if($vl > 0):
                    $dados = $consulta->fetchAll();
                    echo '<option value="0" selected style="display: none;">Categoria do produto*</option>';
                    foreach ($dados as $indice => $dado) {
                        echo '<option value="'.$dado['id_categoria'].'">'.$dado['nome_categoria'].'</option>';
                    }
                else:
                    echo '<option value="0" selected style="display: none;">Erro, Cadastre uma categoria no sistema!</option>';
                endif;

            } catch (PDOException $e) {
                echo "Erro de listar: " . $e->getMessage();
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
                $consulta->execute();

                $vl = $consulta->rowCount();

                return $vl;
            } catch (PDOException $e) {
                echo "Erro de listar: " . $e->getMessage();
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

        public function apagarCategorias($id_categoria){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();
                
                $sql = "DELETE FROM categorias WHERE categorias.id_categoria = :id_categoria";
                $apagar = $connection->prepare($sql);
                $apagar->bindValue(":id_categoria", $id_categoria);

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