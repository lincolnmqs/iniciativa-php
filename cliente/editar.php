<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM cliente WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
			$id       = $registro['id'];
			$nome     = $registro['nome'];
			$telefone = $registro['telefone'];
			$cpf      = $registro['cpf'];
			$endereco = $registro['endereco'];
		}
	?>

	<!-- Formulário de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="../imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Cliente</h5>

				<div class="row">
					<div class="col s4">
						<!-- Campo Nome -->
						<div class="input-field col s12">
							<i class="material-icons prefix"> account_circle</i>
							<input type="text" name="nome" id="nome" value="<?= $nome;?>" maxlength="50" required autofocus />
							<label for="nome">Nome</label>
						</div>
					</div>
					<div class="col s4">
						<!-- Campo Telefone -->
						<div class="input-field col s12">
							<i class="material-icons prefix">phone</i>
							<input type="text" name="telefone" id="telefone" value="<?= $telefone;?>" maxlength="20" />
							<label for="telefone">Telefone</label>
						</div>
					</div>
					<div class="col s4">
						<!-- Campo CPF -->
						<div class="input-field col s12">
							<i class="material-icons prefix">credit_card</i>
							<input type="text" name="cpf" id="cpf" value="<?= $cpf;?>" maxlength="14" />
							<label for="cpf">CPF</label>
						</div>
					</div>
				</div>
			
				<!-- Campo Endere�o -->
				<div class="input-field col s12">
					<i class="material-icons prefix">home</i>
					<input type="text" name="endereco" id="endereco" value="<?= $endereco;?>" maxlength="100" />
					<label for="endereco">Endereco</label>
				</div>

				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>