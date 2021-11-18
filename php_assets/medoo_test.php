<?php 	

// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
//require 'vendor/autoload.php';
 
// Or if you just download the medoo.php into directory, and require it with the correct path.
require_once 'medoo.php';
 
// Initialize
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'tyu78wer_informatica',
    'server' => 'localhost',
    'username' => 'tyu78wer_user2',
    'password' => 'asfdwf2fqv22v302nv03',
    'charset' => 'utf8'
]);
 
// Enjoy
$database->insert('perguntas', [
    'pergunta' => 'foo'
    
]);



 ?>