
<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query('SELECT * FROM funcionario');

	while($registro = $querySelect->fetch_assoc()){
		$id = $registro['id'];
		$nome = $registro['nome'];
		$cpf = $registro['cpf'];
		$telefone = $registro['telefone'];
		$ano_adimissao = $registro['ano_adimissao'];
		$cargo_id = $registro['cargo_id'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . '<td>' . $cpf . '</td>' . '<td>' . $telefone . '</td>' . '<td>' . $ano_adimissao . '</td>'. '<td>' . $cargo_id . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="
						delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



