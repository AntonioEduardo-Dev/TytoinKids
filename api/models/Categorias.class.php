<?php
    require_once "Connection.class.php";

    class Categorias extends Connection{
        public function listarCategorias(){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM categorias";
            
                $consulta = $connection->prepare($sql);
                
                return (($consulta->execute() && $consulta->rowCount() > 0)? $consulta->fetchAll($connection::FETCH_ASSOC) : "" );
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarCategoriaId($id_categoria){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM categorias WHERE categorias.id_categoria = :id_categoria";
            
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_categoria", $id_categoria);
                
                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : false );
                
            } catch (PDOException $e) {
                echo "Erro ao listar quantidade: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listarSelectCategorias($status){
            try {
                $connection = $this->conectar();

                $sql = "SELECT DISTINCT(categorias.id_categoria), categorias.nome_categoria 
                        FROM categorias ";
                        
                if (isset($status) && $status != 1) {
                    $sql .= "INNER JOIN produtos ON categorias.id_categoria = produtos.id_categoria_fk ";    
                }

                $sql .= "ORDER BY categorias.id_categoria";

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
                $connection = $this->conectar();

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
                $connection = $this->conectar();

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
                $connection = $this->conectar();
                
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

        public function editarCategoria($id_categoria, $categoria){
            try {
                $connection = $this->conectar();
                
                $sql = "UPDATE categorias SET nome_categoria = :categoria WHERE categorias.id_categoria = :id_categoria";
                $editar = $connection->prepare($sql);
                $editar->bindValue(":id_categoria", $id_categoria);
                $editar->bindValue(":categoria", $categoria);

                return (($editar->execute()) ? true : false);
                
            } catch (PDOException $e) {
                echo "Erro ao editar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>