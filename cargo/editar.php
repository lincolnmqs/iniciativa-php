<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM cargo WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
			$id       = $registro['id'];
			$nome     = $registro['nome'];
			$salario    = $registro['salario'];
		}
	?>

	<!-- FormulÃ¡rio de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Cargo</h5>

				<!-- Campo Nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> account_circle</i>
					<input type="text" name="nome" id="nome" value="<?= $nome;?>" maxlength="40" required autofocus />
					<label for="nome">Nome</label>
				</div>

				<!-- Campo Salario-->
				<div class="input-field col s12">
					<i class="material-icons prefix">attach_money</i>
					<input type="number" name="salario" id="salario" value="<?= $salario;?>" maxlength="40" />
					<label for="salario">Salario</label>
				</div>

				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>