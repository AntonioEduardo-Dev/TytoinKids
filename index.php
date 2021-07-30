<?php
	session_start();
    require_once "commandscontrol/Manutencao.php";
	$validManutencao = getStatus();
	$user = [
		"nome" => "Antonio Eduardo",
		"status" => "Admin" // "Admin"
	];
	$_SESSION["user"] = $user;

	/* INDEX REDIRECIONAMENTO DE PÁGINAS */
	if ($validManutencao && $_SESSION["user"]["status"] != "Admin"):
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
			if(isset($URL[3])):
				require_once("commandview/404.php");
			else:
				require_once("commandview/" . $URL[2] . ".php");
			endif;
		elseif(is_dir("commandview/" . $URL[2])):
			if (isset($URL[2]) && isset($URL[3]) && file_exists("commandview/" . $URL[2] . "/" . $URL[3] . ".php") && $_SESSION["user"]["status"] == "Admin"):
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