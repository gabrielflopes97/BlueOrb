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
						if ($_POST['txtLogin']) {
							$controle->AttPerfil($_POST['txtLogin'], sha1($_POST['txtSenha']), $_POST['txtNome']);
							echo "<hr />";
						}
					?>

					<form action="attPerfil.php" method="post">
						Login: <br />
						<input type="text" name="txtLogin" value="<?php echo $_SESSION['login']; ?>" /><br />
						 Senha: <br />
						<input type="password" name="txtSenha" value="<?php echo $_SESSION['senha']; ?>" required /><br />
						Nome: <br />
						<input type="text" name="txtNome" value="<?php echo $_SESSION['nome']; ?>" /><br /> 
						
						<input type="submit" value="Atualizar" />
					</form>
				</div>
			</div>
		</body>
	</html>

<?php
	}
?>