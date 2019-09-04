<?php
	session_start();
	include_once '../banco_de_dados/conexao.php';

	$id = $_SESSION['id'];

	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); 
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS); 

	$queryUpdate = $link->query("UPDATE peca SET nome_peca = '$nome', valor_peca = '$valor' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualização realizada com sucesso!</p>';
		header("Location: ../peca/consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../peca/consultas.php");
	}
