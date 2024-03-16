<?php
	$id = $_REQUEST['id'];
	$username = 'user';
	$password = 'password';
	$server = '127.0.0.1';
	$dbname = 'varzea';
	$conexao = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
	
	$resultado = $conexao->prepare("DELETE FROM time WHERE id = :id ;");
	$resultado->bindParam(":id", $id);

	$resultado->execute();
	if ( $resultado ) {
		header("Location: http://localhost/VarzeaCup/php/listarTime.php");
		exit();
	} else {
		print "<script>alert('Erro.');</script>";
		print "<script>history.back();</script>";
		exit();
	}