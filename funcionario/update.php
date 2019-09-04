<?php
	session_start();
	include_once '../banco_de_dados/conexao.php';

	$id = $_SESSION['id'];

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); //não aceitar caracteres especiais
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
	$ano_adimissao = filter_input(INPUT_POST, 'ano_adimissao', FILTER_SANITIZE_SPECIAL_CHARS);
	$cargo_id = filter_input(INPUT_POST, 'cargo_id', FILTER_SANITIZE_SPECIAL_CHARS);

	$queryUpdate = $link->query("UPDATE funcionario SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', ano_adimissao = '$ano_adimissao', cargo_id = '$cargo_id' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualiza��o realizada com sucesso!</p>';
		header("Location: ../funcionario/consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../funcionario/consultas.php");
	}
