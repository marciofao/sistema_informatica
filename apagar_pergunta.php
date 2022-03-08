<?php 	

require_once 'php_assets/config.php';

if ($_GET) {
	$database->delete('perguntas', ["cod" => $_GET['c']]);

}

isset($_GET['afv'])? $afv = '?afv' : $afv = '';

header("location:gerencia_perguntas.php".$afv);
 ?>