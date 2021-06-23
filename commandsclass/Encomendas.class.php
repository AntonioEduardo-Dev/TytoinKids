<?php
    require_once "Connection.class.php";
    
    $objConexao = new Connection();
    $connection = $objConexao->conectar();

    class Encomendas{
        public function cadastrar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
        public function listar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
        public function editar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
        public function apagar(){
            $objConexao = new Connection();
            $connection = $objConexao->conectar();
        }
    }
?>