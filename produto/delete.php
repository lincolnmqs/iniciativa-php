<?php
	session_start();
	include_once 'conexao.php';

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	$queryDelete = $link->query("DELETE FROM cliente WHERE id='$id'");

	if(mysqli_affected_rows($link) > 0){
		$_SESSION['msg'] = '<p class="center green-text">Remoção realizada com sucesso!</p>';
		header("Location: ../consultas.php");
	}
	else{
		$_SESSION['msg'] = '<p class="center red-text">Erro!</p>';
		header("Location: ../consultas.php");
	}