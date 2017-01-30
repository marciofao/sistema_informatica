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
	$ul_cod=$database->insert('avaliacoes', [
		'nome' => $_POST['nome'],
		'data' => $_POST['data'],
		'avaliador' => $_SESSION["nome"],
		'respostas' => $perguntas."}{".$respostas
		]);
		#respostas = "pergunta,pergunta}{resposta,resposta"
		//echo "sucesso!";
	echo "<h1>Avaliação registrada com sucesso</h1>";
	//$ul_cod contem o cod do ultimo registro adicionado
	//BUSCA AS PERGUNTAS E RESPOSTAS RECÉM INSERIDAS:	
	$datas=$database->select('avaliacoes', "*", ["cod" => $ul_cod]);
//pega dados do usuário atual
	$data=$database->select('usuarios', '*', ['cod' => $_SESSION["cod"]]);
	
	function envia_email($email, $ul_cod, $data, $datas){




//separa as perguntas das respostas
		$dados=explode("}{", $datas[0]['respostas']); 

//cria arrays
		$perguntas = explode(",", $dados[0]);
		$respostas = explode(",", $dados[1]);

//ENVIO DE EMAIL:


//die(var_dump($_SESSION));
//	die(var_dump($data));
		$headers = "From: {$_SESSION["nome"]} {$data['0']['email']}\r\n";
		$headers  .="MIME-Version: 1.0 \r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	//echo $header;
	//die();
		$to = $data['0']['email_destino'];
		$subject = "Avaliação Informática";
		$url = "http://m2studios.orgfree.com/outras/lbraille_tools/questionario/registro.php?c=".$ul_cod;


		$body = "clique no link para visualizar e imprimir o questionário:<br>";
		$body .=htmlentities($url);

		$body .= "<br><br><b>Questionário padrão de entrevista inicial</b><br>";
		$body.="<b>Reabiliando: </b>".$datas[0]['nome']."<br>";
		$body.="<b>Reabilitador: </b>".$datas[0]['avaliador']."<br>";
	//MONTA O RESTANTE DO EMAIL COM AS PERGUNTAS E RESPOSTAS
		$body .="<ol>";

		$i=0;
		foreach ($perguntas as $key => $p):
			$body .="<li><b>".$p."</b><br/>".$respostas[$i]."</li>";
		$i++;
		endforeach ;
		$body .="</ol>";



		if (!mail($to, $subject, $body, $headers)) {

			echo "<h1>Houve um erro, o email não pode ser enviado.</h1>";
			die();
		}
	}// envia_email()

	//EFETUA ENVIO DE EMAIL
	envia_email($data[0]['email_destino'], $ul_cod, $data, $datas);

	if ($data[0]['envia_copia']=='1') {
		envia_email($data[0]['email'], $ul_cod, $data, $datas);
	}

	?>

	<script>
		alert("Avaliação enviada!");
		window.location.href = "inicio.php";
	</script>

	<?php

	require_once "php_assets/footer.php";
	
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