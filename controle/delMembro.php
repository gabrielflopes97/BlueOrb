<?php
	$id = $_GET['id'];
	include "classe/controle.php";
	$controle = new Controle();
	$controle->Conectar();
	$query = "DELETE FROM equipe WHERE id_membro = ".$id;
	mysql_query($query);
	header("Location: addMembro.php");
?>