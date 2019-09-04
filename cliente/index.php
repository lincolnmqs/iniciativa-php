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
			<h5 class="light center">Cadastro de Clientes</h5> <br />

			<?php if(isset($_SESSION['msg'])):?>
				<?php 
				echo $_SESSION['msg'];
				session_unset();
				?>
			<?php endif;?>
			
				<div class="row">
					<div class="col s4">
						<!-- Campo Nome -->
						<div class="input-field col s12">
							<i class="material-icons prefix"> account_circle</i>
							<input type="text" name="nome" id="nome" maxlength="50" required autofocus />
							<label for="nome">Nome</label>
						</div>
					</div>
					<div class="col s4">
						<!-- Campo Telefone -->
						<div class="input-field col s12">
							<i class="material-icons prefix">phone</i>
							<input type="text" name="telefone" id="telefone" maxlength="20" />
							<label for="telefone">Telefone</label>
						</div>
					</div>
					<div class="col s4">
						<!-- Campo CPF -->
						<div class="input-field col s12">
							<i class="material-icons prefix">credit_card</i>
							<input type="text" name="cpf" id="cpf" maxlength="14" />
							<label for="cpf">CPF</label>
						</div>
					</div>
				</div>
			
				<!-- Campo Endereço -->
				<div class="input-field col s12">
					<i class="material-icons prefix">home</i>
					<input type="text" name="endereco" id="endereco" maxlength="100" />
					<label for="endereco">Endereco</label>
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