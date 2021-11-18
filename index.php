<?php 
require_once "logica_index.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login - Questionário Info</title>
	<meta name="description" content="Sistema Informatizado CRV">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<style>	
	
	.container{
		text-align: center;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
</style>

</head>
<body> 
	<div class="container">
		<div class="row col-md-6 col-centered">
			
			<h3>Acesso ao Sistema</h3>
			<form action="" method="post" <!-- onsubmit="getMessage() -->">
				<div class="row">
					<input type="text" id="usuario" placeholder="usuario" class="form-control" required="required" name="usuario" />
				</div><!-- /.row -->
				<div class="row">
					<input type="password" placeholder="senha" class="form-control" required="required" name="senha" />
				</div><!-- /.row -->
				<div class="row">
					<input type="submit" class="btn-primary btn-md form-control" value="Entrar"  />
				</div><!-- /.row -->
			</form>
			
		</div><!-- /.row -->
	</div><!-- /.content-fluid -->

</body>
</html>