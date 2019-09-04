<?php
	session_start();
	include_once '../banco_de_dados/conexao.php';

	$id = $_SESSION['id'];

	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); 
	$telefone  = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS); 
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS); 
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

	$queryUpdate = $link->query("UPDATE cliente SET nome = '$nome', telefone = '$telefone', cpf = '$cpf', endereco = '$endereco' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualização realizada com sucesso!</p>';
		header("Location: ../cliente/consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../cliente/consultas.php");
	}
