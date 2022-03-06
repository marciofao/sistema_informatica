<?php



if ($_POST) {
	require_once 'php_assets/config.php';
	require_once 'php_assets/verifica_sessao.php';
	
	if (isset($_GET['novo'])) { //inserção de pergunta
		$database->insert('perguntas', [
			"pergunta" => $_POST['pergunta'],
			"ordem" => $_POST['ordem'],
			"tipo" => $_POST['tipo'],
			"opcoes" => $_POST['opcoes'],
			"cod_usuario" => $_SESSION['cod']
		]);
		
	} else { //atualização de pergunta
		$database->update('perguntas', [
			"pergunta" => $_POST['pergunta'],
			"ordem" => $_POST['ordem'],
			"tipo" => $_POST['tipo'],
			"opcoes" => $_POST['opcoes'],
			"cod_usuario" => $_SESSION['cod']
		], ["cod" => $_GET['c']]);
	}

	header("location:gerencia_perguntas.php");
}

$title = "Editar Pergunta";
require_once 'php_assets/header.php';

if (isset($_GET['c'])) $data = $database->select('perguntas', "*", ["cod" => $_GET['c']]);

#var_dump($data);
#die();
?>


<div class="container">



	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?php if (isset($_GET['novo'])) : ?>
					Novo Item
				<?php else : ?>
					Editar Item
				<?php endif ?>
			</h3>

		</div><!-- /.panel-heading -->
		<form method="post">
		
			<div class="row">
			<div class="col-md-6">
					<label style="width: 100%" class="col-md-9">Tipo de item:
						<select class="form-control" name="tipo" id="tipo" onchange="show_hide_options(this)">
							<option value="text" <?php if (isset($data) && $data[0]['tipo'] == 'text') echo 'selected' ?>>Resposta de texto</option>
							<option value="checkbox" <?php if (isset($data) && $data[0]['tipo'] == 'checkbox') echo 'selected' ?>>Caixa de marcar (permite selecionar mais de uma opção)</option>
							<option value="radio" <?php if (isset($data) && $data[0]['tipo'] == 'radio') echo 'selected' ?>>Botões rádio (seleciona apenas uma opção de um grupo)</option>
							<option value="title" <?php if (isset($data) && $data[0]['tipo'] == 'title') echo 'selected' ?>>Título de seção</option>
						</select>
					</label>
				</div><!-- /.col-md-3 -->
				<div class="col-md-9">
					<label style="width: 100%" class="col-md-9">Texto
						<input value="<?php echo isset($data) ? $data[0]['pergunta'] : '' ?>" type="text" name="pergunta" class="form-control"  id="pergunta" required="required" />
					</label>
				</div><!-- /.col-md-3 -->
				
				<div class="col-md-6" id="input_options" style="display: none;">
					<label style="width: 100%" class="col-md-9">Opções:
						<input name="opcoes" value="<?php echo isset($data) ? $data[0]['opcoes'] : '' ?>" class=" form-control" placeholder="insira opções diferentes separadas por vírgula">
					</label>
				</div>
				<div class="col-md-3">
					<label style="width: 100%" class="col-md-3">Ordem
						<input value="<?php echo isset($data) ? $data[0]['ordem'] : '' ?>" type="number" name="ordem" class="form-control " id="ordem" required="required" />
					</label>
				</div><!-- /.col-md-3 -->
				<script>
					field_options = document.querySelector('#input_options')
					function show_hide_options(el) {
						
						if (el.value == 'checkbox' || el.value == 'radio') {
							field_options.style.display = 'block'
							document.getElementsByName('opcoes')[0].required = true
						} else {
							field_options.style.display = 'none'
							document.getElementsByName('opcoes')[0].required = false
						}
					}
					tipo = document.getElementById('tipo').value
					if(tipo=='radio' || tipo=='checkbox'){
						field_options.style.display = 'block'
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




require_once "php_assets/footer.php";

?>