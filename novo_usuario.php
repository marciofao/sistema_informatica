<?php 	
$title = "Novo Usuário "
require_once 'php_assets/header.php';

if ($_POST) {
	

	$data=$database->select('usuarios', 'usuario', ["usuario"=>$_POST['usuario']]);
	if ($data) {
		echo "<h1>	Usuário já cadastrado!</h1>";
	}else{
		$database->insert('usuarios', [
			'usuario' => $_POST['usuario'],
			'senha' => $_POST['senha']
			]);

		//echo "sucesso!";
		header("location:inicio.php");
	}


}else{
	?>


	
		<div class="container">
			<div class="row col-md-3">

				<h3>Cadastrar novo usuário no Sistema</h3>
				
				<form action="	" class="form-group" method="post">
					<input type="text" class="form-control" placeholder="nome de usuario" required="required" name="usuario" />
					
					<input type="passowrd" class="form-control" placeholder="senha"  required="required" name="senha" />
					
					<input type="submit" class="btn-md btn-primary form-control" value="cadastrar" />
				</form><!-- /.form-group -->


			</div><!-- /.row -->
		</div><!-- /.content-fluid -->

		

	<?php 	} 

require_once "php_assets/footer.php";
	?>