<?php


$title = "Editar Atendimentos";
require_once 'php_assets/header.php';
require_once 'edita_registro_controller.php';

$is_admin = $_SESSION["user_level"] == 1;
?>


<script>
//var input = document.getElementById("atividade").focus();
function apaga(cod_a, cod_pac, dt) {
    //alert('ahoy');
    if (confirm("Confirma a exclusão do atendimento em " + dt + " ?")) {
        window.location = 'apagar_registro_atendimento.php?c=' + cod_a + '&d=' + cod_pac;

    }
}

function edita(cod_a) {

    window.location = 'edita_atendimento.php?c=' + cod_a;

}
<?php
	//para mostrar alerta ao receber parametro M via GET
	if (isset($_GET['m'])) :
	?>

//alert("Registro removido!");

<?php endif ?>

//se receber parametro de edicao E, inicia a página com o cursor no campo atividade
<?php if (isset($_GET['e'])) : ?>
window.onload = function() {
    var input = document.getElementById('atividade').focus();
}

<?php else : ?>
window.onload = function() {
    var input = document.getElementById('nome').focus();
}
<?php endif ?>
</script>
<style>
form {
    white-space: nowrap;
}

.verm {
    color: red;
}

.verd {
    color: darkgreen;
}

.amar {
    color: orange;
}

th {
    text-align: center;
}
.descricao{
    white-space: normal;
}

.print-table td{
    padding: 5px;
    border: 1px solid black
}


