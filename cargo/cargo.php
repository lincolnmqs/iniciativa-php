<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

<!-- Formulário de Cadastro -->
<div class="row container">
	<form action="create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="../imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Cargos</h5>

			<?php if(isset($_SESSION['msg'])):?>
				<?php 
				echo $_SESSION['msg'];
				session_unset();
				?>
			<?php endif;?>

			<!-- Campo Nome -->
			<div class="input-field col s12">
				<i class="material-icons prefix"> account_circle</i>
				<input type="text" name="nome" id="nome" maxlength="40" required autofocus />
				<label for="nome">Cargo</label>
			</div>

			<!-- Campo Salario -->
			<div class="input-field col s12">
				<i class="material-icons prefix">attach_money</i>
				<input type="number" step = "0.1" name="salario" id="salario" maxlength="40" />
				<label for="salario">Salario</label>
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