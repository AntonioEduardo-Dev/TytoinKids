<?php
    require_once "Connection.class.php";
    
    class Contato{
        private $email;
        private $nome;
        private $fone;
        private $mensagem;

        public function __construct($email, $nome, $fone, $mensagem){
            $this->setEmail($email);
            $this->nome = $nome;
            $this->fone = $fone;
            $this->mensagem = $mensagem;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getNome(){
            return $this->nome;
        }
        
        public function getFone(){
            return $this->fone;
        }

        public function getMensagem(){
            return $this->mensagem;
        }

        public function setEmail($e){
            $email = filter_var($e, FILTER_VALIDATE_EMAIL);
            $this->email = $email;
        }

        public function setNome($s){
            $this->nome = $s;
        }

        public function setFone($f){
            $this->fone = $f;
        }

        public function setMensagem($m){
            $this->mensagem = $m;
        }
        
        public function cadastrarDuvida(){
            try {
                $objConexao = new Connection();
                $connection = $objConexao->conectar();

                $email      = $this->email;
                $nome       = $this->nome;
                $fone       = $this->fone;
                $mensagem   = $this->mensagem;

                $sql = "INSERT INTO duvidas VALUES (NULL, :nome, :email, :fone, :mensagem)";

                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":email", $email);
                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":fone", $fone);
                $consulta->bindValue(":mensagem", $mensagem);
                
                return ($consulta->execute() && $consulta->rowCount() > 0) ? true : false;

            } catch (PDOException $e) {
                echo "Erro de cadastro de dúvida: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }