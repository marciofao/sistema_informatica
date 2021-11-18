<?php 
$title=" Usuário";
require_once 'php_assets/conecta.php';

if ($_GET) {
	
	$database->update('pacientes_info', [
		"ativo" => 0],["cod" => $_GET["c"]]);

	//die($_GET['t']);
	if ($_GET['t']) { //se partiu de meus alunos
		header("location:todos_alunos.php?m=1"); 
	}else{
		header("location:todos_alunos.php");
	}
	
}else{
	header("location:inicio.php");
}
