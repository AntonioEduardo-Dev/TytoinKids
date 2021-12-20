<?php
	include("../models/Connection.class.php");
	$msg = false;

	if (isset($_FILES['arquivo'])) {
		"arquivo.jpg";
		$ext = strtolower(substr($_FILES['arquivo']['name'], -4)); // get extension
		$novoNome = md5(time()).$ext; // set new name
		$dir = "assets/img/"; // set directory for uploading the file

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novoNome);
	}
?>

<h1>Envio de Imagens</h1>
<form action="uploadImagens.php" method="POST" enctype="multipart/form-data">
	Arquivo: <input type="file" name="arquivo" accept="image/*" required></input>
	<input type="submit" value="salvar"></input>
</form>