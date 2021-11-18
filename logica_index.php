<?php 


@session_start(); // Inicializa a sessão

//se a sessão estiver iniciada encaminha para o inicio
if (isset($_SESSION["usuario"]))
{
	header("location:inicio.php?c=1");
}

//verifica credenciais
if ($_POST) {
	$usuario=strtolower($_POST['usuario']);
	require_once 'php_assets/conecta.php';
	//var_dump($_POST); die();

	$data=$database->select('usuarios_info', '*', ["usuario"=>$usuario]);
	//var_dump($database); die();
	//var_dump($data); die();

	if ($data) { //se existir o usuario

		//verifica se a senha esta correta
		if ($data[0]['senha']==$_POST['senha']) {
			
			//configura sessão
			
			
			$_SESSION["cod"]=$data[0]['cod'];
			$_SESSION["usuario"]=$data[0]['usuario'];
			$_SESSION["nome"]=$data[0]['nome'];
			$_SESSION["email"]=$data[0]['email'];
			$_SESSION["email_destino"]=$data[0]['email_destino'];
			$_SESSION["envia_copia"]=$data[0]['envia_copia'];
			//die($_SESSION['nome']);

			//CRIA REGISTRO DE ULTIMO ACESSO
			
			header("location:inicio.php");
		}
		
	}
	echo '<script>window.alert("Usuário ou senha incorretos!")</script>';

}


?>