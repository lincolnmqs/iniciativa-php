<?php
	include_once '../banco_de_dados/conexao.php';

	session_start();
	
	echo $idcliente = $_POST['cliente'];
	echo $idfuncionario = $_POST['funcionario'];
	echo $produtos = filter_input(INPUT_POST, 'produtos', FILTER_VALIDATE_EMAIL);
	echo $valor = filter_input(INPUT_POST, 'valortotal', FILTER_VALIDATE_EMAIL);
	
	/*vardump($_POST);
	$cadvenda = $link->query("insert into venda values ('','".$valor."','".$idcleinte."','".$idfuncionario."')"); 
	 
	echo "insert into venda values ('','".$valor."','".$idcleinte."','".$idfuncionario."')";
	$affected_rows = mysqli_affected_rows($link);
	
	if($affected_rows > 0) {
		
		$_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
	
		$$idvenda = $link->insert_id;
	
		foreach($produtos as $idMaquina){
			$queryInsert = $link->query("insert into item_venda values('', '". $idvenda."', '".$idMaquina."')'");
		}
	}

	else $_SESSION['msg'] = '<p class="center red_text">Erro à Cadastrar!</p>';
	
	
	echo $_SESSION['msg'];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*$querySelect = $link->query('select email from cliente');

	$array_emails = array();

	while($emails = $querySelect->fetch_assoc()){
		$emails_existentes = $emails['email'];
		array_push($array_emails, $emails_existentes);
	}

	if(in_array($email, $array_emails)){
		$_SESSION['msg'] = '<p class="center red-text">já existe um usuário cadastrado com esse E-mail: ' . $email .'</p>';
		header('Location:../');
	}
	else {
		$queryInsert = $link->query('insert into cliente values("", "' . $nome. '", "' . $email. '", "' . $telefone. '")');

		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0) $_SESSION['msg'] = '<p class="center green-text">Cadastro realizado com sucesso!</p>';
		else $_SESSION['msg'] = '<p class="center red_text">Erro à Cadastrar!</p>';
	}

	

	$dados = $_POST['dados'];
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