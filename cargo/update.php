<?php
	session_start();
	include_once '../banco_de_dados/conexao.php';

	$id = $_SESSION['id'];

	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); 
	$salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_NUMBER_FLOAT);

	$queryUpdate = $link->query("UPDATE cargo SET nome = '$nome', salario = '$salario' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualização realizada com sucesso!</p>';
		header("Location: ../cargo/consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../cargo/consultas.php");
	}
