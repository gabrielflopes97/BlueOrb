<?php
	class Controle {

		function Conectar() { // hostinger
			$con = mysql_connect("mysql.hostinger.com.br","u641531331_boss","boss0123456789") or die("Erro ao conectar. Linha #5");
			mysql_select_db("u641531331_boss");
		}

		// function Conectar() { // localhost
		// 	$con = mysql_connect("localhost","root","") or die("Erro ao conectar. Linha #10");
		// 	mysql_select_db("blueorb-ss");
		// }		

		public $id;

		function BuscarPerfil($id) {
			$this->id=$id;

			$query = "SELECT * FROM usuario WHERE id_user = '".$id."'";
			$r = mysql_query($query) or die("Erro ao buscar usuario. Linha #20");
			while ($linha = mysql_fetch_assoc($r)) {
				$_SESSION['login'] = $linha['login'];
				$_SESSION['senha'] = $linha['senha'];
				$_SESSION['nome'] = $linha['nome'];
				$_SESSION['id'] = $linha['id_user'];
			}
		}

		public $login;
		public $senha;
		public $nome;

		function AttPerfil($login, $senha, $nome) {
			$this->login=$login;
			$this->senha=$senha;
			$this->nome=$nome;
			$id = $_SESSION['id'];

			$query = "UPDATE usuario us SET 
					  us.login = '".$login."',
					  us.nome = '".$nome."',
					  us.senha = '".$senha."'
					  WHERE us.id_user = '".$id."'";
			mysql_query($query);

			header("Location: portal.php");
		}

		function BuscarProjetos() {
			$query = "SELECT * FROM projeto";
		    $r = mysql_query($query);
		    
		    while ($linha = mysql_fetch_assoc($r)) {
		    	echo '<a href="'.$linha["link"].'">';
		    	echo '	<li onmouseover="chamarAtencao(this)" onmouseout="tirarAtencao(this)">';
		    	echo '		<h1>'.$linha["nome"].'</h1>';
		    	echo '		<img src="../img/projetos/'.$linha["foto"].'" />';
		    	echo '		<br /><span>Visitar</span>';
		    	echo '		<br /><a class="del" href="delProjeto.php?id='.$linha['id_projeto'].'">X</a>';
		    	echo '	</li>';
		    	echo '</a>';
		    }
		}

		public $link;
		public $foto;

		function addProjeto($nome, $link, $foto) {
			$this->nome=$nome;
			$this->link=$link;
			$this->foto=$foto;

			$query = "INSERT INTO projeto(nome,link,foto) 
						VALUES ('".$nome."', '".$link."', '".$foto."')";
			mysql_query($query);

			header("Location: addProjeto.php");
		}

		function BuscarMembros() {
			$query = "SELECT * FROM equipe";
		    $r = mysql_query($query);
		    
		    while ($linha = mysql_fetch_assoc($r)) {
		    	echo '<a href="'.$linha["link"].'">';
		    	echo '	<li onmouseover="chamarAtencao(this)" onmouseout="tirarAtencao(this)">';
		    	echo '		<h1>'.$linha["nome"].'</h1>';
		    	echo '		<p>'.$linha["cargo"].'</p>';
		    	echo '		<img src="../img/equipe/'.$linha["foto"].'" />';
		    	echo '		<br /><span>Portfolio</span>';
		    	echo '		<br /><a class="del" href="delMembro.php?id='.$linha['id_membro'].'">X</a>';
		    	echo '	</li>';
		    	echo '</a>';
		    }
		}

		public $cargo;

		function addMembro($nome, $cargo, $link, $foto) {
			$this->nome=$nome;
			$this->cargo=$cargo;
			$this->link=$link;
			$this->foto=$foto;

			$query = "INSERT INTO equipe(nome,cargo,link,foto) 
						VALUES ('".$nome."', '".$cargo."', '".$link."', '".$foto."')";
			mysql_query($query);

			header("Location: addMembro.php");
		}

	}
?>