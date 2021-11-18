<?php 
$title="Editar Usuário";
require_once 'php_assets/header.php';

if ($_GET) {
	
		$database->update('pacientes_info', [
		"ativo" => 1],["cod" => $_GET["c"]]);


	header("location:ver_registros_excluidos.php");
}else{
	header("location:ver_registros_excluidos.php");
}
