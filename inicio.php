<?php 	
$title="Início";
require_once 'php_assets/header.php';
?>


<div class="container">
	<div class="">

		<h3>Acesso ao Sistema</h3>
		<h4>conectado como <?php echo 	$_SESSION['usuario'] ?> - <a href="sair.php">sair</a></h4>


		<div>
			<a href="nova_avaliacao.php" class="btn-primary btn-md form-control">Nova Avalição</a>
		</div>
		<div>
			<a href="gerencia_perguntas.php" class="btn-primary btn-md form-control">Gerenciar Perguntas</a>
		</div>
		<div>
			<a href="edita_usuario.php" class="btn-primary btn-md form-control">Editar Usuário</a>
		</div>
		<div>
			<a href="novo_usuario.php" class="btn-primary btn-md form-control">Novo Usuário</a>
		</div>
		<div>
			<a href="ver_registros.php" class="btn-primary btn-md form-control">Ver registros</a>
		</div>


	</div><!-- /.row -->
</div><!-- /.content-fluid -->

<?php 	require_once "php_assets/footer.php"; ?>