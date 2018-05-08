<?php
	
	// evita que exista acesso direto às pág colocando o html correspondente no final da url.
	// deve-se inicar a seção antes de qquer saída para o user (echo, var_dump etc)
	session_start();

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = mcd5($_POST['senha']);

	$sql = "SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	// o retorno é:
	//		false: caso haja erro na consulta, e apenas erros;
	//		resource: um cnj de dados em forma de array do resultado da querry. Retorna NULL caso não haja correspondência
	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if (isset($dados_usuario['usuario'])) {
				
				$_SESSION['usuario'] = $dados_usuario['usuario'];
				$_SESSION['email'] = $dados_usuario['email'];

				header("Location: home.php");
		} else {
			header("Location: index.php?erro=1");

		}
	} else {
		echo "Erro na busca ao BD, favor contactar o admin";
	}

?>