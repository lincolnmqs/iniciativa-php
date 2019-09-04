<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

	$querySelect = $link->query('SELECT cpf FROM cliente');

	$array_cpfs = array();

	while($cpfs = $querySelect->fetch_assoc()){
		$cpfs_existentes = $cpfs['cpf'];
		array_push($array_cpfs, $cpfs_existentes);
	}

	if(in_array($cpf, $array_cpfs)){
		$_SESSION['msg'] = '<p class="center red-text">já existe um usuário cadastrado com esse CPF: ' . $cpf .'</p>';
		header('Location:../');
	}
	else {
		$queryInsert = $link->query('insert into cliente values(default, "' . $nome . '", "' . $telefone . '", "' . $cpf . '", "' . $endereco . '")');

		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0) $_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
		else $_SESSION['msg'] = '<p class="center red_text">Erro à Cadastrar!</p>';
	}

	header('Location:../');

	/*$dados = $_POST['dados'];
	$null  = false;

	foreach ($dados as $value) {
		if(empty($value)){
			$null = true;
			break;
		}
	}

	$sql = 'INSERT INTO cliente VALUES( "","' .
		$dados['nome'] . '", "' .
		$dados['email'] . '", "' .
		$dados['telefone'] . '")'
	;
	echo $sql;

	if(mysqli_query($link, $sql) === TRUE) echo '<br />Ok';
	else echo '<br />erro';*/

	echo '<br /><br /><a href="../index.php">Voltar</a>';