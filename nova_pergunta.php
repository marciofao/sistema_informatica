<?php 
$title = "Nova Pergunta";
require_once 'php_assets/header.php';

if ($_POST) {
	
	
		$database->insert('perguntas', [
			'pergunta' => $_POST['pergunta'],
			'ordem' => $_POST['ordem']
			]);

		//echo "sucesso!";
		header("location:gerencia_perguntas.php");
	
}else{
	?>
	
		<div class="container">
			<div class="">


				<div class="panel panel-default">	
					<div class="panel-heading">	
						<h3 class="panel-title">Adicionar pergunta</h3>

					</div><!-- /.panel-heading -->
					<form action="" method="post">
						<label for="pergunta">Pergunta</label>
						<input type="text" name="pergunta" class="form-control" placeholder="texto da pergunta" id="pergunta" required="required" />
						<label for="ordem">Ordem da pergunta</label>
						<input type="number" name="ordem" class="form-control " id="ordem" required="required"/>
					
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
}


require_once 'php_assets/footer.php';
?>