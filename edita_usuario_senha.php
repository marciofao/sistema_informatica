<?php 
require_once "php_assets/verifica_sessao.php";
require_once "php_assets/config.php";

//se nao admin
if ($_SESSION["user_level"] != 1) die('Acesso negado');



if($_POST){
    //se login = admin, cancela
    if($_SESSION["usuario"]==$_POST['login']) die('Você não pode alterar sua propria senha aqui');


    //verifica se existe
    $data=$database->select('usuarios_info', '*', ["usuario"=>$_POST['login']])[0];

	if ($data) { //se existir o usuario
		
	
			$user_cod=$data['cod'];
    }else{
        die('Usuário '.$_POST['login'].' não encontrado!');
    }
    //atualiza senha
    $database->update('usuarios_info', [
		
		"senha" => $_POST['senha'],
		
	], ["cod" => $user_cod]);

    ?>
    <script>
        //retorna para a tela de edicao
        alert('Senha atualizada');
        window.location.href = 'edita_usuario.php';
    </script>
    <?php
     die; //e morreu

}
?>

<form method="post">
<label for="login">Login de usuário:</label><br>
<input name='login' required> <br>
<label for="senha">Nova Senha:</label><br>
<input name='senha' type="password" required> <br>
<input type="submit" value="Atualizar senha">
</form>



