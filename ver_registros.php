<?php 	

$title = "Registros";
require_once "php_assets/header.php";

$datas=$database->select('avaliacoes', ["cod","nome", "data"], ["ORDER" => "data"]);

 ?>


	<div class="container">
		
		
		<div class="panel panel-default">	
				<div class="panel-heading">	
					<h3 class="panel-title">Questionários registrados</h3>
				</div><!-- /.panel-heading -->
				<table class="table table-striped">	
						<thead>	
							<tr>
								<th>Nome</th>
								<th>Data</th>
							</tr>	
						</thead>
						<tbody>
							<?php foreach ($datas as $data): ?>
						<tr>
								<td>
									<a target="_blank" href="registro.php?c=<?php echo $data['cod']; ?>"><?php 	echo $data['nome']; ?></a>
								</td>
								<td>
									<?php 	echo date_format(date_create($data['data']), 'd/m/Y'); ?>
								</td>

							</tr>



							<?php endforeach ?>

												</tbody>
				</table>
		</div><!-- /.panel panel-default -->

				
			
	
	</div><!-- /.content-fluid -->

<?php 	require_once "php_assets/footer.php" ?>