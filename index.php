<?php
	session_start();
    require_once "api/controllers/Manutencao.php";
	$validManutencao = getStatus();
	
	if((empty($_SESSION["user"])))
	{
		$user = [
			"id"        => 0,
			"email"     => strtolower("convidado@convidado"),
			"nome"      => strtolower("convidado"),
			"status"    => 1,
			"tipo_user" => strtolower("convidado"),
			"acesso"    => 1
		];
		$_SESSION["user"] = $user;
	};

	/* INDEX REDIRECIONAMENTO DE PÁGINAS */
	if ($validManutencao && $_SESSION["user"]["tipo_user"] != "admin")
	{
		require_once("client/views/pages/manutencao.php");
	}
	else
	{
		$REQUEST = filter_input(INPUT_SERVER, "REQUEST_URI");
		$INI = strpos($REQUEST,"?");

		if ($INI)
		{
			$REQUEST = substr($REQUEST, 0, $INI);
		};
		
		$REQUEST_PAGINA = substr($REQUEST, 1);
		$URL = explode("/", $REQUEST_PAGINA);
		$URL[2] = (($URL[2] != "" && $URL[2] != "index" && $URL[2] != "index.php") ? $URL[2] : "home");
		
		if($URL[2] == "login" || $URL[2] == "cadastro" || $URL[2] == "sair")
		{
			if ($URL[2] == "sair") {
				unset($_SESSION["user"]);
				$URL[2] = "home";
			}else{
				if(isset($_SESSION["user"]) && $_SESSION["user"]["tipo_user"] != "convidado")
				{
					$URL[2] = "home";
				};
			}
		};
		
		if (file_exists("client/views/pages/" . $URL[2] . ".php"))
		{
			if(isset($URL[3]))
			{
				require_once("client/views/pages/404.php");
			}
			else
			{
				require_once("client/views/pages/" . $URL[2] . ".php");
			};
		}
		elseif(is_dir("client/views/" . $URL[2]))
		{	
			if (isset($URL[2]) && isset($URL[3]) && file_exists("client/views/" . $URL[2] . "/" . $URL[3] . ".php") && $_SESSION["user"]["tipo_user"] === "user" && ($URL[3] === "encomendas_usuario" || $URL[3] === "mensagens_usuario")) {
				require_once("client/views/" . $URL[2] . "/" . $URL[3] . ".php");
			}else{
				if (isset($URL[2]) && isset($URL[3]) && file_exists("client/views/" . $URL[2] . "/" . $URL[3] . ".php") && $_SESSION["user"]["tipo_user"] == "admin")
				{
					require_once("client/views/" . $URL[2] . "/" . $URL[3] . ".php");
				}
				else
				{
					require_once("client/views/pages/404.php");
				};
			}
		}
		else
		{
			require_once("client/views/pages/404.php");
		};
	};
	/* FIM INDEX REDIRECIONAMENTO DE PÁGINAS */
?>