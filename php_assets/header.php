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
 	<style>	
 		#freewha, frame, iframe{
 			display: none;
 		}
 		.skip{ /*recurso de acessibilidade*/
 			position:absolute;
 			text-indent:-9999em;
 			width:0;
 		}
 	</style>
 </head>
 <body>
 	<div class="content">	
 		<div class="navbar navbar-default non-printable">
 			<div class="navbar-header">
 				<a href="#" class="navbar-brand ">
 					<?php echo $title ?>
 				</a>
 			</div><!-- /.navbar-header -->
 			<!-- RECURSO DE ACESSIBILIDADE -->
 			<p class="skip"><a href="#maincontent" tabindex="1">Pular navegação e ir direto para o conteúdo</a></p>
 			<div class="btn-toolbar">
 				<div class="btn-group-lg btn-group">
 					<a href="nova_avaliacao.php" class="btn btn-primary">Nova Avaliação</a>
 					<a href="gerencia_perguntas.php" class="btn btn-primary ">Gerencia Perguntas</a>
 					<a href="edita_usuario.php" class="btn btn-primary">Edita Usuário</a>
 					<a href="novo_usuario.php" class="btn btn-primary ">Novo Usuário</a>
 					<a href="ver_registros.php" class="btn btn-primary ">Ver Registros</a>
 					<a href="php_assets/sair.php" class="btn btn-primary ">Sair</a>
 				</div><!-- /.btn-group-lg btn-group -->
 			</div><!-- /.btn-toolbar -->
	</div><!-- /.navbar navbar-default -->
	</div><!-- /.content -->
	<div class="content-fluid" id="maincontent">