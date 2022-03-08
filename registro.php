<?php 	
$title = "Registro";
require_once "php_assets/config.php";

if (!$_GET) {
	header("location:todos_alunos.php");
}



$datas=$database->select('pacientes_info', "*", ["cod" => $_GET['c']]);
//die(var_dump($datas));
//separa as perguntas das respostas
if (isset($_GET['afv']))
	$questionario = json_decode($datas[0]['afv'], true);
else
	$questionario = json_decode($datas[0]['questionario'], true);
//dump_die($questionario);
//cria arrays
$perguntas = $questionario['perguntas'];
$respostas = $questionario['respostas'];

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
			<img src="img/logo.png" alt="Logotipo CRV" height="100"/>
		</div><!-- /.col-md-3 -->
		<div class="col-md-9 col-xs-9">
			<?php echo NOME_INSTITUICAO ?> <br/>
			<?php echo ENDERECO ?> <br/>	 
			<?php echo CEP ?> <br/>
			<?php echo EMAIL_CONTATO ?> <br/>	
			<?php echo CNPJ ?> <br/>	

		</div><!-- /.col-md-9 -->

	</div><!-- /.row -->
	<?php if (isset($_GET['afv'])): ?>
	<?php 	echo renderiza_respostas($datas[0], true); ?>
	<?php else: ?>
	<?php 	echo renderiza_respostas($datas[0]); ?>
	<?php endif ?>
	<br />	
	<br />	
	<div class="printable">
		<div class="fl">____________________________________________</div>
		<div class="fl">Assinatura Reabilitador</div><!-- /.fl --><!-- /.fl -->
	</div><!-- /.non-printable -->
</div><!-- /.content -->



<?php 	require_once "php_assets/footer.php" ?>