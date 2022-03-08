<?php
$title = "Edita Perguntas";
if(isset($_GET['afv']))
$title = "Edita Avaliação Funcional da Visão";
require_once 'php_assets/header.php';

?>

<?php if ($_SESSION["user_level"] != 1) {
	die('Sem permissão para acessar essa página');
} ?>

<?php
if(isset($_GET['afv'])) //av. funcional visao - questionario cod 2
$perguntas = $database->select('perguntas', "*", [ "cod_questionario" => 2, "ORDER" => "ordem"], );
else
$perguntas = $database->select('perguntas', "*", [ "cod_questionario" => 1, "ORDER" => "ordem"]);

//var_dump($perguntas);
//die();
?>


<div class="">


	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Lista de perguntas</h3>

		</div><!-- /.panel-heading -->
		<table class="table table-striped">

			<tbody>
				<tr>
					<td></td>

					<td class="col-md-2 col-sm-2 col-xs-2" rowspan="" colspan="2"> 
						<a href="edita_pergunta.php?novo<?php echo isset($_GET['afv'])? '&afv' : '' ?>" class="btn-primary btn-sm form-control">Adicionar Pergunta</a>
					</td>
				</tr>

				<?php

				foreach ($perguntas as $p) {
				?>
					<tr>
						<td>
							<?php echo $p['pergunta']; ?>
						</td>
						<td class="col-md-1 col-sm-1 col-xs-1">
							<a href="edita_pergunta.php?c=<?php echo $p['cod']; ?><?php echo isset($_GET['afv'])? '&afv' : '' ?>" class="btn-warning btn-sm form-control">Editar</a>
						</td>
						<td class="col-md-1 col-sm-1 col-xs-1">
							<a href="apagar_pergunta.php?c=<?php echo $p['cod']; ?><?php echo isset($_GET['afv'])? '&afv' : '' ?>" class="btn-danger btn-sm form-control">Apagar</a>
						</td>
					</tr>
				<?php
				}

				?>



			</tbody>
		</table>
	</div><!-- /.panel panel-default -->


</div><!-- /.row -->
<?php require_once 'php_assets/footer.php'; ?>