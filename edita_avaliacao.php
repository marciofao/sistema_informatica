<?php


$email_count = 0; //conta quantos emails foram enviados

//die($url_serv);
//die($email_count);

$title = "Editar Avaliação";
require_once 'php_assets/header.php';

//SE NÁO FOR PASSADO NENHUM CÓDIGO VOLTA PARA REGISTROS
if ($_GET['c'] == "") {
	header("location:todos_alunos.php");

	require_once "php_assets/footer.php";
	die();
}

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





if ($_POST) {

	$paciente = $database->select('pacientes_info', "*", ["cod" => $_GET['c']]);
	//dump_die($paciente[0]['questionario']);
	if (isset($_GET['afv']))
		$questionario = json_decode($paciente[0]['afv'], true);
	else
		$questionario = json_decode($paciente[0]['questionario'], true);

	$perguntas = $questionario['perguntas'];

	$respostas = array();
	$i = 0;
	foreach ($_POST['resposta'] as $r) {
		if ($perguntas[$i]['tipo'] == 'checkbox') {
			$respostas[] = explode(',', $r);
		} else {
			$respostas[] = $r;
		}
		$i++;
	}
	//dump_die($questionario);
	$questionario['respostas'] = $respostas;

	//dump_die($questionario);
	$questionario = json_encode($questionario);




	if (isset($_GET['afv'])) {
		$ul_cod = $database->update('pacientes_info', [
			'afv' =>  $questionario
		], ["cod" => $_GET["c"]]);
	?>
		<script>
			alert('Avaliação registrada com sucesso!')
			window.location.href = "todos_alunos.php?m=1";
		</script>
	<?php
		die();
	} else {
		$ul_cod = $database->update('pacientes_info', [
			'questionario' =>  $questionario
		], ["cod" => $_GET["c"]]);	
	}

	echo "<h1>Avaliação registrada com sucesso</h1>";

	$ultimo_paciente = $database->select('pacientes_info', "*", ["cod" => $ul_cod]);
	//pega dados do usuário atual
	$data = $database->select('usuarios_info', '*', ['cod' => $_SESSION["cod"]]);

	//die();
	function envia_email($email, $ul_cod, $reabilitando_data, $url_serv, $email_domain, $email_user) {


		//ENVIO DE EMAIL:


		//die(var_dump($_SESSION));
		//	die(var_dump($data));
		$headers = "From: " . $email_user . "@" . $email_domain . "\r\n";
		$headers  .= "MIME-Version: 1.0 \r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		//echo $header;
		//die();
		$to = $email;
		$subject = "Avaliação Informática (Correção)";
		$url = "<a href='" . $url_serv . "registro.php?c=" . $ul_cod . "&print=1'>Imprimir</a>";
		$url = "<a href='" . $url . "'>" . $url . "</a>";
		//die($url);

		$body = "clique no link para visualizar e imprimir o questionário:<br>";
		$body .= htmlentities($url);

		$body .= renderiza_respostas($reabilitando_data);

		//dump_die($body);

		if (!mail($to, $subject, $body, $headers)) {

			echo "<h1>Houve um erro, o email não pode ser enviado.</h1>";
			die(var_dump(error_get_last()));
		} else {
			echo "<h1>Email Enviado!</h1>";
		}
	} // envia_email()
	$datas = $database->select('pacientes_info', "*", ["cod" => $_GET['c']]);

	//EFETUA ENVIO DE EMAIL
	if (!isset($_POST['nao_enviar'])) {

		if ($_SESSION["email_destino"] != '') {
			envia_email($_SESSION["email_destino"], $ul_cod, $datas[0], $url_serv, $email_domain, $email_user);
		}

		if ($data[0]['envia_copia'] == '1') {
			envia_email($data[0]['email'], $ul_cod, $datas[0], $url_serv, $email_domain, $email_user);
		}
	}

	?>

	<script>
		alert("Qestionário Corrigido!");
		<?php
		if (isset($_POST['nao_enviar'])) {
			echo "alert('Email não enviado');";
		}
		?>
		window.location.href = "todos_alunos.php?m=1";
	</script>

<?php

	require_once "php_assets/footer.php";
	die();

	//echo("<script>location.href = '"inicio.php");
}



//var_dump($datas);
//die();
?>

<?php

$datas = $database->select('pacientes_info', "*", ["cod" => $_GET['c']]);

if (isset($_GET['afv']))
	$questionario = json_decode($datas[0]['afv'], true);
else
	$questionario = json_decode($datas[0]['questionario'], true);
//separa as perguntas das respostas
//cria arrays
$perguntas = $questionario['perguntas'];
$respostas = $questionario['respostas'];

//die(var_dump($questionario));

?>

<div class="row col-md-6">

	<h3>Editar Avaliação</h3>
	<form method="post">
		<div>
			<?php isset($_GET['afv'])? $afv = '&afv' : $afv = '';  ?>
			<a target="_blank" href="registro.php?c=<?php echo($datas[0]['cod'].$afv) ?>&print=1">Imprimir</a>
		</div>
		<?php if (!isset($_GET['afv'])) : ?>
			<label for="nao_enviar">
				<input type="checkbox" name="nao_enviar" value="1" aria-label="Cadastrar aluno e questionário sem enviar email" />Editar aluno e questionário sem enviar email
			</label>
			<br />
		<?php endif ?>

		<input type="text" style="display: none" name="avaliador" value="<?php echo $datas[0]['avaliador'] ?>" />

		<ol>
			<?php
			$i = 0;

			//dump_die($perguntas);
			foreach ($perguntas as $pp) {
				$p = $pp['pergunta'];

				if ($pp['tipo'] == 'title') {
			?>
					<h2><?php echo $p; ?></h2>
					<textarea name="resposta[]" style="display: none;"></textarea>

				<?php
				} else {
				?>
					<li>
						<label for="<?php echo $i; ?>"><?php echo $p; ?></label>
						<input type="text" style="display: none" name="pergunta[]" value="<?php echo $p ?>" />
						<textarea id="<?php echo $i; ?>" name="resposta[]" class="form-control" cols="5" rows="5"><?php echo ($pp['tipo'] == 'checkbox') ? implode(',', $respostas[$i]) : $respostas[$i] ?></textarea>
					</li>
			<?php
				}

				$i++;
			}
			?>

		</ol>
		<!-- demais perguntas -->

		<div class="row">


		</div><!-- /.row -->
		<div class="row">
			<input type="submit" class="btn-primary btn-md form-control" value="Enviar" />

		</div><!-- /.row -->

	</form>

</div><!-- /.row -->

<?php require_once "php_assets/footer.php"; ?>