<?php 
	$nome = $_REQUEST['nome'];
	$vitorias = $_REQUEST['vitorias'];
	$empates = $_REQUEST['empates'];
	$derrotas = $_REQUEST['derrotas'];
	$username = 'user';
	$password = 'password';
	$server = '127.0.0.1';
	$dbname = 'varzea';

	$conexao = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

	$resultado = $conexao->prepare("INSERT INTO time VALUES (null, :nome, :vitorias, :empates, :derrotas)");

	$resultado->bindParam(":nome", $nome);
	$resultado->bindParam(":vitorias", $vitorias);
	$resultado->bindParam(":empates", $empates);
	$resultado->bindParam(":derrotas", $derrotas);

	$resultado->execute();
	if ( $resultado ) {
		header("Location: http://localhost/VarzeaCup/php/listarTime.php");
	} else {
		print "erro";
		header("Location: http://localhost/VarzeaCup/html/cadastroTime.html");
	}
?>