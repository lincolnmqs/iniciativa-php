<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query('SELECT * FROM cliente');

	while($registro = $querySelect->fetch_assoc()){
		$id       = $registro['id'];
		$nome     = $registro['nome'];
		$telefone    = $registro['telefone'];
		$cpf = $registro['cpf'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . '<td>' . $telefone . '</td>' . '<td>' . $cpf . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



