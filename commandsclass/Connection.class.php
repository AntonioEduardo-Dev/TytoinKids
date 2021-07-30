<?php
    class Connection{
		function conectar(){

			$host= "mysql:host=localhost;dbname=tytoin_kids";
			$user= "root";
			$pass= "";

			try {
				$pdo= new PDO($host, $user, $pass);
				return $pdo;
			} catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }

		}
	}
?>