<?php
    require_once "commandscontrol/Manutencao.php";
	
	$validManutencao = getStatus();

	/* INDEX REDIRECIONAMENTO DE PÁGINAS */
	if ($validManutencao):
		require_once("commandview/manutencao.php");
	else:
		$REQUEST = filter_input(INPUT_SERVER, "REQUEST_URI");
		$INI = strpos($REQUEST,"?");

		if ($INI):
			$REQUEST = substr($REQUEST, 0, $INI);
		endif;
		
		$REQUEST_PAGINA = substr($REQUEST, 1);
		$URL = explode("/", $REQUEST_PAGINA);
		$URL[2] = (($URL[2] != "" && $URL[2] != "index" && $URL[2] != "index.php") ? $URL[2] : "home");
		
		if (file_exists("commandview/" . $URL[2] . ".php")):
			require_once("commandview/" . $URL[2] . ".php");
		elseif(is_dir("commandview/" . $URL[2])):
			if (isset($URL[2]) && isset($URL[3]) && file_exists("commandview/" . $URL[2] . "/" . $URL[3] . ".php")):
				require_once("commandview/" . $URL[2] . "/" . $URL[3] . ".php");
			else:
				require_once("commandview/404.php");
			endif;
		else:
			require_once("commandview/404.php");
		endif;
	endif;

	/* FIM INDEX REDIRECIONAMENTO DE PÁGINAS */
?>