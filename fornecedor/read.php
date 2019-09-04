
<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query('SELECT * FROM fornecedor');

	while($registro = $querySelect->fetch_assoc()){
		$id = $registro['id'];
		$nome = $registro['nome'];
		$cnpj = $registro['cnpj'];
		$telefone = $registro['telefone'];
		$endereco = $registro['endereco'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . '<td>' . $cnpj . '</td>' . '<td>' . $telefone . '</td>' . '<td>' . $endereco . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="
						delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



