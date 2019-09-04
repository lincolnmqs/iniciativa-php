<?php
	include_once '../banco_de_dados/conexao.php';

	$querySelect = $link->query(
			'SELECT * FROM `produto` 
			inner join produto_peca on produto_peca.produto_id = produto.id 
			inner join peca on peca.id = produto_peca.peca_id 
			inner join tipo_produto on tipo_produto.id = produto.tipo_produto_id'
	);

	while($registro = $querySelect->fetch_assoc()){
		$id              = $registro['id'];
		$nome            = $registro['nome'];
		$valor           = $registro['valor'];
		$tipo_produt_id  = $registro['tipo_produto_id'];
		$produto_id      = $registro['produto_id'];
		$peca_id         = $registro['peca_id'];
		$nome_peca       = $registro['nome_peca'];
		$valor_peca      = $registro['valor_peca'];
		$tipo_produto    = $registro['descricao'];

		echo '<tr>';
		echo '<td>' . $nome . '</td>' . 
			'<td>' . $valor . '</td>' . 
			'<td>' . $tipo_produto . '</td>' .
			'<td>' . $nome_peca . '</td>' .
			'<td>' . $valor_peca . '</td>';
		echo '<td>
				<a href="editar.php?id=' . $id . '"><i class="material-icons">edit</i></a>
			</td>
			<td>
				<a href="delete.php?id=' . $id . '"><i class="material-icons">delete</i></a>
			</td>';
		echo '</tr>';
	}



