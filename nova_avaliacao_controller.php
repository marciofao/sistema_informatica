<?php
//dump_die($_POST);
//die(var_dump($datas));
	//die(var_dump($_POST['resposta']));
	$perguntas = $datas;
	$respostas = $_POST['resposta'];

    $questionario = array();
    $questionario['perguntas'] = $perguntas;
    $questionario['respostas'] = $respostas;

    $questionario = json_encode($questionario); 

//dump_die($questionario);


	//die($_SESSION["nome"]);
	$ul_cod = $database->insert('pacientes_info', [
		'nome' => ucwords($_POST['nome']),  //primeiras letras em maiusculas
		'data' => $_POST['data'],
		'genero' => $_POST['genero'],
		'data_nasc' => $_POST['data_nasc'],
		'setor' => $_POST['setor'],
		'avaliador' => $_SESSION["nome"],
		'cod_avaliador' => $_SESSION["cod"],
		'questionario' => $questionario
	]);


	//die(var_dump(error_get_last()));

	//$ul_cod contem o cod do ultimo registro adicionado
	//BUSCA AS PERGUNTAS E RESPOSTAS RECÉM INSERIDAS:	
	$datas = $database->select('pacientes_info', "*", ["cod" => $ul_cod]);
	//pega dados do usuário atual
	$data = $database->select('usuarios_info', '*', ['cod' => $_SESSION["cod"]]);


	function envia_email($email, $ul_cod, $data, $datas, $url_serv, $email_user, $email_domain) {

        
		

        $questionario = json_decode($datas[0]['questionario'], true);
        //dump_die($questionario);

		//cria arrays
		$perguntas = $questionario['perguntas'];
		$respostas = $questionario['respostas'];

		//ENVIO DE EMAIL:


		//die(var_dump($_SESSION));
		//die(var_dump($dados));
		$headers = "From: " . $email_user . "@" . $email_domain . "\r\n";
		$headers  .= "MIME-Version: 1.0 \r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		//echo $header;
		//die();
		$to = $email;
		$subject = "Avaliação Informática";
		$url = $url_serv . "registro.php?c=" . $ul_cod . "&print=1";
		$url = "<a href='" . $url . "'>" . $url . "</a>";
		//die($url);

		$body = "clique no link para visualizar e imprimir o questionário:<br>";
		$body .= htmlentities($url);

		$body .= renderiza_respostas($perguntas, $respostas, $datas[0]);

       //    die($body);
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

		if ($data[0]['envia_copia'] == '1') {
			envia_email($data[0]['email'], $ul_cod, $data, $datas, $url_serv, $email_user, $email_domain);
		}
	}



?>
	<script>
		<?php
		if (isset($_POST['nao_enviar'])) {
			echo 'alert("Questionário/Aluno registrado com sucesso!");';
		} else {
			echo 'alert("Questionário/Aluno registrado e enviado por email com sucesso!");';
		}
		?>

		window.location.href = "todos_alunos.php?m=1";
	</script>

<?php
	//die();