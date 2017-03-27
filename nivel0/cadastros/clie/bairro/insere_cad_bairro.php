<?php
session_start();

require_once("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

$txt_bairro = $_POST["txt_bairro"];
//$txt_bairro_alta = strtoupper($txt_pet);

$h = getdate(); //variavel recebe a data
$data_atual = $ano = $h['year']."/".$mes = $h['mon']."/".$hoje = $h['mday'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

$sql2 = mysqli_query($connection, "INSERT INTO `combo_bairro` (`codigo`, `bairro`) VALUES (NULL, '$txt_bairro')") or die (mysqli_error($connection));

header("Location: cad_clie_bairro.php");    
//  -------------------------------------------------------------------------------------------
?>
