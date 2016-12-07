<?php 	
/*
usage:

<?php 	
$title="Editar Usuário";
require_once 'php_assets/header.php';
 ?>
*/

require_once "php_assets/verifica_sessao.php";
require_once 'php_assets/conecta.php';
 ?>

 <!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo 	$title ?> - Questionário Info</title>
	<meta name="description" content="curso de bootstrap 3">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>