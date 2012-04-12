<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];
$data_atual = Convert_Data_Port_Ingl($entrada);

// FINALIZA O CAIXA

$sql_final = mysql_query("UPDATE `tab_caixa` SET status=1, usuario_final='$usuario', data_finalizacao='$data_atual' WHERE status=0");

header("location: ../index_caixa.php");
     
?>	