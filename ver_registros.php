<?php 	

$title = "Registros";
require_once "php_assets/header.php";

$datas=$database->select('pacientes_info', ["cod","nome", "data"], ["ORDER" => "data"]);

?>


<div class="">


	<div class="panel panel-default">	
		<div class="panel-heading">	
			<h3 class="panel-title">Usuários registrados</h3>
		</div><!-- /.panel-heading -->
		<table class="table table-striped">	
			<thead>	
				<tr>
					<th>Nome</th>
					<th>Data</th>
					<th></th>
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
						<td>
							<a class="btn btn-warning" href="edita_registro_atendimentos.php?c=<?php echo $data['cod']; ?>">Atendimentos</a>
							<a class="btn btn-warning" href="edita_avaliacao.php?c=<?php echo $data['cod']; ?>">Questionario</a>
						</td>

					</tr>



				<?php endforeach ?>

			</tbody>
		</table>
	</div><!-- /.panel panel-default -->



	
</div><!-- /.content-fluid -->

<?php 	require_once "php_assets/footer.php" ?>