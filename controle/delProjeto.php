<?php
	$id = $_GET['id'];
	include "classe/controle.php";
	$controle = new Controle();
	$controle->Conectar();
	$query = "DELETE FROM projeto WHERE id_projeto = ".$id;
	mysql_query($query);
	header("Location: addProjeto.php");
?>