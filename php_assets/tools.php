<?php

//use este arquivo para adicionar funcoes utilitarias quaisquer

function dump_die($a) {
    echo '<pre>';
    var_dump($a);
    die;
}

function renderiza_respostas($reabilitando_data, $afv=false) {
    $qname = "Questionário padrão de entrevista inicial";
    if($afv)
    $qname = "Avaliação Funcional da Visão";
    $body = "<br><br><h1>".$qname."</h1><br>";
    $body .= "<b>Reabilitando: </b>" . $reabilitando_data['nome'] . "<br>";
    $body .= "<b>Data Nascimento: </b>" . date('d/m/Y', strtotime($reabilitando_data['data_nasc'])) . "<br>";
    $body .= "<b>Gênero: </b>" . $reabilitando_data['genero'] . "<br>";
    $body .= "<b>Reabilitador: </b>" . $reabilitando_data['avaliador'] . "<br>";
    $body .= "<b>Data Registro: </b>" . date('d/m/Y', strtotime($reabilitando_data['data'])) . "<br>";



    //MONTA O RESTANTE DO HTML COM AS PERGUNTAS E RESPOSTAS
    $body .= "<ol>";

    $i = 0;
   if($afv){
    $perguntas = json_decode($reabilitando_data['afv'], true)['perguntas'];
    $respostas = json_decode($reabilitando_data['afv'], true)['respostas'];
   }else{
    $perguntas = json_decode($reabilitando_data['questionario'], true)['perguntas'];
    $respostas = json_decode($reabilitando_data['questionario'], true)['respostas'];
   }

    foreach ($perguntas as $k => $p) :
        if ($p['tipo'] == 'title') {
            $body .= "<h2>" . $p['pergunta'] . "</b></h2>";
        } elseif ($p['tipo'] == 'checkbox') {
            // dump_die($respostas[$key]);
            $body .= "<li><b>" . $p['pergunta'] . "</b><br/>" . implode(', ', $respostas[$i]) . "</li>";
        } elseif ($p['tipo'] == 'radio') {
            //dump_die($respostas[$key]);
            $body .= "<li><b>" . $p['pergunta'] . "</b><br/>" . $respostas[$i] . "</li>";
        } else {
            //dump_die($respostas[$key]);
            $body .= "<li><b>" . $p['pergunta'] . "</b><br/>" . $respostas[$i] . "</li>";
        }

        $i++;
    endforeach;
    $body .= "</ol>";

    return $body;
}


function render_form_edit($perguntas, $respostas=null) {
    $datas = $perguntas;
?>

    <ol>
        <?php
        $i = 0;
        foreach ($datas as $data) {
        ?>

            <?php if ($data['tipo'] == 'title') : ?>
                <h2><?php echo $data['pergunta']; ?></h2>
                <textarea id="<?php echo $data['cod']; ?>" name="resposta[]" style="display: none;"></textarea>

            <?php elseif ($data['tipo'] == 'checkbox') : ?>
                <li>
                    <label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label> <br>
                    <?php foreach (explode(',', $data['opcoes']) as $opcao) : ?>
                        <input type="checkbox" name="resposta[<?php echo $i ?>][]" value=" <?php echo $opcao ?>"> <?php echo $opcao ?> <br>
                    <?php endforeach ?>
                </li>
            <?php elseif ($data['tipo'] == 'radio') : ?>
                <li>
                    <label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label> <br>
                    <?php foreach (explode(',', $data['opcoes']) as $opcao) : ?>
                        <input type="radio" name="resposta[<?php echo $i ?>]" value=" <?php echo $opcao ?>"> <?php echo $opcao ?> <br>
                    <?php endforeach ?>
                </li>
            <?php else : ?>
                <li>
                    <label for="<?php echo $data['cod']; ?>"><?php echo $data['pergunta']; ?></label>
                    <textarea id="<?php echo $data['cod']; ?>" name="resposta[<?php echo $i ?>]" class="form-control" cols="5" rows="5"></textarea>
                </li>
            <?php endif ?>


        <?php
            $i++;
        }
        ?>

    </ol>

<?php
}
