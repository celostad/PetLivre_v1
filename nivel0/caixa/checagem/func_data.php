<?php

$ip = getenv("REMOTE_ADDR");
$h = getdate(); //variavel recebe a data
$entrada = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

function Convert_Data_Ingl_Port($entradata){
    $conv1 = explode("-",$entradata); 
    $conv2 = array_reverse($conv1); 
    $saidata = implode("/",$conv2); 
    return $saidata; 
}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($entrada);


$ha=date("H");
$hora =date("$ha:i");

//-------------------------------------------------------------------------------------------

?>