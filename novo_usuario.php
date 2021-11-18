<?php 	
$title = "Novo Usuário";
require_once 'php_assets/header.php';

if ($_POST) {
	

	$data=$database->select('usuarios_info', 'usuario', ["usuario"=>$_POST['usuario']]);
	if ($data) {
		?>
		<script>
			alert("Já existe um usuário com o mesmo nome de acesso!");
			window.location.href = "novo_usuario.php";
		</script>
		<?
	}else{
		$database->insert('usuarios_info', [
			'usuario' => $_POST['usuario'],
			'senha' => $_POST['senha']
		]);

		//echo "sucesso!";

		?>
		<script>
			alert("Usuário cadastrado!");
			window.location.href = "inicio.php";
		</script>
		<?php
	//	echo("<script>location.href = '"inicio.php");
	}


}else{
	?>


	
	<div class="container">
		<div class="row col-md-3">

			<h3>Cadastrar novo usuário no Sistema</h3>

			<form action="	" class="form-group" method="post">
				<input type="text" class="form-control" placeholder="nome de usuario" required="required" name="usuario" />

				<input type="password" class="form-control" placeholder="senha"  required="required" name="senha" />

				<input type="submit" class="btn-md btn-primary form-control" value="cadastrar" />
			</form><!-- /.form-group -->


		</div><!-- /.row -->
	</div><!-- /.content-fluid -->



<?php 	} 

require_once "php_assets/footer.php";
?>