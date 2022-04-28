<?php



$title = "Nova Avaliação";
require_once 'php_assets/header.php';





//die($url_serv);
//die($email_count);

//EXIGE NOME DO AVALIADOR PARA REALIZAR O CADASTRO
if ($_SESSION['nome'] == "") {
?>
	<script>
		alert("Complete o seu cadastro de usuário antes de continuar!");
		window.location.href = "edita_usuario.php";
	</script>

<?php


	require_once "php_assets/footer.php";
	die();
}

if (isset($_GET['afv']))
	$perguntas = $database->select('perguntas', "*", ["cod_questionario"  => 2, "ORDER" => "ordem"]);
else
	$perguntas = $database->select('perguntas', "*", ["cod_questionario"  => 1, "ORDER" => "ordem"]);


if ($_POST) {
	require_once "nova_avaliacao_controller.php";
}
?>

<div class="content">
	<div class="row col-md-8">
		<h3>
			<?php if (isset($_GET['afv'])) : ?>
				Nova Avaliação Funcional da Visão
			<?php else : ?>
				Nova Avaliação Inicial
			<?php endif ?>
		</h3>
		<form action="" method="post">
			<?php if (!isset($_GET['afv'])) : ?>
				<label for="nome">Nome COMPLETO do Usuário</label>
				<!--campo nome valida existência de espaços -->
				<input id="nome" type="text" placeholder="Nome completo" pattern="^(.*\s+.*)+$" class="form-control" required="required" name="nome" oninvalid="this.setCustomValidity('Insira o nome completo por favor')" oninput="this.setCustomValidity('')" />
				<label for="data_nasc">Data Nascimento</label>
				<input id="data_nasc" type="date" placeholder="" class="form-control" required="required" name="data_nasc" />
				<label for="genero">Gênero: </label> <br />
				<input value="masculino" type="radio" required="required" name="genero" aria-label="Genêro Masculino" />Masculino
				<input value="feminino" type="radio" name="genero" aria-label="Genêro Feminino" />Feminino
				<br />
				<label for="nao_enviar">
					<input type="checkbox" name="nao_enviar" value="1" aria-label="Cadastrar aluno e questionário sem enviar email" />Cadastrar aluno e questionário sem enviar email
				</label>
				<br />
				<select name="setor" id="setor" class="form-control">
				<?php foreach ($setores_config as $s) : ?>
					<option value="<?php echo $s ?>"><?php echo $s ?></option>
				<?php endforeach ?>
			</select>
			<br />
			<label for="data">Data da avaliação</label>
			<input id="data" type="date" placeholder="dd/mm/aaaa" value="<?php echo date('Y-m-d'); ?>" class="form-control" required="required" name="data" />

			<?php endif ?>

			
			
			<?php render_form_edit($perguntas) ?>


			<div class="row">


			</div><!-- /.row -->
	</div><!-- /.content -->
	<div class="row">
		<input type="submit" class="btn-primary btn-md form-control" value="Salvar" />

	</div><!-- /.row -->
	</form>

</div><!-- /.row -->
<div>

</div>

<?php





require_once "php_assets/footer.php"; ?>