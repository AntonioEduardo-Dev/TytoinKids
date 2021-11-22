<?php
    require_once "Connection.class.php";

    class Usuarios {
        public function cadastrar($email, $nome, $senha, $cpf){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO usuarios VALUES (NULL, :email, :nome, :senha, :cpf, :status, :tipo_usuario, :primeiro_acesso)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":email", $email);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":senha", $senha);
                $cadastrar->bindValue(":cpf", $cpf);
                $cadastrar->bindValue(":status", 1);
                $cadastrar->bindValue(":tipo_usuario", "user");
                $cadastrar->bindValue(":primeiro_acesso", 1);

                return (($cadastrar->execute()) ? $connection->lastInsertId() : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarContato($id_usuario_fk, $fone, $whatsapp, $insta){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO usuario_contato VALUES (NULL, :id_usuario_fk, :fone, :whatsapp, :insta)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":fone", $fone);
                $cadastrar->bindValue(":whatsapp", $whatsapp);
                $cadastrar->bindValue(":insta", $insta);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarEndereco($id_usuario_fk, $id_cidade_fk, $cep, $endereco, $bairro, $complemento, $numero){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $sql = "INSERT INTO usuario_endereco VALUES (NULL, :id_usuario_fk, :id_cidade_fk, :cep, :endereco, :bairro, :complemento, :numero)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":id_cidade_fk", NULL);
                $cadastrar->bindValue(":cep", $cep);
                $cadastrar->bindValue(":endereco", $endereco);
                $cadastrar->bindValue(":bairro", $bairro);
                $cadastrar->bindValue(":complemento", $complemento);
                $cadastrar->bindValue(":numero", $numero);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>