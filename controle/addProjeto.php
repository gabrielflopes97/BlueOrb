<!DOCTYPE html>

<?php
	header("Content-Type: text/html; charset=UTF-8", true);
	error_reporting(0);
	session_start();
	session_name("blueorb-ss");
	include "classe/controle.php";
	$controle = new Controle();
	$controle->Conectar();

	// Se não estiver logado, não tem acesso a essa página
	if ($_SESSION['v'] != 1) {
		header("Location: index.php");
	}else{
?>

	<html lang="pt/br">
		<head>
			<title>Blue Orb Safe Solutions &copy; <?php echo date("Y"); ?></title>
			<meta http-equiv="Content Type" content="text/html; charset=UTF-8" />
	        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	        <link rel="SHORTCUT ICON" href="img/logo.png">

			<link rel="stylesheet" type="text/css" href="../css/controle.css" />
		</head>

		<body>
			<div id="container">
				<div id="menuEsq">
					<?php include "menu-controle.php"; ?>
				</div>

				<div id="content">
					<?php
						if ($_POST['txtNome']) {
							$arquivo_tmp = $_FILES['txtFoto']['tmp_name'];
							$nome = $_FILES['txtFoto']['name'];

							// Evitando que duplique as fotos
							$nomeFoto = $_FILES['txtFoto']['name'];
							$extensao = strrchr($nome, '.');
							$novoNome = md5(microtime()) . $extensao;

							// Escolhendo a raiz e enviando
							$destino = '../img/projetos/' . $novoNome;
							if (@move_uploaded_file($arquivo_tmp, $destino)) {
								$controle->addProjeto($_POST['txtNome'], $_POST['txtLink'], $novoNome);
							}
						}
					?>

					<form action="addProjeto.php" method="post" enctype="multipart/form-data">
						
						Nome: <br />
						<input type="text" name="txtNome" required /> <br />
						Link: <br />
						<input type="text" name="txtLink" value="http://www." required /> <br />
						Foto: <br />
						<input type="file" name="txtFoto" required /> <br />

						<input type="submit" value="Adicionar" />
					</form>

					<hr />

					<ul class="lista">
						<?php
							$controle->BuscarProjetos();
						?>
					</ul>

				</div>
			</div>
		</body>
	</html>

<?php
	}
?>