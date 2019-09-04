<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);

	$querySelect = $link->query('SELECT nome_peca FROM peca');

	$array_nomes = array();

	while($nomes = $querySelect->fetch_assoc()){
		$nomes_existentes = $nomes['nome'];
		array_push($array_nomes, $nomes_existentes);
	}

	if(in_array($nome, $array_nomes)){
		$_SESSION['msg'] = '<p class="center red-text">já existe uma peca cadastrada com esse nome: ' . $nome .'</p>';
		header('Location:../');
	}
	else {
		$queryInsert = $link->query('insert into peca values(default, "' . $nome . '", "' . $valor . '")');

		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0) $_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
		else $_SESSION['msg'] = '<p class="center red_text">Erro à Cadastrar!</p>';
	}

	header('Location:../peca/');

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