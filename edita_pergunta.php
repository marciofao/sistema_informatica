<?php



if ($_POST) {
	require_once 'php_assets/config.php';
	$database->update('perguntas', [
		"pergunta" => $_POST['pergunta'],
		"ordem" => $_POST['ordem']
	], ["cod" => $_GET['c']]);

	header("location:gerencia_perguntas.php");
}

$title = "Editar Pergunta";
require_once 'php_assets/header.php';

if ($_GET) {

	$data = $database->select('perguntas', "*", ["cod" => $_GET['c']]);

	#var_dump($data);
	#die();
?>


	<div class="container">



		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Editar Item</h3>

			</div><!-- /.panel-heading -->
			<form action="edita_pergunta.php?c=<?php echo $data[0]['cod']; ?>" method="post">
				<div class="row">
					<div class="col-md-9">
						<label style="width: 100%" class="col-md-9">Texto
							<input value="<?php echo $data[0]['pergunta']; ?>" type="text" name="pergunta" class="form-control" placeholder="texto da pergunta" id="pergunta" required="required" />
						</label>
					</div><!-- /.col-md-3 -->

					<div class="col-md-3">
						<label style="width: 100%" class="col-md-3">Ordem
							<input value="<?php echo $data[0]['ordem']; ?>" type="number" name="ordem" class="form-control " id="ordem" required="required" />
						</label>
					</div><!-- /.col-md-3 -->
					<div class="col-md-6">
						<label style="width: 100%" class="col-md-9">Tipo de item:
							<select class="form-control" name="tipo" onchange="show_hide_options(this)">
								<option value="text">Resposta de texto</option>
								<option value="checkbox">Caixa de marcar (permite selecionar mais de uma opção)</option>
								<option value="radio">Botões rádio - seleciona apenas uma opção de um grupo</option>
								<option value="title">Título de seção</option>
							</select>
						</label>
					</div><!-- /.col-md-3 -->
					<div class="col-md-6" id="input_options" style="display: none;">
						<label style="width: 100%" class="col-md-9">Opções:
							<input name="opcoes" type="text" class="form-control" placeholder="insira opções diferentes separadas por vírgula">
						</label>
					</div>
					<script>
						function show_hide_options(el) {
							field_options = document.querySelector('#input_options')
							if (el.value == 'checkbox' || el.value == 'radio'){
								field_options.style.display = 'block'
								document.getElementsByName('opcoes')[0].required=true
							}
							else{
								field_options.style.display = 'none'
								document.getElementsByName('opcoes')[0].required=false
							}
						}
					</script>

				</div><!-- /.row -->

				<div class="row col-md-3">
					<input type="submit" value="Salvar" class="form-control btn-primary " />
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



} else {
	header("location:edita_perguntas.php");
}

require_once "php_assets/footer.php";

?>