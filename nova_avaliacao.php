<?php 	



$title="Nova Avaliação";
require_once 'php_assets/header.php';





//die($url_serv);
//die($email_count);

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


$datas=$database->select('perguntas', "pergunta", ["ORDER" => "ordem"]);



if ($_POST) {
	//die(var_dump($datas));
	//die(var_dump($_POST['resposta']));
	$perguntas = implode('%*%', $datas);
	$respostas = implode('%*%', $_POST['resposta']);
	

	
//die($_SESSION["nome"]);
	$ul_cod=$database->insert('pacientes_info', [
		'nome' => $_POST['nome'],
		'data' => $_POST['data'],
		'genero' => $_POST['genero'],
		'data_nasc' => $_POST['data_nasc'],
		'setor' => $_POST['setor'],
		'avaliador' => $_SESSION["nome"],
		'cod_avaliador' => $_SESSION["cod"],
		'questionario' => $perguntas."}{".$respostas //resulta em $perguntas]}{[$respostas
		]);
		#respostas = "pergunta,pergunta}{resposta,resposta"
		//echo "sucesso!";

//die(var_dump(error_get_last()));

	//$ul_cod contem o cod do ultimo registro adicionado
	//BUSCA AS PERGUNTAS E RESPOSTAS RECÉM INSERIDAS:	
	$datas=$database->select('pacientes_info', "*", ["cod" => $ul_cod]);
//pega dados do usuário atual
	$data=$database->select('usuarios_info', '*', ['cod' => $_SESSION["cod"]]);
	
	
	function envia_email($email, $ul_cod, $data, $datas, $url_serv){


//$email = "marcio.lopes.fao@gmail.com";

//separa as perguntas das respostas
		$dados=explode("}{", $datas[0]['questionario']); 

//cria arrays
		$perguntas = explode("%*%", $dados[0]);
		$respostas = explode("%*%", $dados[1]);

//ENVIO DE EMAIL:


//die(var_dump($_SESSION));
//die(var_dump($dados));
		$headers = "From: ".$email_user."@".$email_domain."\r\n";
		$headers  .="MIME-Version: 1.0 \r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	//echo $header;
	//die();
		$to = $email;
		$subject = "Avaliação Informática";
		$url = $url_serv."registro.php?c=".$ul_cod."&print=1";
		$url = "<a href='".$url."'>".$url."</a>";
	//die($url);

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
			var_dump($to);
			var_dump($subject);
			var_dump($headers);
			die(var_dump(error_get_last()));

		}

		
	} //envia_email()

	//EFETUA ENVIO DE EMAIL - SE CHECKBOX NAO ENVIAR EMAIL NAO ESTIVER MARCADO
	if (!isset($_POST['nao_enviar'])) {
		
		if ($data[0]['envia_copia']=='1') {
			envia_email($data[0]['email'], $ul_cod, $data, $datas, $url_serv);
		}
	}



	?>
	<script>
		<?php 
		if (isset($_POST['nao_enviar'])) {
			echo 'alert("Questionário/Aluno registrado com sucesso!");';
		}else{
			echo 'alert("Questionário/Aluno registrado e enviado por email com sucesso!");';
		}
		?>
		
		window.location.href = "todos_alunos.php?m=1";
	</script>

	<?php
//die();

}
else{
//FAZ OUTRA BUSCA NO BANCO: GAMBIARRA POR CAUSA DOS INDES 'COD' E 'PERGUNTA' ABAIXO
	$datas=$database->select('perguntas', "*", ["ORDER" => "ordem"]);
//var_dump($datas);
//die();
	?>

	<div class="content">
		<div class="row col-md-8">
			<h3>Nova Avaliação</h3>
			<form action="" method="post">
				<label for="nome">Nome COMPLETO do Reabilitando</label>
				<!--campo nome valida existência de espaços -->
				<input id="nome" type="text" placeholder="Nome completo" pattern="^(.*\s+.*)+$" class="form-control" required="required" name="nome" />
				<label for="data_nasc">Data Nascimento</label>
				<input id="data_nasc" type="date" placeholder="" class="form-control" required="required" name="data_nasc" />
				<label for="genero">Gênero:  </label> <br />
					<input value="masculino" type="radio"  required="required" name="genero" aria-label="Genêro Masculino" />Masculino
					<input value="feminino" type="radio" name="genero"  aria-label="Genêro Feminino" />Feminino
				<br />	
				<label for="nao_enviar">
					<input type="checkbox" name="nao_enviar" value="1" aria-label="Cadastrar aluno e questionário sem enviar email" />Cadastrar aluno e questionário sem enviar email
				</label>
				<br />
				<select name="setor" id="setor" class="form-control">
							<option value="info" >Informática</option>			
							<option value="om" >Orientação e Mobilidade</option>
							<option value="psi" >Psicologia</option>
							<option value="tvd" >Tarefas da vida diária</option>
						</select>
				<br />	
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