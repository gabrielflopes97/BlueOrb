<!DOCTYPE html>

<?php
	error_reporting(0);
	header("Content-Type: text/html; charset=UTF-8", true);
	include "classe/banco.php";
	$banco = new Banco();
	$banco->Conectar();
?>

<html lang="pt/br">

	<head>
		<title>Blue Orb Safe Solutions &copy; <?php echo date("Y"); ?></title>
		<meta http-equiv="Content Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="SHORTCUT ICON" href="img/logo.png">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
		<script type="text/javascript" src="script/main.js"></script>
	</head>

	<body>
		<div class="black-overlay"></div>

		<div id="header"> <!-- CABEÇALHO -->

			<div class="esq30"><img src="http://localhost:8080/BlueOrb/img/logo.png" style="width:7%;height:7%;"><div style="margin-top: -35px;margin-left: 215px;">Blue Orb Safe Solutions &copy;</div></div>
			<div class="dir70">
				<form action="index.php" method="post">
		    		<input id="txtNome" class="formLoginUp" type="text" placeholder="Login" name="txtLogin" required />
		    		<input id="txtSenha" class="formLoginUp" type="password" placeholder="Senha" name="txtSenha"  required />
		    		<input id="btnLogin" class="formLoginUp btn" type="submit" value="Login" />
		    	</form>
			</div>
		</div>

		<div class="panel panel-one"> <!-- PRIMEIRA PAGINA -->
		    <div class="panel-inner">
		    	<div id="divLogin">
		    		<img src="img/logo.png" class="logo" /><br />
		    		<hr width="40%" style="border: 1px solid #0C78CF" />
		    		<form action="index.php" method="post">
		    			<input id="txtNome" class="formLogin" type="text" placeholder="Login" name="txtLogin"  required /><br />
		    			<input id="txtSenha" class="formLogin" type="password" placeholder="Senha" name="txtSenha"  required /><br />
		    			<input id="btnLogin" class="formLogin btn" type="submit" value="Login" />
		    		</form>
		    		<hr width="40%" style="border: 1px solid #0C78CF" />
		    		<h6>Painel Administrativo - Acesso Restrito</h6>
		    	</div>

		    	<?php
		    		if ($_POST['txtLogin'] && $_POST['txtSenha']) {
		    			echo '<div id="mensagem" onclick="escondeMensagem()">';
		    			$banco->Logar($_POST['txtLogin'], $_POST['txtSenha']);
		    			echo '</div>';
		    		}
		    	?>

		    </div>
		</div>

		<div class="panel panel-two"> <!-- SEGUNDA PAGINA -->
		    <div class="panel-inner">
		    	<h2>Principais Projetos</h2>
		    	<hr width="10%" style="margin-top: -2%; border: solid 1px #000;" />
		    	<p style="color: #fff;">
		    		Alguns dos projetos já feitos pela Blue Orb Safe Solutions &copy;, junto a projetos próprios
		    		dos membros da empresa. A ideia de um desenvolvedor equivale a ideia da empresa.
		    	</p>

		    	<div class="limite">
		    		<ul class="lista">
			    		<?php
			    			$banco->BuscarProjetos();
			    		?>
			    	</ul>
		    	</div>

		    </div>
		</div>

		<div class="panel panel-three"> <!-- TERCEIRA PAGINA -->
		    <div class="panel-inner">

		    	<h2 style="margin: 0;">A Equipe</h2>
		    	<hr width="10%" style="border: solid 1px #000;" />

		    	<div class="limite">
		    		<ul class="lista">
			    		<?php
		    				$banco->BuscarMembros();
		    			?>			    		
			    	</ul>
		    	</div>

		    </div>
		</div>

		<div class="panel panel-four"> <!-- QUARTA PAGINA -->
		    <div class="panel-inner">
		        
		        <h2 style="margin: 0;">Sobre a Blue Orb Solutions &copy;</h2>
		    	<hr width="10%" style="border: solid 1px #000;" />
		    	<p style="margin: 0;">

	A <i>Blue Orb Safe Solutions</i> (BOSS &copy;) surgiu de um sonho - assim como diversas outras empresas. 
Começou com dois membros, que já estavam atuando no mercado de trabalho, surgindo repentinamente com a ideia. 
Uma empresa representando a mão-de-obra jovem e qualificada, com novas ideias e novas <b>soluções</b> conforme
sua necessidade. O intuito é crescer cada vez mais, invadindo novas áreas - além das soluções WEB - e conquistar 
seu espaço no mercado de trabalho.
	Assim como a água, a <b>BOSS</b> se reinventa conforme a necessidade. Novas ideias, novas soluções, novas
tecnologias, tudo para chegar a forma mais rápida, prática, barata e <b>inteligente</b> para satisfazer a vontade 
de seus clientes.
		    	
		    	</p>

		    </div>
		</div>

		<div style="width:100px;height:100px;background-color:#ccc;">
			
		</div>
		<div class="panel panel-five"> <!-- QUINTA PAGINA -->
		    <div class="panel-inner">
		        <h2>Contato</h2>

		        <a href="https://www.facebook.com/blueorbsafasolutions"> <img src="img/icones/icFb.png" /> </a>
		        <a href="http://www.twitter.com/blueorb_"> <img src="img/icones/icTwitter.png" /> </a>
		        <a href="http://www.youtube.com/BlueOrbSafeSolutions"> <img src="img/icones/icYt.png" /> </a>
		        <a href="http://www.instagram.com/blueorbss"> <img src="img/icones/icInsta.png" /> </a>

		        <br />
		        <p>
			        (51) 9661-3589 - (51) 9470-2672 <br />
			        <b> blueorbsafesolutions@gmail.com </b> <br />
			        Porto Alegre - RS
		        </p>
		        <b>FAÇA JA SEU ORÇAMENTO GRATUITO -></b><a class="gambirex">CLIQUE AQUI</a>

		        <!-- O R Ç A M E N T O -->

		        <div class="gambirrex2"style="width:100px;height:100px;background-color:#000;display:none;">
		        	
		        </div>

				<img src="img\icones\voltarTopo.jpg" class="topo" style="float:right;width:70px;height:70px;bottom:0;margin-top:18%;">
		    </div>

		</div>

	</body>

</html>