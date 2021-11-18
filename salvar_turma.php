<?php 	

if ($_POST) {
	$cod_insert=$database->insert('turmas_info', [
		'cod_reabilitador' => $_SESSION["cod"],
		'hora' => $_POST['hora'].':'.$_POST['minuto'],
		'seg' => $_POST['seg'],
		'ter' => $_POST['ter'],
		'qua' => $_POST['qua'],
		'qui' => $_POST['qui'],
		'sex' => $_POST['sex']
	]);

	foreach ($_POST['alunos'] as $key => $value) {
		$database->insert('turma_aluno', [
				'cod_turma' => $cod_insert,
				'cod_aluno' => $key
			]);
	}
}
header("location: listar_turmas.php")
?>

