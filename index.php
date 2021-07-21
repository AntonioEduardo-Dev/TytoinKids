<?php
	/* FUNÇÕES INDEX */

	function require404(){
		require_once 'commandview/404.php';
	}
	
	function requireHome(){
		require_once 'commandview/home.php';
	}

	function ifExistFile(String $page){
		if (is_file($page)) {
			require_once $page;
		}else {
			require404();
		}
	}
	
	/* FIM FUNÇÕES INDEX */

	/* INDEX REDIRECIONAMENTO DE PÁGINAS */
    require_once "commandscontrol/Manutencao.php";
	
	$validManutencao = getStatus();

	if ($validManutencao) {
		require_once 'commandview/manutencao.php';
	}else{
		if (isset($_GET['url'])) {

			$url = array_filter(explode("/", $_GET['url']));
			$valid = strpos($url[0], ".php");
	
			if ( $valid !== false) {
				require404();
			}else{
				if (!isset($url[0]) || $url[0] === "index") {
					requireHome();
					
				} elseif($url[0] === "menu"){
					if (isset($url[1])) {
						$pagina = 'commandview/menu/'.$url[1].'.php';
						
						ifExistFile($pagina);
					}else{
						require404();
					}
	
				} elseif($url[0] === "cadastrar") {
					if (isset($url[1])) {
						$pagina = 'commandview/cadastrar/'.$url[1].'.php';
	
						ifExistFile($pagina);
					}else{
						require404();
					}
				}elseif($url[0] === "listar") {
					if (isset($url[1])) {
						$pagina = 'commandview/listar/'.$url[1].'.php';
	
						ifExistFile($pagina);
					}else{
						require404();
					}
	
				} else{
					$pagina = 'commandview/'.$url[0].'.php';
					
					ifExistFile($pagina);
				}
			}
		}else{
			requireHome();
		}
	}

	/* FIM INDEX REDIRECIONAMENTO DE PÁGINAS */
?>