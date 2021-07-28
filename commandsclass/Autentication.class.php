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
            if ($this->email == "a.edu@gmail.com" && $this->senha == 123):
                return "Logado!";
            else:
                return "Dados Incorretos!";
            endif;
        }
    }
?>