<?php 	
//VALIDA ENVIO DE GET C, SE NÁO FOR PASSADO NENHUM CÓDIGO VOLTA PARA REGISTROS
if ($_GET['c']=="") { header("location:todos_alunos.php");  }

if ($_POST) {
	
	//REGISTRA ULTIMO ACESSO DO USUARIO
	$data=$database->insert('usuarios_info', ['ultimo_acesso' => date('Y-m-d')], ["cod_usuario"=>$_SESSION["cod"]]);

//die(var_dump($_POST));
	//die($_SESSION["nome"]);

	//DEVIDO A VALIDAÇÃO DO BANCO PARA O TIPO DATE
	$dt_nasc=$_POST['data_nascimento'];
	if($dt_nasc=="" || $dt_nasc=="00-00-000"){
		$dt_nasc = NULL;
	}

	//$ul_cod contem o cod do ultimo registro adicionado
	$ul_cod=$database->update('pacientes_info', [
		'nome' => $_POST['nome'],
		'data_nasc' => $dt_nasc,
		'genero' => $_POST['genero'],
		'cid' => strtoupper($_POST['cid']),
		'codigo' => $_POST['codigo'],
		'setor' => $_POST['setor'],
		'cod_avaliador' => $_POST['avaliador'],
		'ultimo_atendimento' => $_POST['data']
	],["cod" => $_GET["c"]]);




		//die(var_dump($database));

		//LOGICA ATUALIZAR REGISTROS ANTERIORES
	$atend=true; //INICIALIZA TRUE CASO NÃO HAJA REGISTRO PARA VALIDAR O IF ABAIXO
	//SE HOUVE REGISTRO DE ATIVIDADE ou OBS salva no banco
	if ($_POST['atividade']!=""||$_POST['obs']!="") {

		//VALIDA SE O DIA JÁ FOI CADASTRADO COM O MESMO REABILITADOR E PACIENTE
		if ($database->select('atendimentos_pacientes', "*", ["AND" =>['cod_reabilitador' => $_SESSION["cod"], 'cod_paciente' => $_GET["c"], "data" => $_POST['data']]])) {
			echo "<script>alert('Dia de atendimento já registrado!');</script>";
			echo '<script>history.back();</script>';
			
			//die(var_dump($database));
			die();
		}

		$descricao = $_POST['atividade'];
		if ($_POST['obs']!="") {
			$descricao .=", " ;
		}
		$descricao .= $_POST['obs'];
		$atend=$database->insert('atendimentos_pacientes', [
			'data' => $_POST['data'],
			'descricao' => $descricao,
			'parecer' => $_POST['parecer'],
			'cod_paciente' => $_GET['c'],
			'cod_reabilitador' => $_SESSION["cod"],
			'setor' => $_POST['setor']
		]);

		$data=$database->select('usuarios_info', '*', ['cod' => $_SESSION["cod"]]);


		function envia_email($email, $ul_cod, $data, $url_serv, $descricao){


//die(var_dump($_SESSION));
//	die(var_dump($data));
			$headers = "From: Informática LB naoresponda@louisbraille.org.br\r\n";
			$headers  .="MIME-Version: 1.0 \r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	//echo $header;
	//die();
			$to = $email;
			$subject = "Registro Atendimento - ".$_POST['nome'];

			switch ($_POST['parecer']) {
				case '1':
					$parec = "Concluído";
					break;
				case '2':
					$parec = "Concluído com dificuldade";
					break;

				default:
					$parec = "Não Concluído";
					break;
			}

			$body = $_POST['data']." - ".$descricao." - ".$parec;



			if (!mail($to, $subject, $body, $headers)) {
				echo "<script>alert('Houve um erro, o email de backup não pode ser enviado.')</script>";
				//die();
			}
	/*
		if (!$mail->send()) {
			echo "Erro no envio: " . $mail->ErrorInfo;
			die();
		}
		*/

	

		?>

		<script>
			<?php 
			//SE ESTIVER NO MODO REGISTRO DE ATIVIDADE
			if (isset($_GET['e'])) {
			?>
			window.location.href = "todos_alunos.php?m=1";
			<?php
			}
			 ?>
			
		</script>
		<?php
	} //envia_email()

	//EFETUA ENVIO DE EMAIL para backup em EMAIL
	envia_email("aelbraille@gmail.com", $ul_cod, $data, $url_serv, $descricao);
	

}



	//echo(var_dump($database)); die();

if (!$atend) {
	echo "<h1>Problema ao registrar atendimento!</h1>";

	if (!$ul_cod) {
		echo "<h1>Problema ao registrar informações do paciente!</h1>";
	}
	var_dump($database->error());
	var_dump($database);
	die();
}else{
		//echo("<script>location.href = 'edita_registro_atendimentos.php?c='</script>");
		//header("location:edita_registro_atendimentos.php?c=".$_GET['c']);
	?>

	<script>

			//alert("Registro Salvo!");
			window.location.href = "edita_registro_atendimentos.php?c=<?php echo $_GET['c'] ?>";
		</script>
		<?php
	}


	
	
	?>

	

	<?php

	require_once "php_assets/footer.php";
	die();
	
	//echo("<script>location.href = '"inicio.php");
}


//BUSCA DADOS PARA EXIBIR NA PÁGINA
$datas=$database->select('pacientes_info', "*", ["cod" => $_GET['c']]);
$atendimentos=$database->select('atendimentos_pacientes', "*", [
	"cod_paciente" => $_GET['c'],
	"ORDER" => ["data" => "ASC"]

]
);

$reabilitadores=$database->select('usuarios_info', "*", ["cod" => $_GET['c']]);
//die(var_dump($database));

?>