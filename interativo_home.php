<?php 	

//HABILITA BACKUPS
//chmod ("backup.php", 0777);


?>
<head>
	<title>
		Acesso Interativo
	</title>
</head>

O que fazer?
<div class="tac">

	
	<div>
		<a href="interativo_alunos.php?m=1" aria-label="Registrar Atividade" class="btn-primary btn-md form-control">Registrar ativiade</a>
	</div>
	<div>
		<a href="nova_avaliacao.php" class="btn-primary btn-md form-control">Cadastrar Usuário</a>
	</div>
	<div>
		<a href="interativo_alunos.php" class="btn-primary btn-md form-control">Ver registro de alunos</a>
	</div>
	<div>
		<a href="edita_usuario.php" class="btn-primary btn-md form-control">Configurar Profissional</a>
	</div>
	<?php if($_SESSION["user_level"] == 1): ?>
	<div>
		<a href="novo_usuario.php" class="btn-primary btn-md form-control">Cadastrar novo Profissional</a>
	</div>
	<?php endif ?>
	
	<div>
		<a href="php_assets/sair.php" class="btn-primary btn-md form-control">Sair</a>
	</div>


</div><!-- /.row -->

<?php 	require_once "php_assets/footer.php"; ?>