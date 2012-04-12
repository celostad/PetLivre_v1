<?
session_start();

include("../../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];


include("../checagem/grava_variaveis_bd.php");
header("Location: cad_clie_bairro.php");
?>