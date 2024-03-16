<?php
	$username = 'user';
	$password = 'password';
	$server = '127.0.0.1';
	$dbname = 'varzea';

	$conexao = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
	
	$resultado = $conexao->prepare("SELECT * FROM pontos ORDER BY 3*(vitorias)+empates+derrotas DESC;");

	$resultado->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VarzeaCup</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
	require 'menu.php';
?>
	<section class="container">
		<h1 class="titulo-principal">Listagem de Times</h1>
			<table border="1">
				<tr>
					<td>Pontos</td>
					<td>Nome</td>
					<td>Editar</td>
					<td>Excluir</td>
				</tr>
<?php
	foreach ( $resultado as $tupla ) {
?>
			<tr>
				<td><?php print $tupla['3*(vitorias)+empates+derrotas']; ?></td>
				<td><?php print $tupla['nome']; ?></td>
				<td><a href="../html/editarTime.html?id=<?php print $tupla['id']; ?>"> X </a></td>
				<td><a href="deletar_time.php?id=<?php print $tupla['id']; ?>"> X </a></td>
			</tr>
<?php
	}
?>
		</table>
	</body>
</html>
