<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
	$endereco= filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

	
	$queryInsert = $link->query('insert into fornecedor values(default, "' . $nome. '", "' . $cnpj. '", "' . $telefone. '", "' . $endereco. '")');

	$affected_rows = mysqli_affected_rows($link);

	if($affected_rows > 0) $_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
	else $_SESSION['msg'] = '<p class="center red_text">Erro ao Cadastrar!</p>';
	

	header('Location:../fornecedor/fornecedor.php');
	

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