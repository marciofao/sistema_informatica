<?php 	
$title = "Registro";
require_once "php_assets/conecta.php";

if (!$_GET) {
	header("location:todos_alunos.php");
}



$datas=$database->select('pacientes_info', "*", ["cod" => $_GET['c']]);
//die(var_dump($datas));
//separa as perguntas das respostas
$dados=explode("}{", $datas[0]['questionario']); 

//cria arrays
$perguntas = explode("%*%", $dados[0]);
$respostas = explode("%*%", $dados[1]);

//die(var_dump($dados));
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

 <?php if (isset($_GET['print'])): ?>
 	<script>
 	//quando for clicado para visualizar o registro no email
 		javascript:window.print()
 	</script>
 <?php endif ?>
 	
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
	.fl{
		width: 100%;
		text-align: right;	
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
	<div class="row top printable">
		<div class="col-md-3 col-xs-3">	
			<img src="img/logocrv.png" alt="Logotipo CRV" height="100"/>
		</div><!-- /.col-md-3 -->
		<div class="col-md-9 col-xs-9">
			Centro de Reabilitação Visual Louis Braille <br/>
			Rua Andrade Neves, 3084 Pelotas, RS <br />	 
			CEP: 96020-080 <br />	
			crvlouisbraille@gmail.com <br />	
			CNPJ: 92236249/000119 <br />	

		</div><!-- /.col-md-9 -->

	</div><!-- /.row -->
	<div id="id" class="" >
		<div class="row tac">
			<div class="col-md-9 col-xs-9">
				<b>Questionário padrão de entrevista inicial</b>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-9 col-xs-9">
				<b>Reabilitando: </b><?php echo 	$datas[0]['nome'] ?>
			</div><!-- /.col-md-12 -->
			<div class="col-md-9 col-xs-9">
				<b>Gênero: </b>
				<?php 	echo ucfirst($datas[0]['genero']); ?>
			</div>
			<div class="col-md-9 col-xs-9">
				<?php 	$time=strtotime($datas[0]['data_nasc']) ?>
				<b>Data Nascimento: </b><?php echo 	date('d/m/Y', $time); ?>
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
		foreach ($perguntas as $key => $p): ?>
		<li>
			<b>	<?php echo 	$p ?></b>
			<br />	
			<?php echo 	$respostas[$i]; ?>
		</li>
		<?php 
		$i++;
		endforeach ?>
	</ol>
	<br />	
	<br />	
	<div class="printable">
		<div class="fl">____________________________________________</div>
		<div class="fl">Assinatura Reabilitador</div><!-- /.fl --><!-- /.fl -->
	</div><!-- /.non-printable -->
</div><!-- /.content -->



<?php 	require_once "php_assets/footer.php" ?>