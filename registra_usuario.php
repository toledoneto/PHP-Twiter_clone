<?php
	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	// md5 é uma criptografia de 32 char
	$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "INSERT INTO USUARIOS(usuario, email, senha) VALUES ('$usuario','$email','$senha') ";

	if (mysqli_query($link, $sql)) {
		echo "usuário cadastrado com sucesso!";
	} else {
		echo "erro ao cadastrar o usuario!";
	}

?>