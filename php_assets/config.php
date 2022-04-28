<?php 

require_once "php_assets/env.php";
//incorpora a variavel env que define se está em ambiente de produção ou desenvolvimento
// No servidor sempre carregar o arquivo env com a variavel trocada para "prod"
// Na máquina local deixar o mesmo arquivo com a variavel definida como "dev"

require_once "php_assets/tools.php"; //carrega utilitarios

define('NOME_INSTITUICAO', 'Nome Instiruicao');
define('ENDERECO', 'Endereco da Instiruicao');
define('CEP', '00000-000');
define('EMAIL_CONTATO', 'email@example.com');
define('CNPJ', '999999999');




if ($env=="dev") {
	$user="root";
	$pass="";
	$dbname="sistema_informatica";
	$url_serv="http://localhost/sistema_informatica/";
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



$setores_config = array(
	"Acolhimento",
	"Biblioteca",
	"Fisioterapia",
	"Serviço social",
	"Web Radio",
);


	?>
