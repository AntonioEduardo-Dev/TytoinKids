<?php
	/* INDEX REDIRECIONAMENTO DE PÁGINAS */
	$REQUEST = filter_input(INPUT_SERVER, "REQUEST_URI");
	$INITE = strpos($REQUEST,"?");

	if ($INITE):
		$REQUEST = substr($REQUEST, 0, $INITE);
	endif;

	$REQUEST_PAGINA = substr($REQUEST, 1);
	$URL = explode("/", $REQUEST_PAGINA);
	$URL[0] = ($URL[0] != "" ? $URL[0] : "home");

	if (file_exists("TytoinKids/" . $URL[0] . ".php")):
		require_once("TytoinKids/" . $URL[0] . ".php");

	elseif(is_dir("TytoinKids/" . $URL[0])):
		if (isset($URL[1]) && file_exists("TytoinKids/" . $URL[0] . "/" . $URL[1] . ".php")):
			require_once("TytoinKids/" . $URL[0] . "/" . $URL[1] . ".php");

		else:
			require_once("TytoinKids/404.php");

		endif;

	else:
		require_once("TytoinKids/404.php");

	endif;

	/* FIM INDEX REDIRECIONAMENTO DE PÁGINAS */
?>