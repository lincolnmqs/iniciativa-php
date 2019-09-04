<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM `produto` 
			inner join produto_peca on produto_peca.produto_id = produto.id 
			inner join peca on peca.id = produto_peca.peca_id 
			inner join tipo_produto on tipo_produto.id = produto.tipo_produto_id WHERE id = '$id'");

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
		}
		
		$queryTipo = $link->query('SELECT * FROM tipo_produto');
		$queryMaquina = $link->query('SELECT * FROM maquina');
		$queryPeca = $link->query('SELECT * FROM peca');
	?>

	<!-- FormulÃ¡rio de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
				<legend><img src="../imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Produtos</h5>
	
				<!-- Campo Nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="nome" id="nome"  value="<?= $nome;?>" maxlength="40" required autofocus />
					<label for="nome"></label>
				</div>
	
				<!-- Campo Valor -->
				<div class="input-field col s12">
					<i class="material-icons prefix">attach_money</i>
					<input type="text" name="valor" id="valor" maxlength="40" />
					<label for="valor"></label>
				</div>
				
				<div class="input-field col s12">
				    <select name="tipo">
				      <option value="" disabled selected>Selecione o tipo do produto</option>
				      
				      <?php 
					      while($tipo = $queryTipo->fetch_assoc()){
					      	echo '<option value="' . $tipo['id'] . '">' . $tipo['descricao'] . '</option>';
					      }
				      ?>
				    </select>
				    <label>Tipo do Produto</label>
				  </div>
				  
				  <div class="input-field col s12">
				    <select multiple name="maquinas[]">
				      <option value="" disabled selected>Escolha sua opção</option>
				      <?php 
					      while($maquina = $queryMaquina->fetch_assoc()){
					      	echo '<option value="' . $maquina['id'] . '">' . $maquina['nome'] . '</option>';
					      }
				      ?>
				    </select>
				    <label>Maquinas</label>
				  </div>
				  
				  <div class="input-field col s12">
				    <select multiple name="pecas[]">
				      <option value="" disabled selected>Escolha sua opção</option>
				      <?php 
					      while($peca = $queryPeca->fetch_assoc()){
					      	echo '<option value="' . $peca['id'] . '">' . $peca['nome'] . '</option>';
					      }
				      ?>
				    </select>
				    <label>Peças Usadas</label>
				  </div>
	
				<div class="input-field col s12">
					<input type="submit" value="Cadastrar" class="btn blue">
					<input type="reset" value="Limpar" class="btn red">
					<a href="consultas.php" class="btn green">consultar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>