<?php
/*
EXEMPLO DE USO DO $title:

<?php 	
$title="Editar Usuário";
require_once 'php_assets/header.php';
 ?>
*/


require_once "php_assets/verifica_sessao.php";
require_once 'php_assets/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo 	$title ?></title>
	<meta name="description" content="Siste da Informática">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<style>
		.skip {
			/*recurso de acessibilidade*/
			position: absolute;
			text-indent: -9999em;
			width: 0;
		}

		.tac {
			text-align: center;
		}

		@media screen {
			.printable {
				display: none;
			}

			.non-printable {
				display: block;
			}
		}

		@media print {
			.printable {
				display: block;
			}

			.non-printable {
				display: none;
			}
		}

		.col-centered {
			float: none;
			margin: 0 auto;
		}

		.acessibilidade {
			position: absolute;
			text-indent: -9999em;
			width: 0;
		}
	</style>
</head>

<body>
	<div class="content">
		<div class="container">
			<div class="navbar navbar-default non-printable">
				<div class="navbar-header">
					<a href="#" class="navbar-brand ">
						<?php
						//PARA EXIBIR UM TITULO NA PÁGINA, BASTA DECLARAR UM VALOR $title ANTES DE IMPORTAR O HEADER.PHP
						echo $title

						?>
					</a>
					<!--https://getbootstrap.com/docs/4.0/components/navbar/-->
				</div><!-- /.navbar- -->
				<!-- RECURSO DE ACESSIBILIDADE -->
				<p class="acessibilidade">
					<a href="#maincontent" tabindex="1">Pular navegação e ir direto para o conteúdo</a>
					<a href="interativo_home.php" tabindex="2">Abrir Navegação simplificada</a>
				</p>
				<div class="btn-toolbar">
					<div class="btn-group-lg btn-group">
						<a href="nova_avaliacao.php" class="btn btn-primary">Novo Aluno</a>
						<a href="todos_alunos.php?m=1" class="btn btn-primary ">Meus Alunos</a>
						<a href="todos_alunos.php" class="btn btn-primary ">Todos Alunos</a>
						<?php if ($_SESSION["user_level"] == 1) : ?>
							<a href="gerencia_perguntas.php" class="btn btn-primary ">Editar Questionário</a>
						<?php endif ?>
						<?php if ($_SESSION["user_level"] == 1) : ?>
							<a href="gerencia_perguntas.php?afv" class="btn btn-primary ">Editar AFV</a>
						<?php endif ?>
						<a href="edita_usuario.php" class="btn btn-primary">Usuário</a>
						<a href="php_assets/sair.php" class="btn btn-primary ">Sair</a>
					</div><!-- /.btn-group-lg btn-group -->
				</div><!-- /.btn-toolbar -->
			</div><!-- /.navbar navbar-default -->
		</div>
	</div><!-- /.content -->
	<div class="content-fluid container" id="maincontent">