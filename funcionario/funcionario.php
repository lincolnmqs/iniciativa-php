<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
	
	include_once '../banco_de_dados/conexao.php';
	
	$querycargo = $link->query('SELECT * FROM funcionario');

?>

<!-- Formulário de Cadastro -->
<div class="row container">
	<form action="create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="../imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Funcionarios</h5>

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
				<input type="text" name="cpf" id="cpf" maxlength="40" required autofocus />
				<label for="cpf">CPF</label>
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
				<input type="number" name="ano_adimissao" id="ano_adimissao" maxlength="40" required autofocus />
				<label for="ano_adimissao">Ano de admissao</label>
			</div>				
		  	<div class="input-field col s12">
		  		<i class="material-icons prefix"> work</i>
		    	<select name="cargo_id">
		      	<option value="cargo_id" disabled selected>Selecione o Cargo</option>
			      <?php 
				      while($cargo = $querycargo->fetch_assoc()){
				      	echo '<option value="' . $cargo['id'] . '">' . $cargo['nome'] . '</option>';
				      }
			      ?>
		   		</select>
		  		<label>Cargo</label>
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