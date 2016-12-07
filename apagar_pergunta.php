<?php 	

require_once 'php_assets/conecta.php';

if ($_GET) {
	$database->delete('perguntas', ["cod" => $_GET['c']]);

}

header("location:gerencia_perguntas.php");
 ?>