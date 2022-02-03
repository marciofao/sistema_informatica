<?php 

require_once "php_assets/env.php";
//incorpora a variavel env que define se está em ambiente de produção ou desenvolvimento
// No servidor sempre carregar o arquivo env com a variavel trocada para "prod"
// Na máquina local deixar o mesmo arquivo com a variavel definida como "dev"



if ($env=="dev") {
	$user="root";
	$pass="";
	$dbname="questionario_info_braille";
	$url_serv="http://localhost/questionario/";
	//usado para o envio de emails
	$email_domain = "localhost.com";
	$email_user = "sistema";
}


if ($env=="prod") {
	$user="user";
	$pass="pass";
	$dbname="dbname";
	//usar domínio e localização do sistema
	$url_serv="https://yoursite.org.br/sistema_informatica/"; 
	//usado para o envio de emails
	$email_domain = "yoursite.org.br";
	$email_user = "sistema";
}




// Para facilitar o acesso ao banco de dados este projeto utiliza o framework Medoo 
// https://medoo.in/api/
require_once 'medoo.php';

// Initialize
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => $dbname,
	'server' => 'localhost',
	'username' => $user,
	'password' => $pass,
	'charset' => 'utf8'
	]);

	?>
