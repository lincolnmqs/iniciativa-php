<?php
	include_once 'conexao.php';

	session_start();
	
	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

	$querySelect = $link->query('select email from cliente');

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