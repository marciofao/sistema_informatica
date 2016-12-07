<?php 	
$title = "Registro";
require_once "php_assets/header.php";

if (!$_GET) {
	header("location:ver_registros.php");
}


$datas=$database->select('avaliacoes', "*", ["cod" => $_GET['c']]);

//separa as perguntas das respostas
$dados=explode("}{", $datas[0]['respostas']); 

//cria arrays
$perguntas = explode(",", $dados[0]);
$respostas = explode(",", $dados[1]);

?>

<style>	
	.tac{
		text-align: center;	
		margin-top: 10px;
		margin-bottom: 	10px;
	}
	.top{
		margin-top: 	20px;
	}
	li{
		margin-bottom: 5px	;
	}

	@media screen {
		.printable { display: none; }
		.non-printable { display: block; }
	}
	@media print {
		.printable { display: block; }
		.non-printable { display: none; }
	}
</style>

<div class="content">

	<div class="row non-printable tac">
		<a href="javascript:window.print()">Clique para imprimir</a>
	</div><!-- /.row -->
	<div class="row top">
		<div class="col-md-3 col-xs-3">	
			<img src="img/logocrv.png" alt="Logotipo CRV" height="100"/>
		</div><!-- /.col-md-3 -->
		<div class="col-md-9 col-xs-9">
			Rua Andrade Neves, 3084 Pelotas, RS <br />	 
			CEP: 96020-080 <br />	
			aelbraille@hotmail.com <br />	
			CNPJ: 92236249/000119 <br />	

		</div><!-- /.col-md-9 -->

	</div><!-- /.row -->
	<div id="id" class="tac" >
		<div class="row">
			<div class="col-md-9 col-xs-9">
				<b>Questionário padrão de entrevista inicial</b>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-9 col-xs-9">
				<b>Reabiliando: </b><?php echo 	$datas[0]['nome'] ?>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-9 col-xs-9"><b>Reabilitador: </b><?php echo $datas[0]['avaliador'] ?></div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-9 col-xs-9"><b>Setor: </b>Informática</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-9 col-xs-9">
				<b>Data: </b>
				<?php 
				$timestamp = strtotime($datas[0]['data']);
				echo date('d/m/Y', $timestamp);
				?>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		
	</div><!-- /#id -->
	<ol>
		<?php 
		$i=0;
		foreach ($perguntas as $p => $value): ?>
		<li>
			<b>	<?php echo 	$p ?></b>
			<br />	
			<?php echo 	$respostas[$i]; ?>
		</li>
		<?php 
		$i++;
		endforeach ?>
	</ol>
</div><!-- /.content -->


<?php 	require_once "php_assets/footer.php" ?>