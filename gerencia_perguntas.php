<?php 	
$title="Gerenciar Perguntas";
require_once 'php_assets/header.php';


$datas=$database->select('perguntas', "*", ["ORDER" => "ordem"]);

//var_dump($datas);
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
							<td ></td>

							<td class="col-md-2 col-sm-2 col-xs-2" rowspan="" colspan="2">
								<a href="nova_pergunta.php" class="btn-primary btn-sm form-control">Adicionar Pergunta</a>
							</td>
						</tr>

						<?php 	

						foreach($datas as $data)
						{
							?>
							<tr>
								<td>
									<?php echo $data['pergunta']; ?>
								</td>
								<td class="col-md-1 col-sm-1 col-xs-1">
								<a href="edita_pergunta.php?c=<?php echo $data['cod']; ?>" class="btn-warning btn-sm form-control">Editar</a>
								</td>
								<td class="col-md-1 col-sm-1 col-xs-1">
									<a href="apagar_pergunta.php?c=<?php echo $data['cod']; ?>" class="btn-danger btn-sm form-control">Apagar</a>
								</td>
							</tr>
							<?php
						}

						?>



					</tbody>
				</table>
			</div><!-- /.panel panel-default -->


		</div><!-- /.row -->
<?php 	require_once 'php_assets/footer.php'; ?>