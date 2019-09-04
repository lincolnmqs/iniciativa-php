<?php 
	session_start();
	include_once 'header.inc.php';
	include_once 'menu.inc.php';
?>

	<?php 
		include_once 'banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM cliente WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
			$id       = $registro['id'];
			$nome     = $registro['nome'];
			$email    = $registro['email'];
			$telefone = $registro['telefone'];
		}
	?>

	<!-- Formulário de Cadastro -->
	<div class="row container">
		<form action="banco_de_dados/update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Cliente</h5>

				<!-- Campo Nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix"> account_circle</i>
					<input type="text" name="nome" id="nome" value="<?= $nome;?>" maxlength="40" required autofocus />
					<label for="nome">Nome</label>
				</div>

				<!-- Campo E-mail -->
				<div class="input-field col s12">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" id="email" value="<?= $email;?>" maxlength="40" />
					<label for="email">E-mail</label>
				</div>

				<!-- Campo Telefone -->
				<div class="input-field col s12">
					<i class="material-icons prefix">phone</i>
					<input type="text" name="telefone" id="telefone" value="<?= $telefone;?>" maxlength="40" />
					<label for="telefone">Telefone</label>
				</div>

				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once 'footer.inc.php'; ?>