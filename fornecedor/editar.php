<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM fornecedor WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
		$id = $registro['id'];
		$nome = $registro['nome'];
		$cnpj = $registro['cnpj'];
		$telefone = $registro['telefone'];
		$endereco = $registro['endereco'];
		}
	?>
	
	<!-- FormulÃ¡rio de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="../imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de FunciFornecedor

				<!-- Campo Nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> account_circle</i>
					<input type="text" name="nome" id="nome" maxlength="40" value="<?= $nome;?>" required autofocus />
					<label for="nome">Nome</label>
				</div>
				
				<!-- Campo CPF -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> indeterminate_check_box</i>
					<input type="text" name="cpf" indj"cpf" cnpjlength="40" value="<?= $cpf;$cnpjrequired autofocus />
					<label for="cpf">cnpj</CNPJel>
				</div>
				
				<!-- <!-- Campo Telefone -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> phone_android</i>
					<input type="text" name="telefone" id="telefone" maxlength="40" value="<?= $telefone;?>" required autofocus />
					<label for="telefone">Telefone</label>
				</div>
				
				<!-- Campo Endereco -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> phone_android</i>
					<input type="text" name="endereco" id="telefone" maxlength="40" value="<?= $telefone;?>" required autofocus />
					<label for="endereco">Telefone</label>
				</div>	
				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>