<?php
$order = ["ultimo_atendimento" => "ASC"];
$or = 'ultimo_atendimento';
$title = "Todos os usuários";

//se receber por get o parametro m = meus alunos
if ($_GET) {
	$title = "Meus usuários";
}


//se receber parametro de ordem
if (isset($_POST['or'])) {
	$or = $_POST['or'];
	$order = [$_POST['or'] => "DESC"];
	//Exceção para nome 
	if ($or == 'nome') {
		$order = [$_POST['or'] => "ASC"];
	}
}

//die($order); //sempre armazena o ultimo parametro en
//usage: todos_alunos.php?m=1
require_once "php_assets/header.php";



//AO RECEBER DADOS POST DA BUSCA
if (isset($_POST['busca'])) {
	$datas = $database->select(
		'pacientes_info',
		["cod", "nome", "data", "ultimo_atendimento"],
		['nome[~]' => $_POST["busca"]],
		[
			'AND' =>
			["ativo" => 1, "ORDER" => $order]
		]
	);
	//var_dump($datas[0]);
	//echo count($datas);
	//echo(count($datas)=='1');
	//era para entrar direto em editar registro atendimento mas a função abaixo não funciona não entendo...
	if (count($datas) == 1) {
		header("location: edita_registro_atendimentos.php?c=$datas[0]['cod']");
	}
} else {
	if (isset($_GET['m'])) {

		//Se receber get com parametro M, busca os pacientes associados ao rebilitador/avaliador da sessão atual a serem exibidos
		$datas = $database->select('pacientes_info', ["cod", "nome", "data", "ultimo_atendimento", "afv"], [
			"AND" => [
				"cod_avaliador" => $_SESSION["cod"],
				"ativo" => 1,
			],
			"ORDER" => $order

		]);
	} else {

		$datas = $database->select('pacientes_info', ["cod", "nome", "data", "ultimo_atendimento", "afv"], ["ativo" => 1, "ORDER" => $order]);
	}
}

//echo '<pre>'; var_dump($datas); echo '</pre>';die();

?>


<div class="">


	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title" aria-label="Use tecla 4 para navegar por nomes">
				Usuários registrados
			</h3>

		</div><!-- /.panel-heading -->
		<div class="order">
			Ordenar:
			<form method="post" onchange="submit()">
				<select aria-label="Selecionar ordem da lista" name="or">
					<option <?php echo '' . ($or == 'ultimo_atendimento' ? 'selected' : ''); ?> value="ultimo_atendimento">Último atendimento</option>
					<option <?php echo '' . ($or == 'nome' ? 'selected' : ''); ?> value="nome">Nome</option>
					<option <?php echo '' . ($or == 'data' ? 'selected' : ''); ?> value="data">Data de entrada</option>
				</select>
			</form>
		</div><!-- /.order -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Data entrada</th>
					<th>Último atendimento</th>
					<th colspan="2">
						<form method="post">
							<input type="text " placeholder="pesquisar" name="busca">
						</form>

					</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($datas) : ?>
					<?php foreach ($datas as $data) : ?>
						<tr>
							<td>
								<a href="edita_registro_atendimentos.php?c=<?php echo $data['cod']; ?>
							<?php
							//verifica se recebeu parametro M meus alunos, para incluir no link a letra E
							if (isset($_GET['m'])) : echo ("&e")
							?>

						<?php endif ?>
						">
									<h4><?php echo $data['nome']; ?></h4>
								</a>
							</td>
							<td>
								<?php echo date_format(date_create($data['data']), 'd/m/Y'); ?>
							</td>
							<td>
								<?php if (is_null($data['ultimo_atendimento'])) {
								} else {
									echo date_format(date_create($data['ultimo_atendimento']), 'd/m/Y');
								}
								?>
							</td>
							<td class="col-md-1">
								<a class="btn btn-warning" href="edita_avaliacao.php?c=<?php echo $data['cod'] ?>">Questionario</a>
							</td>
							<td class="col-md-1">
								<?php 
								if($data['afv']) $href = 'edita_avaliacao.php?c='.$data["cod"].'&afv';
								else $href = 'nova_avaliacao.php?c='.$data["cod"].'&afv';
								?>
								<a class="btn btn-warning" href="<?php echo $href ?>"> <?php echo $data['afv']? 'AFV' : 'Aplicar AFV' ?> </a>
							</td>
							<td class="col-md-1">
								<a class="btn btn-danger" href="apagar_aluno.php?c=<?php echo $data['cod'];
																					if ($_GET) {
																						echo ("&t=1");
																					} ?>">Excluir</a>
							</td>

						</tr>



					<?php endforeach ?>
				<?php endif ?>

			</tbody>
		</table>

	</div><!-- /.panel panel-default -->
	<?php if($_SESSION["user_level"] == 1): ?>
	<a href="ver_registros_excluidos.php">Ver Excluídos</a>
	<?php endif ?>



</div><!-- /.content-fluid -->

<?php require_once "php_assets/footer.php" ?>