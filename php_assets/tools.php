<?php 

//use este arquivo para adicionar funcoes utilitarias quaisquer

function dump_die($a){
    echo '<pre>';
    var_dump($a);
    die;   
}