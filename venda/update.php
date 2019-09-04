<?php
	session_start();
	include_once 'conexao.php';

	$id = $_SESSION['id'];

	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); 
	$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

	$queryUpdate = $link->query("UPDATE cliente SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualização realizada com sucesso!</p>';
		header("Location: ../consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../consultas.php");
	}
