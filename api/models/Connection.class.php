<?php
	require_once __DIR__ . '../../../client/views/config/config.php';

    class Connection{
		protected function conectar(){

			$host= "mysql:host=".DB_HOST.";dbname=".DB_NAME."";

			try {
				$pdo= new PDO($host, DB_USER, DB_PASSWORD);
				return $pdo;
			} catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }

		}
	}
?>