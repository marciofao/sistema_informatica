<?php 	

//HABILITA BACKUPS
//chmod ("backup.php", 0777);

//encaminha direto para a lista de meus alunos
header('location:todos_alunos.php?m=1');
$title="Início";
require_once 'php_assets/header.php';
?>



<div class="tac">

	<h3>Acesso ao Sistema</h3>
	<h4>Bem Vindo <?php echo 	$_SESSION['nome'] ?>!</h4>

	<script>
		window.location="todos_alunos.php?m=1";
	</script>
	<style>
		.navbar{
			display: none;
		}

	</style>

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
		<a href="todos_alunos.php" class="btn-primary btn-md form-control">Ver registros</a>
	</div>
	<div>
		<a href="php_assets/sair.php" class="btn-primary btn-md form-control">Sair</a>
	</div>


</div><!-- /.row -->

<?php 	require_once "php_assets/footer.php"; ?>