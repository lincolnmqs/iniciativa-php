<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
	
	include_once '../banco_de_dados/conexao.php';
	
	$querycargo = $link->query('SELECT * FROM fornecedor');

?>

<!-- FormulÃ¡rio de Cadastro -->
<div class="row container">
	<form action="create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="../imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Fornecedor</h5>

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
			
			<!-- Campo CPF -->
			<div class="input-field col s12">
				<i class="material-icons prefix"> indeterminate_check_box</i>
				<input type="text" name="cnpj" id="cnpj" maxlength="40" required autofocus />
				<label for="cnpj">CNPJ</label>
			</div>
			
			<!-- Campo Telefone -->
			<div class="input-field col s12">
				<i class="material-icons prefix"> phone_android</i>
				<input type="text" name="telefone" id="telefone" maxlength="40" required autofocus />
				<label for="telefone">Telefone</label>
			</div>
			
			<!-- Campo ano admissao -->
			<div class="input-field col s12">
				<i class="material-icons prefix"> date_range</i>
				<input type="text" name="endereco" id="endereco" maxlength="40" required autofocus />
				<label for="endereco">Endereço</label>
			</div>				


			<div class="input-field col s12">
				<input type="submit" value="Cadastrar" class="btn blue">
				
				<input type="reset" value="Limpar" class="btn red">
			
				<a href="consultas.php" class="btn green">Consultar</a>
			</div>
			
		</fieldset>
	</form>
</div>

<?php include_once '../includes/footer.inc.php'; ?>