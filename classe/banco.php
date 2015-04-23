<?php
	
	class Banco {

		function Conectar() { // hostinger
			$con = mysql_connect("mysql.hostinger.com.br","u641531331_boss","boss0123456789") or die("Erro ao conectar. Linha #5");
			mysql_select_db("u641531331_boss");
		}

		// function Conectar() { // localhost
		// 	$con = mysql_connect("localhost","root","") or die("Erro ao conectar. Linha #10");
		// 	mysql_select_db("blueorb-ss");
		// }

		public $login;
		public $senha;

		function Logar($login, $senha){
			$this->login=$login;
			$this->senha=$senha;

			$query = "SELECT id_user, nome FROM usuario WHERE login = '".$login."' AND senha = '".sha1($senha)."'";
			$r = mysql_query($query) or die("Erro na query de fazer login. Linha #23");

			if (mysql_num_rows($r) > 0) {
				session_start();
		    	session_name("blueorb-ss");
		    	$_SESSION['v'] = 1;
		    	$_SESSION['login'] = $login;
		    	while ($linha = mysql_fetch_assoc($r)) {
		    		$_SESSION['id'] = $linha["id_user"];
		    		$_SESSION['nome'] = $linha["nome"];
		    	}
		    	header("Location: controle/portal.php");
			}else{
				echo "Login/Senha inválida.";
			}
		}

		function BuscarProjetos() {
			$query = "SELECT * FROM projeto";
		    $r = mysql_query($query);
		    
		    while ($linha = mysql_fetch_assoc($r)) {
		    	echo '<a href="'.$linha["link"].'" target="_blank">';
		    	echo '	<li onmouseover="chamarAtencao(this)" onmouseout="tirarAtencao(this)">';
		    	echo '		<h1>'.$linha["nome"].'</h1>';
		    	echo '		<img src="img/projetos/'.$linha["foto"].'" />';
		    	echo '		<br /><span>Visitar</span>';
		    	echo '	</li>';
		    	echo '</a>';
		    }
		}

		function BuscarMembros() {
			$query = "SELECT * FROM equipe";
		    $r = mysql_query($query);
		    
		    while ($linha = mysql_fetch_assoc($r)) {
		    	echo '<a href="'.$linha["link"].'" target="_blank">';
		    	echo '	<li onmouseover="chamarAtencao(this)" onmouseout="tirarAtencao(this)">';
		    	echo '		<h1>'.$linha["nome"].'</h1>';
		    	echo '		<p>'.$linha["cargo"].'</p>';
		    	echo '		<img src="img/equipe/'.$linha["foto"].'" />';
		    	echo '		<br /><span>Portfolio</span>';
		    	echo '	</li>';
		    	echo '</a>';
		    }
		}

	}
?>