<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];

require_once("checa_alteracao.php");


if ($checa_retorno==1){ header("Location: ../../foto_webcam/index_altera_foto.php");}
if ($checa_retorno==10){ header("Location: ../cad_clie.php");}
if ($checa_retorno==3 or $checa_retorno==4){ header("Location: ../../foto_webcam/index_altera_foto2.php");}
if ($checa_retorno==30){ header("Location: ../cad_clie_ver_alterar_refresh.php");}

?>
