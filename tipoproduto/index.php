<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

<!-- FormulÃ¡rio de Cadastro -->
<div class="row container">
	<form action="create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="../imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Tipos de Produto</h5> <br />

			<?php if(isset($_SESSION['msg'])):?>
				<?php 
				echo $_SESSION['msg'];
				session_unset();
				?>
			<?php endif;?>
			
			<!-- Campo Descrição -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> format_size</i>
					<input type="text" name="descricao" id="descricao" maxlength="45" required autofocus />
					<label for="descricao">Descricao</label>
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