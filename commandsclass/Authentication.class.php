<?php
    require_once "Connection.class.php";
    
    class Authentication{
        private $email;
        private $senha;

        public function __construct($email,$senha){
            $this->setEmail($email);
            $this->senha = $senha;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setEmail($e){
            $email = filter_var($e, FILTER_VALIDATE_EMAIL);
            $this->email = $email;
        }

        public function setSenha($s){
            $this->senha = $s;
        }
        
        public function validar(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $email = $this->email;
                $senha = $this->senha;

                $sql = "SELECT usuarios.id_usuario, usuarios.email, usuarios.nome, usuarios.status, usuarios.tipo_usuario, usuarios.primeiro_acesso FROM usuarios WHERE usuarios.email = :email AND usuarios.senha = :senha LIMIT 1";

                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":email", $email);
                $consulta->bindValue(":senha", $senha);
                
                return ($consulta->execute() && $consulta->rowCount() > 0) ? $consulta->fetchAll() : false;
                // return ($consulta->execute() && $consulta->rowCount() > 0) ? $consulta->fetch($connection::FETCH_ASSOC) : false;
            } catch (PDOException $e) {
                echo "Erro de validação: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>