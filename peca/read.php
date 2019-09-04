<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query('SELECT * FROM peca');

	while($registro = $querySelect->fetch_assoc()){
		$id       = $registro['id'];
		$nome     = $registro['nome_peca'];
		$valor    = $registro['valor_peca'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . '<td>' . $valor . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



