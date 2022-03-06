<?php 	

require_once 'php_assets/config.php';
//die();
if ($_GET) {
	$database->delete('atendimentos_pacientes', ["cod_atendimento" => $_GET['c']]);
//die(var_dump($database));
	header("location:edita_registro_atendimentos.php?c=".$_GET['d']."&m=1");
}else{
	header("location:inicio.php");

}


 ?>