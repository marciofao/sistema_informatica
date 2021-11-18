<?php 



if ($_POST) {
	require_once 'php_assets/conecta.php';
	$database->update('perguntas', [
		"pergunta" => $_POST['pergunta'],
		"ordem" => $_POST['ordem']
	],["cod" => $_GET['c']]);

	header("location:gerencia_perguntas.php");
}

$title="Editar Pergunta";
require_once 'php_assets/header.php';

if ($_GET) {

	$data=$database->select('perguntas', "*",["cod" => $_GET['c']]);

	#var_dump($data);
	#die();
	?>

	
	<div class="container">
		


		<div class="panel panel-default">	
			<div class="panel-heading">	
				<h3 class="panel-title">Editar pergunta</h3>		

			</div><!-- /.panel-heading -->
			<form action="edita_pergunta.php?c=<?php echo $data[0]['cod']; ?>" method="post">
				<div class="row">
					<div class="col-md-9">
						<label style="width: 100%" class="col-md-9">Pergunta
							<input value="<?php echo $data[0]['pergunta']; ?>" type="text" name="pergunta" class="form-control" placeholder="texto da pergunta" id="pergunta" required="required" />
						</label>
					</div><!-- /.col-md-3 -->

					<div class="col-md-3">
						<label >Ordem da pergunta
							<input value="<?php echo $data[0]['ordem']; ?>" type="number" name="ordem" class="form-control " id="ordem" required="required"/>
						</label>		
					</div><!-- /.col-md-3 -->
				</div><!-- /.row -->
				
				<div class="row col-md-3">
					<input type="submit" value="Salvar"	class="form-control btn-primary " />
				</div><!-- /.row -->
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
	header("location:edita_perguntas.php");
}

require_once "php_assets/footer.php";

?>
