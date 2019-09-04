<?php
	include_once 'conexao.php';

	$querySelect = $link->query('SELECT * FROM cliente');

	while($registro = $querySelect->fetch_assoc()){
		$id       = $registro['id'];
		$nome     = $registro['nome'];
		$email    = $registro['email'];
		$telefone = $registro['telefone'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . '<td>' . $email . '</td>' . '<td>' . $telefone . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="banco_de_dados/delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



