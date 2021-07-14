<?php
	if (isset($_GET['url'])) {

		$url = array_filter(explode("/", $_GET['url']));
		$valid = strpos($url[0], ".php");

		if ( $valid !== false) {
			require_once 'commandview/404.php';
		}else{
			if (!isset($url[0]) || $url[0] === "index") {
				require_once 'commandview/home.php';

			} elseif($url[0] === "menu"){
				if (isset($url[1])) {
					$pagina = 'commandview/menu/'.$url[1].'.php';

					if (is_file($pagina)) {
						require_once $pagina;
					}else {
						require_once 'commandview/404.php';
					}
				}else{
					require_once 'commandview/404.php';
				}

			} elseif($url[0] === "create") {
				if (isset($url[1])) {
					$pagina = 'commandview/create/'.$url[1].'.php';

					if (is_file($pagina)) {
						require_once $pagina;
					}else {
						require_once 'commandview/404.php';
					}
				}else{
					require_once 'commandview/404.php';
				}
			}elseif($url[0] === "list") {
				if (isset($url[1])) {
					$pagina = 'commandview/list/'.$url[1].'.php';

					if (is_file($pagina)) {
						require_once $pagina;
					}else {
						require_once 'commandview/404.php';
					}
				}else{
					require_once 'commandview/404.php';
				}

			} else{
				$pagina = 'commandview/'.$url[0].'.php';
				
				if (is_file($pagina)) {
					require_once $pagina;
				}else {
					require_once 'commandview/404.php';
				}
			}
		}
	}else{
		require_once 'commandview/home.php';
	}
?>