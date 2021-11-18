<?php 	

$title = "Editar Turmas";
if ($_GET) {$title = "Meus Alunos";}
//usage: todos_alunos.php?m=1
require_once "php_assets/header.php";
require_once "salvar_turma.php";
$edita='';
$datas=$database->select('pacientes_info', ["cod","nome", "data"], [
	"AND" => [
		"cod_avaliador" => $_SESSION["cod"],
		"ativo" => 1,
	],
	"ORDER" => ["nome" => "DESC"]]);
	?>
	<form method="post">
		Horário: <br>	
		<input name="hora" maxlength="2" type="number" class="time" aria-label="Hora" value="08"> : 
		<input name="minuto" type="number" maxlength="2" class="time" aria-label="Minutos" value="00">
		<br>
		<br>	

		<h3 aria-label="Utilize a tecla tab para pular pelos dias">
			Dias: 
		</h3>
		<div class="dias">
			<div >

				<input type="checkbox" name="seg" value="1" aria-label="segunda">
				Seg
			</div>

			<div>
				<input type="checkbox" name="ter" value="1" aria-label="Terça">
				Ter
			</div>
			<div>
				<input type="checkbox" name="qua" value="1" aria-label="Quarta">
				Qua
			</div>
			<div>
				<input type="checkbox" name="qui" value="1" aria-label="Quinta">
				Qui
			</div>
			<div>
				<input type="checkbox" name="sex" value="1" aria-label="Sexta">
				Sex
			</div>			
		</div>
		<div>
			Marque os alunos a fazer parte da turma:<br>
			<a href="#" class="acessibilidade">Dica: Utilize a tecla tab</a>
			<?php foreach ($datas as $data): ?>
				<input type="checkbox" name="alunos[]" value="$data['cod']" aria-label="<?php echo	$data['nome']; ?> ">
				<?php echo	$data['nome']; ?> <br>
			<?php endforeach ?>
			<button type="submit">Salvar</button>
		</div>
	</form>