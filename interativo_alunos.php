<?php 	

$title = "Todos os usuários";
$editar=0;
if ($_GET) {$title = "Meus usuários"; $editar=1;}
//usage: todos_alunos.php?m=1
require_once "php_assets/config.php";
require_once "php_assets/verifica_sessao.php";

if ($_GET) {
	$datas=$database->select('pacientes_info', ["cod","nome", "data"], [
		"AND" => [
			"cod_avaliador" => $_SESSION["cod"],
			"ativo" => 1,
		],
		"ORDER" => ["data" => "ASC"]

	]);
}else{
	$datas=$database->select('pacientes_info', ["cod","nome", "data"], ["ativo" => 1, "ORDER" => "data"]);	
}


?>
Qual aluno?
<br />

<?php foreach ($datas as $data): ?>
					
				<a  href="edita_registro_atendimentos.php?c=<?php echo $data['cod']; ?>&e=<?php echo $editar ?>"><?php 	echo $data['nome']; ?>
				<br />



				<?php endforeach ?>

<a href="ver_registros_excluidos.php">Ver Excluídos</a>


	
<div>

<?php 	require_once "php_assets/footer.php" ?>