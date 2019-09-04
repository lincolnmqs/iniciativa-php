<?php 
	session_start();
	include_once '../includes/header.inc.php';
	include_once '../includes/menu.inc.php';
	include_once '../banco_de_dados/conexao.php';
	
	$queryTipo = $link->query('SELECT * FROM tipo_produto');
	$queryMaquina = $link->query('SELECT * FROM maquina');
	$queryPeca = $link->query('SELECT * FROM peca');
	
?>

<!-- FormulÃ¡rio de Cadastro -->
<div class="row container">
	<form action="create.php" method="post" class="col s12">
		<fieldset class="formulario" style="background-color: white; border-radius: 10px;">
			<legend><img src="../imagem/avatar4.png" alt="Avatar" width="100"></legend>
			<h5 class="light center">Cadastro de Produtos</h5>

			<?php if(isset($_SESSION['msg'])):?>
				<?php 
				echo $_SESSION['msg'];
				session_unset();
				?>
			<?php endif;?>

			<!-- Campo Nome -->
			<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
				<input type="text" name="nome" id="nome" maxlength="40" required autofocus />
				<label for="nome">Nome</label>
			</div>

			<!-- Campo Valor -->
			<div class="input-field col s12">
				<i class="material-icons prefix">attach_money</i>
				<input type="text" name="valor" id="valor" maxlength="40" />
				<label for="valor">Valor</label>
			</div>
			
			<div class="input-field col s12">
			    <select name="tipo">
			      <option value="" disabled selected>Selecione o tipo do produto</option>
			      
			      <?php 
				      while($tipo = $queryTipo->fetch_assoc()){
				      	echo '<option value="' . $tipo['id'] . '">' . $tipo['descricao'] . '</option>';
				      }
			      ?>
			    </select>
			    <label>Tipo do Produto</label>
			  </div>
			  
			  <div class="input-field col s12">
			    <select multiple name="maquinas[]">
			      <option value="" disabled selected>Escolha sua opção</option>
			      <?php 
				      while($maquina = $queryMaquina->fetch_assoc()){
				      	echo '<option value="' . $maquina['id'] . '">' . $maquina['nome'] . '</option>';
				      }
			      ?>
			    </select>
			    <label>Maquinas</label>
			  </div>
			  
			  <div class="input-field col s12">
			    <select multiple name="pecas[]">
			      <option value="" disabled selected>Escolha sua opção</option>
			      <?php 
				      while($peca = $queryPeca->fetch_assoc()){
				      	echo '<option value="' . $peca['id'] . '">' . $peca['nome'] . '</option>';
				      }
			      ?>
			    </select>
			    <label>Peças Usadas</label>
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