<?php 
@session_start(); // Inicializa a sessão

//se a sessão estiver iniciada encaminha para o inicio
if (isset($_SESSION["usuario"]))
{
	header("location: inicio.php?c=1");
}

//verifica credenciais
if ($_POST) {
	require_once 'php_assets/conecta.php';

	$data=$database->select('usuarios', '*', ["usuario"=>$_POST['usuario']]);

	//var_dump($data); die();

	if ($data) { //se existir o usuario

		//verifica se a senha esta correta
		if ($data[0]['senha']==$_POST['senha']) {
			
			//configura sessão
			
			
			$_SESSION["cod"]=$data[0]['cod'];
			$_SESSION["usuario"]=$data[0]['usuario'];
			$_SESSION["nome"]=$data[0]['nome'];
			//die($_SESSION['nome']);
			header("location:inicio.php");
		}
		
	}
	echo "<h1>Senha inválida!</h1>";

}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login - Questionário Info</title>
	<meta name="description" content="curso de bootstrap 3">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<style>	
		#freewha, frame, iframe{
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row col-md-3">
			
				<h3>Acesso ao Sistema</h3>
				<form action="" method="post">
					<div class="row">
						<input type="text" placeholder="usuario" class="form-control" required="required" name="usuario" />
					</div><!-- /.row -->
					<div class="row">
						<input type="password" placeholder="senha" class="form-control" required="required" name="senha" />
					</div><!-- /.row -->
					<div class="row">
						<input type="submit" class="btn-primary btn-md form-control" value="Entrar" />
					</div><!-- /.row -->
				</form>
			
		</div><!-- /.row -->
	</div><!-- /.content-fluid -->

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>