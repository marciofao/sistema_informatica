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

	$perguntas = implode('%*%', $_POST['pergunta']);
	$respostas = implode('%*%', $_POST['resposta']);


	//ADICIONA ASSINATURA DE EDIÇÃO
	//	$perguntas = $perguntas."%*%Correção do questionário:";
	//	$respostas = $respostas."%*%".$_SESSION['nome']." em ".date('d-m-Y');

	//	echo(var_dump($perguntas));
	//	echo(var_dump($respostas));
	//	die();


	//die($_SESSION["nome"]);
	//die(var_dump($_POST));
	//die( $perguntas.'}{'.$respostas);

	$questionario = $perguntas . '}{' . $respostas;

	$ul_cod = $database->update('pacientes_info', [
		'nome' => $_POST['nome'],
		'data' => $_POST['data'],
		'data_nasc' => $_POST['data_nasc'],
		'genero' => $_POST['genero'],
		'questionario' =>  $questionario
	], ["cod" => $_GET["c"]]);

	//die(var_dump($questionario));		
	//die(var_dump($database->error()));

	//resulta em $perguntas]}{[$respostas

	#respostas = "pergunta,pergunta}{resposta,resposta"
	//echo "sucesso!";
	echo "<h1>Avaliação registrada com sucesso</h1>";
	//$ul_cod contem o cod do ultimo registro adicionado
	//BUSCA AS PERGUNTAS E RESPOSTAS RECÉM INSERIDAS:	
	$ultimo_paciente = $database->select('pacientes_info', "*", ["cod" => $ul_cod]);
	//pega dados do usuário atual
	$data = $database->select('usuarios_info', '*', ['cod' => $_SESSION["cod"]]);

	//die();
	function envia_email($email, $ul_cod, $data, $datas, $url_serv)
	{




		//separa as perguntas das respostas
		$dados = explode("}{", $datas[0]['questionario']);

		//cria arrays
		$perguntas = explode("%*%", $dados[0]);
		$respostas = explode("%*%", $dados[1]);

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

		$body .= "<br><br><b>Questionário padrão de entrevista inicial</b><br>";
		$body .= "<b>Reabiliando: </b>" . $datas[0]['nome'] . "<br>";
		$body .= "<b>Reabilitador: </b>" . $datas[0]['avaliador'] . "<br>";
		//MONTA O RESTANTE DO EMAIL COM AS PERGUNTAS E RESPOSTAS
		$body .= "<ol>";

		$i = 0;
		foreach ($perguntas as $key => $p) :
			$body .= "<li><b>" . $p . "</b><br/>" . $respostas[$i] . "</li>";
			$i++;
		endforeach;
		$body .= "</ol>";



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
			envia_email($_SESSION["email_destino"], $ul_cod, $data, $datas, $url_serv);
		}

		if ($data[0]['envia_copia'] == '1') {
			envia_email($data[0]['email'], $ul_cod, $data, $datas, $url_serv);
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
//separa as perguntas das respostas
$dados = explode("}{", $datas[0]['questionario']);

//cria arrays
$perguntas = explode("%*%", $dados[0]);
$respostas = explode("%*%", $dados[1]);

//die(var_dump($datas));

?>

<div class="row col-md-6">

	<h3>Editar Avaliação</h3>
	<form action="" method="post">
		<div>
			<a target="_blank" href="registro.php?c=<?php echo $datas[0]['cod']; ?>&print=1">Imprimir</a>
		</div>
		<label for="nome">Nome do Reabilitando</label>
		<!--campo nome valida existência de espaços -->
		<input id="nome" type="text" placeholder="Nome completo" value="<?php echo $datas[0]['nome']; ?>" pattern="^(.*\s+.*)+$" class="form-control" required="required" name="nome" />
		<label for="data_nasc">Data Nascimento</label>
		<input id="data_nasc" type="date" value="<?php echo $datas[0]['data_nasc']; ?>" class="form-control" required="required" name="data_nasc" />
		<label for="genero">Gênero: </label> <br />
		<input value="masculino" type="radio" required="required" name="genero" aria-label="Genêro Masculino" <?php if ($datas[0]['genero'] == "masculino") echo "checked"; ?> />Masculino
		<input value="feminino" type="radio" name="genero" aria-label="Genêro Feminino" <?php if ($datas[0]['genero'] == "feminino") echo "checked"; ?> />Feminino
		<br />
		<label for="nao_enviar">
			<input type="checkbox" name="nao_enviar" value="1" aria-label="Cadastrar aluno e questionário sem enviar email" />Editar aluno e questionário sem enviar email
		</label>
		<br />
		<label for="data">Data da avaliação</label>
		<input id="data" value="<?php echo $datas[0]['data']; ?>" type="date" placeholder="dd/mm/aaaa" value="<?php echo date('Y-m-d'); ?>" class="form-control" required="required" name="data" />

		<input type="text" style="display: none" name="avaliador" value="<?php echo $datas[0]['avaliador'] ?>" />

		<ol>
			<?php
			$i = 0;

			//die(var_dump($perguntas));
			foreach ($perguntas as $data) {

			?>
				<li>
					<label for="<?php echo $i; ?>"><?php echo $data; ?></label>
					<input type="text" style="display: none" name="pergunta[]" value="<?php echo $data ?>" />
					<textarea id="<?php echo $i; ?>" name="resposta[]" class="form-control" cols="5" rows="5"><?php echo $respostas[$i] ?></textarea>


				</li>
			<?php
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