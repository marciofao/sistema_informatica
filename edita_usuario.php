<?php 
$title="Editar Usuário";
require_once 'php_assets/header.php';

if ($_POST) {
	/*
	//verifica se já existe o nome de usuário
	$data=$database->select('usuarios', 'usuario', ["usuario"=>$_POST['usuario']]);
	if ($data) {
		echo "<h1>Nome de usuário  não disponível!</h1>";
	//cadastra se o nome de usuário estiver disponível
		die();
	}else{ */
		$database->update('usuarios', [
		"nome" => $_POST['nome'],
		"email" => $_POST['email'],
		"usuario" => $_POST['usuario'],
		"senha" => $_POST['senha'],
		"email_destino" => $_POST['email_destino'],
		"envia_copia" => $_POST['envia_copia']
		],["cod" => $_SESSION["cod"]]);

	//}

	//OBRIGA A REINICIAR A SESSÃO E ATUALIZAR O NOME DE USUÁRIO DA SESSÃO:
	header("location:php_assets/sair.php");
	//header("location:edita_usuario.php");
}

//@session_start();
	//busca dados do usuário na sessão atual
$data=$database->select('usuarios', "*",["cod" => $_SESSION["cod"]]);

	#var_dump($data);
	#die();
?>


<div class="container">
	<div class="row col-md-3">

		<h3>Editar Usuário</h3>
		<form action="" class="form-group" method="post">
			<input type="text" class="form-control" placeholder="Nome completo" required="required" name="nome" value="<?php echo $data[0]['nome'] ?>" />
			<input type="email" class="form-control" placeholder="email"  required="required" name="email" value="<?php echo $data[0]['email'] ?>"/>
			<input type="text" class="form-control" placeholder="nome de usuario"  required="required" name="usuario" value="<?php echo $data[0]['usuario'] ?>"/>
			<input type="password" class="form-control" placeholder="senha"  required="required" name="senha" />
			<input type="email" class="form-control" placeholder="email destino"  required="required" name="email_destino" value="<?php echo $data[0]['email'] ?>" />
			<div class="checkbox">	<label >
			<input type="checkbox" name="envia_copia" value="1" <?php if ($data[0]['envia_copia']==1){echo "checked='checked'";} ?>/>
			Enviar Cópia do questionário para e-mail pessoal
			</label></div><!-- /.checkbox -->
			<input type="submit" class="btn-md btn-primary form-control" value="Salvar" />
		</form><!-- /.form-group -->
		<a href="excluir_usuario" class="btn-md btn-danger form-control">Apagar Usuário</a>


	</div><!-- /.row -->
</div><!-- /.content-fluid -->

<?php 	require_once "php_assets/footer.php"; ?>