<?php
session_start();

require_once("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

$txt_produto = $_POST["txt_produto"];
$sel_categoria = $_POST["sel_categoria"];

$h = getdate(); //variavel recebe a data
$data_atual = $ano = $h['year']."/".$mes = $h['mon']."/".$hoje = $h['mday'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

$sql2 = mysqli_query($connection, "INSERT INTO `tab_produto` (`codigo`, `produto`, `categoria`) VALUES (NULL, '$txt_produto', '$sel_categoria')") or die (mysqli_error($connection));

header("Location: cad_produto.php");    
//  -------------------------------------------------------------------------------------------
?>