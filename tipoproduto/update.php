<?php
	session_start();
	include_once '../banco_de_dados/conexao.php';

	$id = $_SESSION['id'];

	$descricao    = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS); 

	$queryUpdate = $link->query("UPDATE tipo_produto SET descricao = '$descricao' WHERE id = '$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Atualização realizada com sucesso!</p>';
		header("Location: ../tipoproduto/consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../tipoproduto/consultas.php");
	}
