<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM tipo_produto WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
			$id            = $registro['id'];
			$descricao     = $registro['descricao'];
		}
	?>

	<!-- Formulário de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="../imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Tipos de Produto</h5>

				<div class="input-field col s12">
					<i class="material-icons prefix"> format_size</i>
					<input type="text" name="descricao" id="descricao" value="<?= $descricao;?>" maxlength="45" required autofocus />
					<label for="descricao">Descricao</label>
				</div>

				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>