<?php 


@session_start(); // Inicializa a sessão

//se a sessão estiver iniciada encaminha para o inicio
if (isset($_SESSION["usuario"])) header("location:inicio.php?c=1");


//verifica credenciais
if ($_POST) {
	$usuario=strtolower($_POST['usuario']);
	require_once 'php_assets/config.php';
	//var_dump($_POST); die();

	$data=$database->select('usuarios_info', '*', ["usuario"=>$usuario]);
	//var_dump($database); die();
	//var_dump($data); die();

	if ($data) { //se existir o usuario

		$data = $data[0];
		//dump_die($data);
		//verifica se a senha esta correta
		if ($data['senha']==$_POST['senha']) {
			
			//configura sessão
			
			
			$_SESSION["cod"]=$data['cod'];
			$_SESSION["usuario"]=$data['usuario'];
			$_SESSION["nome"]=$data['nome'];
			$_SESSION["email"]=$data['email'];
			$_SESSION["email_destino"]=$data['email_destino'];
			$_SESSION["envia_copia"]=$data['envia_copia'];
			$_SESSION["user_level"]=$data['user_level'];
			//die($_SESSION['nome']);

			//CRIA REGISTRO DE ULTIMO ACESSO
			
			header("location:inicio.php");
		}
		
	}
	echo '<script>window.alert("Usuário ou senha incorretos!")</script>';

}


?>