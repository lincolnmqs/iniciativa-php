<?php
session_start ();
include_once '../includes/header.inc.php';
include_once '../includes/menu.inc.php';
include_once '../banco_de_dados/conexao.php';

	$cliente = $link->query('SELECT * FROM cliente');
	$funcionario = $link->query('SELECT * FROM funcionario');
	$produto = $link->query('SELECT * FROM produto');

?>

<!-- Formulário de Cadastro -->
<div class="row container">
	<form action="create.php" method="post"
		class="col s12">
		<fieldset class="formulario"
			style="background-color: white; border-radius: 10px;">
			<legend>
				<img src="../imagem/venda.png" alt="Avatar" width="100">
			</legend>
			<h5 class="light center">Venda de Produtos</h5>

			<?php if(isset($_SESSION['msg'])):?>
				<?php
				echo $_SESSION ['msg'];
				session_unset ();
				?>
			<?php endif;?>

			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select name="cliente">
				<option value="" selected>Selecione um cliente</option>
					<?php 
				      while($tipo = $cliente->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Nome do cliente</label>
			</div>
			
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select name="funcionario">
				<option value="" selected>Selecione um funcionario</option>
				<?php 
				      while($tipo = $funcionario->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Nome do funcionario</label>
			</div>
			
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select name="produtos[]" multiple>
				      <option value="" disabled>Selecione os produtos</option>
				
				<?php 
				      while($tipo = $produto->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Produtos</label>
			</div>
			

			<div class="input-field col s12">
				<input type="submit" value="Finalizar compra" class="btn blue">
				<input type="reset" value="Limpar campos" class="btn red">
			</div>
		</fieldset>
	</form>
</div>

<?php include_once '../includes/footer.inc.php'; ?><?php
session_start ();
include_once '../includes/header.inc.php';
include_once '../includes/menu.inc.php';
include_once '../banco_de_dados/conexao.php';

	$cliente = $link->query('SELECT * FROM cliente');
	$funcionario = $link->query('SELECT * FROM funcionario');
	$produto = $link->query('SELECT * FROM produto');

?>

<!-- Formulário de Cadastro -->
<div class="row container">
	<form action="create.php" method="post"
		class="col s12">
		<fieldset class="formulario"
			style="background-color: white; border-radius: 10px;">
			<legend>
				<img src="../imagem/venda.png" alt="Avatar" width="100">
			</legend>
			<h5 class="light center">Venda de Produtos</h5>

			<?php if(isset($_SESSION['msg'])):?>
				<?php
				echo $_SESSION ['msg'];
				session_unset ();
				?>
			<?php endif;?>

			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select>
				<option value="" selected>Selecione um cliente</option>
					<?php 
				      while($tipo = $cliente->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Nome do cliente</label>
			</div>
			
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select>
				<option value="" selected>Selecione um funcionario</option>
				<?php 
				      while($tipo = $funcionario->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Nome do funcionario</label>
			</div>

			<div class="input-field col
			
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<select name="produtos[]" multiple>
				      <option value="" disabled>Selecione os produtos</option>
				
				<?php 
				      while($tipo = $produto->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['nome'] . '</option>';
				      }
			      ?>
				</select> <label for="nome">Produtos</label>
			</div>
			 s12">
				<input type="submit" value="Cadastrar" class="btn blue"> <inpuFinalizar compraype="reset" value="
				impar" "btn red">
			</divLimpar campos/fieldset>
	</form>
</div>

<?php include_once '../includes/footer.inc.php'; ?>