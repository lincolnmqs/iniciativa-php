<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$valor    = $_POST['valor'];
	$tipo     = $_POST['tipo'];
	$maquinas = $_POST['maquinas'];
	$pecas    = $_POST['pecas'];
	
	//echo $nome . '<br />' . $valor . '<br />' . $tipo . '<br />';
	//var_dump($maquinas);
	$queryInsert = $link->query('insert into produto values(default, "' . $nome. '", ' . $valor. ', "' . $tipo. '")');

	$affected_rows = mysqli_affected_rows($link);

	if($affected_rows > 0) {
		$_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
		
		$idProduto = $link->insert_id;
		
		foreach($maquinas as $idMaquina){
			$queryInsert = $link->query('insert into produto_maquina values("' . $idProduto. '", "' . $idMaquina. '")');
		}
		
		foreach($pecas as $idPeca){
			$queryInsert = $link->query('insert into produto_peca values("' . $idProduto. '", "' . $idPeca. '")');
		}
	}
	else $_SESSION['msg'] = '<p class="center red_text">Erro à Cadastrar!</p>';

	header('Location:../produto/produto.php');

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