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


$datas = $database->select('perguntas', ["pergunta","tipo"], ["ORDER" => "ordem"]);



if ($_POST) {
	require_once "nova_avaliacao_controller.php";

} else {
	//FAZ OUTRA BUSCA NO BANCO: GAMBIARRA POR CAUSA DOS INDES 'COD' E 'PERGUNTA' ABAIXO
	$datas = $database->select('perguntas', "*", ["ORDER" => "ordem"]);
	//var_dump($datas);
	//die();
?>

	<div class="content">
		<div class="row col-md-8">
			<h3>Nova Avaliação</h3>
			<form action="" method="post">
				<label for="nome">Nome COMPLETO do Reabilitando</label>
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
					<option value="info">Informática</option>
					<option value="om">Orientação e Mobilidade</option>
					<option value="psi">Psicologia</option>
					<option value="tvd">Tarefas da vida diária</option>
				</select>
				<br />
				<label for="data">Data da avaliação</label>
				<input id="data" type="date" placeholder="dd/mm/aaaa" value="<?php echo date('Y-m-d'); ?>" class="form-control" required="required" name="data" />

				<ol>
					<?php
					$i = 0;
					foreach ($datas as $data) {
					?>

						<?php if ($data['tipo'] == 'title') : ?>
							<h2><?php echo $data['pergunta']; ?></h2>
							<textarea id="<?php echo $data['cod']; ?>" name="resposta[]" class="form-control" cols="5" rows="5" style="display: none;"></textarea>

						<?php elseif ($data['tipo'] == 'checkbox') : ?>
							<li>
								<label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label> <br>
								<?php foreach (explode(',', $data['opcoes']) as $opcao) : ?>
									<input type="checkbox" name="resposta[<?php echo $i ?>][]" value=" <?php echo $opcao ?>"> <?php echo $opcao ?> <br>
								<?php endforeach ?>
							</li>
						<?php elseif ($data['tipo'] == 'radio') : ?>
							<li>
								<label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label> <br>
								<?php foreach (explode(',', $data['opcoes']) as $opcao) : ?>
									<input type="radio" name="resposta[<?php echo $i ?>]" value=" <?php echo $opcao ?>"> <?php echo $opcao ?> <br>
								<?php endforeach ?>
							</li>
						<?php else : ?>
							<li>
								<label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label>
								<textarea id="<?php echo $data['cod']; ?>" name="resposta[<?php echo $i ?>]" class="form-control" cols="5" rows="5"></textarea>
							</li>
						<?php endif ?>


					<?php
					$i++;
					}
					?>

				</ol>
				<!-- demais perguntas -->

				<div class="row">


				</div><!-- /.row -->
		</div><!-- /.content -->
		<div class="row">
			<input type="submit" class="btn-primary btn-md form-control" value="Enviar" />

		</div><!-- /.row -->
		</form>

	</div><!-- /.row -->
	<div>

	</div>

<?php

}



require_once "php_assets/footer.php"; ?>