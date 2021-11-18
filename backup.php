<?php 

error_reporting(E_ALL & ~E_NOTICE);

require_once "php_assets/verifica_sessao.php";
require_once "php_assets/conecta.php";
//conecta em php-backup
require_once 'php_assets/php-backup.php';

/*
$filename='database_backup_'.date('G_a_m_d_y').'.sql';

$result=exec('mysqldump '.$dbname.' --password='.$pass.' --user='.$user.' --single-transaction >'.$filename,$output);
//ORIGINAL: $result=exec('mysqldump '.$dbname.' --password='.$pass.' --user='.$user.' --single-transaction >/var/www/backups/'.$filename,$output);

if($output==''){
	?>
	<script>
		alert("Houve um problema!");
	</script>
	<?php
}
else {
	?>
	<script>
		window.open("<?php 	echo($url_serv.$filename) ?>");
	</script>
	<?php
	//die($filename);
}

*/

//die($dest);
//echo("<script>location.href = '" ".$url_serv."BACKUP_DIR/");
?>

<script>
	alert("Para aumentar a segurança baixe o último arquivo da lista")
	window.onload = function() {
		var foo = window.location="<?php 	echo($url_serv."BACKUP_DIR/") ?>";
	}
</script>