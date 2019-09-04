<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
?>

	<?php 
		include_once '../banco_de_dados/conexao.php'; 

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;

		$querySelect = $link->query("SELECT * FROM peca WHERE id = '$id'");

		while($registro = $querySelect->fetch_assoc()){
			$id       = $registro['id'];
			$nome     = $registro['nome_peca'];
			$valor    = $registro['valor_peca'];
		}
	?>

	<!-- Formulário de Cadastro -->
	<div class="row container">
		<form action="update.php" method="post" class="col s12">
			<fieldset class="formulario" style="background-color: white">
				<legend><img src="../imagem/edit.png" alt="Avatar" width="100"></legend>
				<h5 class="light center">Edição de Pecas</h5>

				<div class="row">
					<div class="col s8">
						<!-- Campo Nome -->
						<div class="input-field col s12">
							<i class="material-icons prefix"> extension</i>
							<input type="text" name="nome" id="nome" value="<?= $nome;?>" maxlength="50" required autofocus />
							<label for="nome">Nome</label>
						</div>
					</div>
					<div class="col s4">
						<!-- Campo Telefone -->
						<div class="input-field col s12">
							<i class="material-icons prefix">attach_money</i>
							<input type="text" name="valor" id="valor" value="<?= $valor;?>" maxlength="20"/>
							<label for="valor">Valor</label>
						</div>
					</div>
				</div>

				<div class="input-field col s12">
					<input type="submit" value="Alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
			</fieldset>
		</form>
	</div>

<?php include_once '../includes/footer.inc.php'; ?>