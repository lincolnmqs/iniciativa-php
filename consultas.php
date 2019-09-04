<?php
	session_start();
	include_once 'header.inc.php';
	include_once 'menu.inc.php';
?>

<div class="row container" style="margin-top: 2%">
	<div class="col s12" style="background-color: white;border: 5px solid rgb(57, 179, 185);">
		<h5 class="light">Consultas</h5>
		<hr />

		<?php if(isset($_SESSION['msg'])):?>
		<?php 
			echo $_SESSION['msg'];
			session_unset();
		?>
		<?php endif;?>

		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php include_once 'banco_de_dados/read.php';?>
			</tbody>
		</table>
	</div>
</div>

<?php include_once 'footer.inc.php'; ?>