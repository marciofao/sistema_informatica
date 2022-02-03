<?php 	

// teste simples para verificar o funcionamento do Framqeork de banco de dados Medoo

require_once 'medoo.php';
 
// Initialize
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'db_name',
    'server' => 'localhost',
    'username' => 'username',
    'password' => 'pass',
    'charset' => 'utf8'
]);
 
// Enjoy
$database->insert('perguntas', [
    'pergunta' => 'foo'
    
]);



 ?>
