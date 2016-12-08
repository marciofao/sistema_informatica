<?php 

$title="Editar Pergunta";
require_once 'php_assets/header.php';

if ($_POST) {
	$database->update('perguntas', [
		"pergunta" => $_POST['pergunta'],
		"ordem" => $_POST['ordem']
		],["cod" => $_GET['c']]);

	header("location:gerencia_perguntas.php");
}

if ($_GET) {

	$data=$database->select('perguntas', "*",["cod" => $_GET['c']]);

	#var_dump($data);
	#die();
	?>

	
	<div class="container">
		<div class="">


			<div class="panel panel-default">	
				<div class="panel-heading">	
					<h3 class="panel-title">Editar pergunta</h3>		

				</div><!-- /.panel-heading -->
				<form action="edita_pergunta.php?c=<?php echo $data[0]['cod']; ?>" method="post">
					<label>Pergunta
						<input value="<?php echo $data[0]['pergunta']; ?>" type="text" name="pergunta" class="form-control" placeholder="texto da pergunta" id="pergunta" required="required" />
					</label>
					<label >Ordem da pergunta
						<input value="<?php echo $data[0]['ordem']; ?>" type="number" name="ordem" class="form-control " id="ordem" required="required"/>
					</label>
					
					<input type="submit" value="Salvar"	class="form-control btn-primary" />
				</form>
			</div><!-- /.panel panel-default -->


		</div><!-- /.row -->
	</div><!-- /.content-fluid -->

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>







<?php



}else{
	header("location:gerencia_perguntas.php");
}

require_once "php_assets/footer.php";

?>
