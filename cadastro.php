<?php 
	session_start();
	include_once 'header.inc.php';
	include_once 'menu.inc.php';
?>

<!-- Formulário de Cadastro -->
<div class="row container">
	<form action="banco_de_dados/create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Clientes</h5>

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
				<label for="nome">Nome</label>
			</div>

			<!-- Campo E-mail -->
			<div class="input-field col s12">
				<i class="material-icons prefix">email</i>
				<input type="email" name="email" id="email" maxlength="40" />
				<label for="email">E-mail</label>
			</div>

			<!-- Campo Telefone -->
			<div class="input-field col s12">
				<i class="material-icons prefix">phone</i>
				<input type="text" name="telefone" id="telefone" maxlength="40" />
				<label for="telefone">Telefone</label>
			</div>

			<div class="input-field col s12">
				<input type="submit" value="Cadastrar" class="btn blue">
				<input type="reset" value="Limpar" class="btn red">
			</div>
		</fieldset>
	</form>
</div>

<?php include_once 'footer.inc.php'; ?>