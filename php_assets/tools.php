<?php

//use este arquivo para adicionar funcoes utilitarias quaisquer

function dump_die($a) {
    echo '<pre>';
    var_dump($a);
    die;
}

function renderiza_respostas($perguntas, $respostas, $reabilitando_data) {
    $body = "<br><br><b>Questionário padrão de entrevista inicial</b><br>";
    $body .= "<b>Gênero: </b>" . $reabilitando_data['genero'] . "<br>";
    $body .= "<b>Data Nascimento: </b>" . date('d/m/Y', strtotime($reabilitando_data['data_nasc'])) . "<br>";
    $body .= "<b>Reabilitando: </b>" . $reabilitando_data['nome'] . "<br>";
    $body .= "<b>Reabilitador: </b>" . $reabilitando_data['avaliador'] . "<br>";
    $body .= "<b>Data Registro: </b>" . date('d/m/Y', strtotime($reabilitando_data['data'])) . "<br>";



    //MONTA O RESTANTE DO HTML COM AS PERGUNTAS E RESPOSTAS
    $body .= "<ol>";

    $i = 0;


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
