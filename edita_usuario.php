<?php 
$title="Editar Usuário";
require_once 'php_assets/header.php';

if ($_POST) {
	/*
	//verifica se já existe o nome de usuário
	$data=$database->select('usuarios_info', 'usuario', ["usuario"=>$_POST['usuario']]);
	if ($data) {
		echo "<h1>Nome de usuário  não disponível!</h1>";
	//cadastra se o nome de usuário estiver disponível
		die();
	}else{ */
		$database->update('usuarios_info', [
		"nome" => $_POST['nome'],
		"email" => $_POST['email'],
		"setor" => $_POST['setor'],
		"usuario" => strtolower($_POST['usuario']),
		"senha" => $_POST['senha'],
		"email_destino" => $_POST['email_destino'],
		"envia_copia" => $_POST['envia_copia']
		],["cod" => $_SESSION["cod"]]);

	//}

	//OBRIGA A REINICIAR A SESSÃO E ATUALIZAR O NOME DE USUÁRIO DA SESSÃO:
	//header("location:php_assets/sair.php");
	echo("<script>alert('Entre novamente para completar o cadastro!')</script>");
	echo("<script>window.location.href = 'php_assets/sair.php'</script>");
		//require_once 'php_assets/sair.php';
}

//@session_start();
	//busca dados do usuário na sessão atual
$data=$database->select('usuarios_info', "*",["cod" => $_SESSION["cod"]]);

	#var_dump($data);
	#die();
?>


<div class="container">
	<div class="row col-md-8">

		<h3>Editar Usuário</h3>
		<form action="" class="form-group" method="post">
			Nome Completo: <br />	
			<input type="text" class="form-control" placeholder="Nome completo" required="required" name="nome" value="<?php echo $data[0]['nome'] ?>" />
			E-mail: <br />	
			<input type="email" class="form-control" placeholder="email"  required="required" name="email" value="<?php echo $data[0]['email'] ?>"/>
			Apelido/login: <br />	
			<input type="text" class="form-control" placeholder="nome de usuario"  required="required" name="usuario" value="<?php echo $data[0]['usuario'] ?>"/>
			Senha: <br />		
			<input type="password" class="form-control" placeholder="senha"  required="required" name="senha" />
			Setor: <br />	
			<select name="setor" id="setor" class="form-control">
							<option value="info" <?php if ($data[0]['setor']=="info") echo "selected";?>>Informática</option>			
							<option value="om" <?php if ($data[0]['setor']=="om") echo "selected";?>>Orientação e Mobilidade</option>
							<option value="psi" <?php if ($data[0]['setor']=="psi") echo "selected";?>>Psicologia</option>
							<option value="tvd" <?php if ($data[0]['setor']=="tvd") echo "selected";?>>Tarefas da vida diária</option>
						</select>
			Email para envio de cópias:
			<input type="email" class="form-control" placeholder="email destino" value="centroreabilitacaovisuallb@hotmail.com"   name="email_destino" value="<?php echo $data[0]['email_destino'] ?>" />
			<div class="checkbox">	<label >
			
			<input type="checkbox" name="envia_copia" value="1" <?php if ($data[0]['envia_copia']==1){echo "checked='checked'";} ?>/>
			Enviar uma cópia dos registros para o mesmo email pessoal
			</label></div><!-- /.checkbox -->
			<div class="checkbox">	<label >
			
			<input type="checkbox" name="acesso_interativo" value="1" />
			Usar acesso interativo por padrão
			</label></div><!-- /.checkbox -->
			<input type="submit" class="btn-md btn-primary form-control" value="Salvar" />
		</form><!-- /.form-group -->
		<a href="javascript: alert('contate o administrador')" class=" tac btn-md btn-danger form-control">Apagar Usuário</a>
		<br />	
			<a href="novo_usuario.php" class="btn-md btn-warning form-control tac">Criar Novo Usuário</a>
		


	</div><!-- /.row -->
	<div class="row">
		<a href="backup.php" target="_blank">Fazer Backup do Banco de Dados</a>
	</div><!-- /.row -->
</div><!-- /.content-fluid -->

<?php 	require_once "php_assets/footer.php"; ?>