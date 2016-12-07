<?php 	
$title="Nova Avaliação";
require_once 'php_assets/header.php';

//EXIGE NOME DO AVALIADOR PARA REALIZAR O CADASTRO
if ($_SESSION['nome']=="") {
	?>
	<script>
		alert("Complete o seu cadastro de usuário antes de continuar!");
		window.location.href = "edita_usuario.php";
	</script>
	
	<?php


	require_once "php_assets/footer.php";
	die();
}


$datas=$database->select('perguntas', "*", ["ORDER" => "ordem"]);



if ($_POST) {
	$datas=$database->select('perguntas', "pergunta", ["ORDER" => "ordem"]);
	
	$perguntas = implode(',', $datas);
	$respostas = implode(',', $_POST['resposta']);

	
//die($_SESSION["nome"]);
	$l=$database->insert('avaliacoes', [
		'nome' => $_POST['nome'],
		'data' => $_POST['data'],
		'avaliador' => $_SESSION["nome"],
		'respostas' => $perguntas."}{".$respostas
		]);
		#respostas = "pergunta,pergunta}{resposta,resposta"
		//echo "sucesso!";
	
	//$l contem o cod do ultimo registro adicionado
	

//ENVIO DE EMAIL:

	//pega dados do usuário atual
	$data=$database->select('usuarios', '*', ['cod' => $_SESSION["cod"]]);
	//MESSAGE TO ADMIN
//die(var_dump($_SESSION));
//	die(var_dump($data));
	$headers = "From: {$_SESSION["nome"]} {$data['0']['email']}";
	$headers  .="'MIME-Version: 1.0' \r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	//echo $header;
	//die();
	$to = $data['0']['email_destino'];
	$subject = "Avaliação Informática";

	$body = "clique no link para visualizar o questionário:" . "\n\n" . 
			 "<a href='http://louisbraille.org.br/questionario/registro.php?c=".$l ."'>http://louisbraille.org.br/questionario/registro.php?c=".$l ."</a>\n\n";


	if (mail($to, $subject, $body, $headers)) {
		echo "<h1>Avaliação enviada</h1>";

	} else {
		echo "<h1>Houve um erro</h1>";
		
	}
	require_once "php_assets/footer.php";
	die();
	//header("location:inicio.php");
}



//var_dump($datas);
//die();
?>

		<div class="row col-md-6">
			
			<h3>Nova Avaliação</h3>
			<form action="" method="post">
				<label for="nome">Nome do Reabilitando</label>
				<input id="nome" type="text" placeholder="Nome" class="form-control" required="required" name="nome" />
				<label for="data">Data da avaliação</label>
				<input id="data" type="date" placeholder="dd/mm/aaaa" value="<?php 	echo date('Y-m-d'); ?>"	 class="form-control" required="required" name="data" />

				<ol>
					<?php 	
					foreach ($datas as $data) {
						?>
						<li>
							<label for="<?php 	echo $data['cod']; ?>"><?php 	echo $data['pergunta']; ?></label>
							<textarea id="<?php 	echo $data['cod']; ?>" name="resposta[]" class="form-control" cols="5" rows="5"></textarea>
							

						</li>
						<?php
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

	<?php 	require_once "php_assets/footer.php"; ?>