@media print {

    @page {
        size: 'A4';
        /* margin: 0mm;*/
    }

    html,
    body {
        width: 1024px;
    }

    body {
        margin: 0 auto;
    }

}
</style>
<div class="container">
    <div class="row col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Registro de Atendimentos</h3>
            </div><!-- /.panel-heading -->
        </div>
        <form action="" method="post">

            <div class="cabecalho non-printable">
                <div class="col-md-5 col-sm-5 col-xm-5">
                    <label for="nome">Nome do Usuário:</label>

                    <input id="nome" value="<?php echo $datas[0]['nome']; ?>" type="text" placeholder="Nome"
                        class="form-control <?php echo $is_admin? '' : 'hidden' ?>" required="required" name="nome" />
                        <?php echo $is_admin? '' : '<br>'.$datas[0]['nome'] ?>
                </div><!-- /.col-md-3 -->
                <div class="col-md-2 col-sm-2">
                    <label for="genero">Gênero: </label> <br />
                    <div class="<?php echo $is_admin? '' : 'hidden' ?>">
                        <input value="masculino" type="radio" required="required" name="genero"
                            aria-label="Genêro Masculino" 
                            <?php if ($datas[0]['genero'] == "masculino") echo "checked"; ?> />Masculino <br>
                        <input value="feminino" type="radio" name="genero" aria-label="Genêro Feminino"
                            <?php if ($datas[0]['genero'] == "feminino") echo "checked"; ?> />Feminino
                    </div>
                    <?php echo $is_admin? '' : ucfirst($datas[0]['genero']) ?>
                </div><!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-3">
                    <label for="data_nascimento">Data Nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control <?php echo $is_admin? '' : 'hidden' ?>"
                        aria-label="setas cima baixo muda valor" value="<?php echo $datas[0]['data_nasc'] ?>" />
                        <?php echo $is_admin? '' : '<br>'.date('d/m/Y', strtotime($datas[0]['data_nasc'])) ?>
                        
                </div><!-- /.col-md-3 -->
                <div class="col-md-2 col-sm-2 hidden">
                    <label for="cid">CID:</label>

                    <input id="cid" value="<?php echo $datas[0]['cid']; ?>" type="text" placeholder="H00.00"
                        class="form-control" name="cid" />

                </div><!-- /.col-md-2 -->
                <div class="col-md-2 col-sm-2">


                    <label for="codigo">Código:</label>
                    <input id="codigo" value="<?php echo $datas[0]['codigo']; ?>" type="text" placeholder="000000"
                        class="form-control <?php echo $is_admin? '' : 'hidden' ?>" name="codigo" />
                        <?php echo $is_admin? '' : '<br>'.$datas[0]['codigo'] ?>
                </div><!-- /.col-md-2 -->
                <div class="col-md-3 col-sm-3 hidden">
                    <label for="setor">Setor:</label>
                    <select name="setor" id="setor" class="form-control">

                        <?php foreach($setores_config as $s): ?>
                        <option value="<?php echo $s ?>" <?php if ($datas[0]['setor'] == $s) echo "selected"; ?>>
                            <?php echo $s ?></option>
                        <?php endforeach ?>

                    </select>
                </div><!-- /.col-md-3 -->
                <div class="col-md-5 col-sm-5 hidden">
                    <label for="avaliador">Profissional:</label>
                    <?php
					//PEGA LISTA DE REABILITADOR/AVALIADOR DO BANCO DE DADOS
					$avaliador = $database->select('usuarios_info', ["nome", "cod"]);
					//die(var_dump($avaliador));
					?>


                    <select class="form-control" name="avaliador">

                        <option value="0">Sem rebilitador</option>

                        <?php foreach ($avaliador as $av) :
							if ($av['nome'] != '') { //se nome for vazio, não imprime este option
						?>

                        <option value="<?php echo $av['cod'] ?>"
                            <?php echo ($datas[0]['cod_avaliador'] == $av['cod'] ? 'selected' : '')?>>
                            <?php echo $av['nome'] ?>
                        </option>
                        <?php
							} //fecha if do option
						endforeach
						?>

                    </select>
                </div>
                <div class="col-md-2 fr">
                    <div class="row"> </div>
                    <input type="submit" value="Salvar" class="btn-primary btn-md non-printable form-control ">
                </div>
                <br>


            </div><!-- /.cabecalho non-printable -->
            <table class="printable table-responsive print-table">
                <tr>
                    <td colspan="2">Nome do Reablitando:</td>
                    <td>Gênero:</td>
                    <td>Data Nasc.:</td>
                   <!--  <td>CID:</td> -->

                </tr>
                <tr>
                    <td colspan="2"><?php echo $datas[0]['nome']; ?></td>
                    <td><?php echo ucfirst($datas[0]['genero']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($datas[0]['data_nasc'])); ?></td>
                   <!--  <td><?php echo $datas[0]['cid']; ?></td> -->

                </tr>
                <tr>
                    <td>Código</td>
                   <!--  <td>Setor</td> -->
                    <td colspan="3">Reabilitador</td>

                </tr>
                <tr>
                    <td><?php echo $datas[0]['codigo']; ?></td>
                    <!-- <td>
                        <?php
						if ($datas[0]['setor'] == "info") echo "Informática";
						if ($datas[0]['setor'] == "om") echo "Orientação e Mobilidade";
						if ($datas[0]['setor'] == "psi") echo "Psicologia";
						if ($datas[0]['setor'] == "avd") echo "Atividades da vida diária";
						?>
                    </td> -->
                   <!--  <td colspan="3"><?php echo $datas[0]['avaliador']; ?></td> -->
                   <td colspan="3"><?php echo $_SESSION["nome"]; ?></td>

                    
                </tr>
            </table>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Atividade / Evolução</th>
                        <th>Parecer</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($atendimentos) : ?>
                    <?php foreach ($atendimentos as $data) : //ORDER ASC NAO FUNCIONA :'( 
						?>

                    <tr>
                        <td class="tac">

                            <?php echo date('d/m/Y', strtotime($data['data'])) ?>

                        </td>
                        <td class="descricao">
                            <?php echo $data['descricao'] ?>
                        </td>

                        <td>
                            <?php
									switch ($data['parecer']) {
										case '1':
									?>
                            <span class="verd ">Concluído</span>
                            <?php
											break;
										case '2':
										?>
                            <span class="amar ">Concluído com dificuldade</span>
                            <?php
											break;
										default:

										?>
                            <span class="verm ">Não Concluído</span>
                            <?php
											break;
									}
									?>

                        </td>
                        <td style="display: flex; justify-content: space-evenly">
                            <?php if($_SESSION["user_level"] == 1): ?>
                            <button onclick="edita(<?php echo $cod = $data['cod_atendimento'] ?>)" type="button"
                                class=" non-printable" aria-label="Editar atividade">
                                <span aria-hidden="true">&#x270E;</span>
                            </button>
							<button
                                onclick="apaga(<?php echo $cod = $data['cod_atendimento'] ?>,<?php echo $cod = $data['cod_paciente'] ?>,'<?php echo date('d/m/y', strtotime($data['data'])) ?>')"
                                type="button" class=" non-printable" aria-label="Excluir atividade">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php endif ?>
                           

                        </td>

                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>
                    <div class="non-printable">
                        <tr class="">
                            <td>
                                <input type="date" name="data" value="<?php echo date('Y-m-d'); ?>"
                                    class="form-control non-printable" />

                            </td>
                            <td>
                                <select name="atividade" id="atividade" class="form-control non-printable"
                                    style="width: 100%;float: left;">
                                    <option value="" class="form-control">Selecione a atividade... tab enter salva como
                                        concluido sem observação</option>
                                    <?php
									$atividades = array(
                                        "Atividade da Vida Diária",
										"Biblioteca",
                                        "Braille",
										"Coral",
                                        "Estimulação Precoce",
                                        "Grupo de convivência",
										"Música",
                                        "Orientação e Mobilidade",
										"Outro",
                                        "Psicologia",
										"Serviço Social",
                                        "Teatro",
                                        "Tecnologia Assistiva", 
                                        "Web Radio"
									);
									foreach ($atividades as $key => $value) {
										echo " \n "; //quebra de linha
										echo '<option value="' . $value . '" class="form-control" >' . $value . '</option>';
									}


									?>
                                </select>
                              <!--   <input type="text" name="obs" placeholder="Observação" id="obs"
                                    class="form-control non-printable" style="width: 50%;" /> -->
                                    <textarea name="obs"  class="form-control non-printable" id="obs" cols="30" rows="5" style="width: 100%;"></textarea>

                            </td>
                            <td>
                                <label for="parecer">
                                    <select name="parecer" id="parecer" class="form-control non-printable">
                                        <option value="1" class="form-control verd">Concluído</option>
                                        <option value="2" class="form-control amar">Concluído com dificuldade</option>
                                        <option value="3" class="form-control verm">Não Concluído</option>
                                    </select>
                                </label>

                            </td>
                            <td class="col-centered">

                                <input type="submit" class="btn-primary btn-md non-printable form-control col-md-6"
                                    value="Registrar" />

                            </td>
                        </tr>
                    </div><!-- /.non-printable -->

                <tbody>
            </table>

    </div>
    <!--panel default -->
    </form>

    <div class="row">
        <?php
		//echo sizeof($atendimentos);
		//die(sizeof($atendimentos));
		/*
	if (sizeof($atendimentos)>0) {
		if (sizeof($atendimentos)%12==0) {
			?>
        <script>
        if (confirm("Há uma folha inteira de atendimentos, deseja imprimir?")) {
            window.print()
        }
        </script>
        <?php
		}
	}
*/
		?>
    </div><!-- /.row  -->

</div>
<?php 	// require_once "php_assets/footer.php";  
?>