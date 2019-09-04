<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query('SELECT * FROM tipo_produto');

	while($registro = $querySelect->fetch_assoc()){
		$id            = $registro['id'];
		$descricao     = $registro['descricao'];

		echo '<tr>';
		echo '<td>' . $descricao . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



