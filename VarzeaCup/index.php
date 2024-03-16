<?php
    $username = 'user';
    $password = 'password';
    $server = '127.0.0.1';
    $dbname = 'varzea';

    $conexao = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

	$sql = $conexao->prepare("create table if not exists time ( id integer primary key auto_increment, nome varchar(20) unique not null, vitorias integer not null, empates integer not null, derrotas integer not null);");
	$sql->execute();
	header('Location: http://localhost/VarzeaCup/html/cadastroTime.html');
