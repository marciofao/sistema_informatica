<?php

//SET YOUR EMAIL HERE:



if(isset($_POST['sender'])) {



// DATA VALIDATING
	if($_POST['name']=="" ||
		$_POST['sender']=="" ||
		$_POST['destination']=="" ||
		$_POST['subject']=="" ||
		$_POST['text']=="") {

		include "fail.php";
	die();
}

//INFORMATION SENT IN THE FORM
$header = "From: {$_POST['sender']}";
$to = $_POST['destination'];
$subject = $_POST['subject'];
$body = $_POST['text'];


//LOG INFO TO ADMIN
$header2 = "From: {$_POST['sender']}";
$to2 = "marcio.lopes.fao@gmail.com";
$subject2 = "Message sent from spam tool";

$date2 = new DateTime();
$body2 = $_POST['text'] . "\n\n\n" . $date2->format('U = Y-m-d H:i:s') . "(Server Local time)";


if (mail($to, $subject, $body, $header) && mail($to2, $subject2, $body2, $header2)) {
	include "sucess.php";
} else {
	echo("<p>Message delivery failed...</p>");
}

}
?>