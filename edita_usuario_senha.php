<?php 
require_once "php_assets/verifica_sessao.php";
require_once "php_assets/config.php";

//se nao admin
if ($_SESSION["user_level"] != 1) die('Acesso negado');



if($_POST){
    //se login = admin, cancela
    if($_SESSION["usuario"]==$_POST['login']) die('Você não pode alterar sua propria senha aqui');


    //verifica se existe pelo login ou email
    $data=$database->select('usuarios_info', '*', [
        "OR" => [
            "usuario"=>$_POST['login'],
            "email"=>$_POST['login']
            ]
    ])[0];



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

<title>Mudar senha de Profissional</title>

<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/custom.css" />


<form method="post" class="form-control simple-form">
<label for="login">Login ou email do profissional:</label><br>
<input name='login' required class="form-control"> <br>
<label for="senha">Nova Senha:</label><br>
<input name='senha' type="password" required class="form-control"> <br>
<input type="submit" value="Atualizar senha" class="form-control btn-primary">
</form>



