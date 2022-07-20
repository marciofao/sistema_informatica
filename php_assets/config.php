<?php 
// No servidor sempre carregar o arquivo env com a variavel trocada para "prod"
// Na máquina local deixar o mesmo arquivo com a variavel definida como "dev"
$env="dev"; // dev - prod


//DADOS GERAIS DA INSTITUIÇÃO
define('NOME_INSTITUICAO', 'Nome Instiruicao');
define('ENDERECO', 'Endereco da Instiruicao');
define('CEP', '00000-000');
define('EMAIL_CONTATO', 'email@example.com');
define('CNPJ', '999999999');

//LIMITE TEMPO DE SESSÃO
define('SESSION_TIMEOUT', 10800); //3600 = 1 hora

//ARRAY DE SETORES
$setores_config = array(
	
	"Acolhimento",
	"AVD",
	"Braille",
	"EP",
	"Fisioterapia",
	"Informática",
	"Música",
	"Psicologia",
	"Serviço social",
	"Outro"

);


//CONFIGURE AQUI AS VARIAVEIS DO AMBIENTE DE PRODUÇÃO
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


//CONFIGURE AQUI AS VARIÁVEIS DO AMBIENTE DE DESENVOLVIMENTO
if ($env=="dev") {
	$user="root";
	$pass="";
	$dbname="sistema_informatica";
	$url_serv="http://localhost/sistema_informatica/";
	//usado para o envio de emails
	$email_domain = "localhost.com";
	$email_user = "sistema";
}


//---- NAO EDITAR DAQUI PARA BAIXO ----//


//carrega utilitarios
require_once "php_assets/tools.php"; 


// Para facilitar o acesso ao banco de dados E segurança, este projeto utiliza o framework Medoo 
// https://medoo.in/api/
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


// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', SESSION_TIMEOUT);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(SESSION_TIMEOUT); 


	?>