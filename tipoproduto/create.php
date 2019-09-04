<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS); //nÃ£o aceitar caracteres especiais

	$querySelect = $link->query('SELECT descricao FROM tipo_produto');

	$array_nomes = array();

	while($nomes = $querySelect->fetch_assoc()){
		$nomes_existentes = $nomes['descricao'];
		array_push($array_nomes, $nomes_existentes);
	}

	if(in_array($descricao, $array_nomes)){
		$_SESSION['msg'] = '<p class="center red-text">jÃ¡ existe um tipo de produto cadastrado com essa descrição: ' . $descricao .'</p>';
		header('Location:../');
	}
	else {
		$queryInsert = $link->query('insert into peca values(default, "' . $descricao . '")');

		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0) $_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
		else $_SESSION['msg'] = '<p class="center red_text">Erro Ã  Cadastrar!</p>';
	}

	header('Location:../tipoproduto/');

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