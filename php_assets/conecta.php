<?php 

require_once "php_assets/env.php";

if ($env=="dev") { //configurações Desenvolvimento
	$user="root";
	$pass="";
	$dbname="questionario_info_braille";
}else{ //configurações produção
	$user="491572";
	$pass="491572";
	$dbname="491572";
}


// inclui o framework de DB Medoo
require_once 'medoo.php';
 
// Inicialização
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => $dbname,
    'server' => 'localhost',
    'username' => $user,
    'password' => $pass,
    'charset' => 'utf8'
]);

 ?>