<?php

if (!$_GET) die('erro: nada enviado');

require_once "php_assets/verifica_sessao.php";
require_once "php_assets/config.php";

$cod = $_GET['c'];

if($_POST){
    $database->update('atendimentos_pacientes', [
		'descricao' => $_POST['descricao'],
		'parecer' => $_POST['parecer'],
        'data' => $_POST['data']
	], ["cod_atendimento" => $cod]);

    ?>
<script>
//envia de volta para editor de registros do paciente
window.location.href = 'edita_registro_atendimentos.php?c=<?php echo $_POST['cod_paciente'] ?>'
</script>
<?php

    die; //e morreu
}

$data=$database->select('atendimentos_pacientes', '*', ["cod_atendimento"=>$cod]);
	//var_dump($database); die();
	//var_dump($data); die();

	if (!$data) die('registro inexistente');

	$atendimento = $data[0];


?>
<title>Editar atendimento</title>

<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/custom.css" />


<form method="post" class="simple-form form-control">
    <label for="data">Data:</label> <br>
    <input name="data" type="date" required value="<?php echo $atendimento['data'] ?>" class="form-control"> <br>
    <label for="desricao">Descrição:</label> <br>
    <input name="descricao" required value="<?php echo $atendimento['descricao'] ?>" class="form-control"> <br>
    <label for="parecer">Parecer:</label> <br>
    <select name="parecer" class="form-control">
        <option value="1" <?php echo $atendimento['parecer']==1? 'selected' : '' ?>>Concluído</option>
        <option value="2" <?php echo $atendimento['parecer']==2? 'selected' : '' ?>>Concluído com dificuldade
        </option>
        <option value="3" <?php echo $atendimento['parecer']==3? 'selected' : '' ?>>Não Concluído</option>
    </select> <br>
    <input name='cod_paciente' value="<?php echo $atendimento['cod_paciente'] ?>" style="display: none">
    <input type="submit" value="Atualizar" class="btn-primary form-control">
</form>