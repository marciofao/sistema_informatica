<?php 	
/*
usage:

<?php 	
$title="Editar Usuário";
require_once 'php_assets/header.php';
 ?>
*/


require_once "php_assets/verifica_sessao.php";
require_once 'php_assets/conecta.php';
 ?>

 <!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo 	$title ?> - Questionário Info</title>
	<meta name="description" content="curso de bootstrap 3">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="content">	
<div class="navbar navbar-default">
		<div class="navbar-header">
			<a href="#" class="navbar-brand ">
				<?php echo $title ?>
			</a>
		</div><!-- /.navbar-header -->
		<div class="btn-toolbar">
			<div class="btn-group-lg btn-group">
				<a href="nova_avaliacao.php" class="btn btn-primary">Nova Avaliação</a>
				<a href="gerencia_perguntas.php" class="btn btn-primary ">Gerencia Perguntas</a>
				<a href="edita_usuario.php" class="btn btn-primary">Edita Usuário</a>
				<a href="novo_usuario.php" class="btn btn-primary ">Novo Usuário</a>
				<a href="ver_registros.php" class="btn btn-primary ">Ver Registros</a>
			</div><!-- /.btn-group-lg btn-group -->
		</div><!-- /.btn-toolbar -->
	</div><!-- /.navbar navbar-default -->