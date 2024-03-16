<?php
	$id = $_REQUEST['id'];
	$nome = $_REQUEST['nome'];
	$username = 'user';
	$password = 'password';
	$server = '127.0.0.1';
	$dbname = 'varzea';
	
	$conexao = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

	$id = $conexao->prepare("SELECT id FROM time WHERE nome = :nome");
	
	$id->bindParam(":nome", $nome);
	
	$id->execute();

	$update = $conexao->prepare("UPDATE time SET nome = :nome WHERE id = :id ");

	$update->bindParam(":nome", $nome);
	$update->bindParam(":id", $id);

	$update->execute();
	$resultado = $update->fetch(PDO::FETCH_ASSOC);
	if ( $resultado ) {
		header("Location: http://localhost/VarzeaCup/php/listarTime.php");
	} else {
		print "erro";
		header("Location: http://localhost/VarzeaCup/html/cadastroTime.html");
	}
?>