<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];

include("../checagem/grava_variaveis_bd.php");

header("Location: cad_raca.php");

?>