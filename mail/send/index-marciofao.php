<?php


if(isset($_POST['sender'])) {



	// DATA VALIDATING
	if($_POST['name']=="" ||
		$_POST['sender']=="" ||
		$_POST['text']=="") {

		include "fail.php";
	die();
	}

	//INFORMATION SENT IN THE FORM
	$header = "From: {$_POST['name']} {$_POST['sender']}";
	//echo $header;
	//die();
	$to = "marcio.lopes.fao@gmail.com";
	$subject = "Mensagem da página";
	$body = $_POST['text'];


	//LOG INFO TO ADMIN
	$header2 = "From: Família Fão familifao@bol.com.br";
	$to2 = $_POST['sender'];
	$subject2 = "Mensagem entregue";

	$date2 = new DateTime();
	$body2 = "Olá, " . $_POST['name'] . 
			 ".\n\nVocê nos enviou a seguinte mensagem através da página: \n\n" . 
	         $_POST['text'] . "\n\n\n" . 
	         "Agradecemos o Seu contato, os administradores da página entrarão em contato assim que possível. \n\n" .
	         "familiafao.orgfree.com";


	if (mail($to, $subject, $body, $header) && mail($to2, $subject2, $body2, $header2)) {
		include "sucess.php";
		die();
	} else {
		//include "fail.php";
		echo "algum erro ocorreu!";
	}

}
echo $_POST['sender'];
?>