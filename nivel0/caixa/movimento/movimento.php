<?
session_start();

include("../../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
//include("../checagem/check_finaliza_caixa.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
//$checa_retorno = $_SESSION["checa_retorno"];

if ($nivel ==1){echo '<script>
alert("                          Atenção!\n\nVocê não tem permissão para visualizar esta página.\n\n")
window.location = "../../index_menu.php"
</script>';
}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// data inicial
$dia_inicial = $_POST["sel_dia_inicial"];
$mes_inicial = $_POST["sel_mes_inicial"];
$ano_inicial = $_POST["sel_ano_inicial"];


// data final
$dia_final = $_POST["sel_dia_final"];
$mes_final = $_POST["sel_mes_final"];
$ano_final = $_POST["sel_ano_final"];


$data_inicial = $ano_inicial."-".$mes_inicial."-".$dia_inicial;
$data_final = $ano_final."-".$mes_final."-".$dia_final;

$data_periodo_inicial = $dia_inicial." / ".$mes_inicial." / ".$ano_inicial;
$data_periodo_final = $dia_final." / ".$mes_final." / ".$ano_final;

// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

// RECEBIDOS
//$sql_caixa = mysql_query("SELECT produto, valor, status, data FROM `tab_caixa` where data >='$data_inicial' and data <='$data_final' and produto <>'' and status=1") or die("erro ao selecionar1");
$sql_caixa = mysql_query("SELECT * FROM `tab_caixa` WHERE status=1 and (data BETWEEN '$data_inicial' AND '$data_final')") or die("erro ao selecionar1");

while ($linha_caixa = mysql_fetch_array($sql_caixa)) {
$txt_valor = $linha_caixa['valor'];
$soma += $txt_valor;
}

// DESPESAS
$sql_caixa2 = mysql_query("SELECT material, valor, status, data FROM `tab_caixa` where material <>'' and status=1 and (data BETWEEN '$data_inicial' AND '$data_final')") or die("erro ao selecionar1");

while ($linha_caixa2 = mysql_fetch_array($sql_caixa2)) {
$txt_valor_saida = $linha_caixa2['valor'];
$saida += $txt_valor_saida;
}

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script>
function voltar(){

document.form.action='index_movimento.php'
document.form.submit();
}
</script>
</head>
<body>
  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
      <td width="589"  valign="top">
<?
echo "Periodo entre: <font size=2>".$data_periodo_inicial."</font>&nbsp;&nbsp;á&nbsp;&nbsp;<font size=2>".$data_periodo_final."</font><br><br>";

   echo "<br><font size=2 color=0000FF><b>Recebimento -&nbsp;&nbsp;Bruto:&nbsp;&nbsp;R$&nbsp;".number_format($soma, 2, ',','.')."</b></font>";
   echo "<br>";
   echo "<font size=2 color=FF0000><b><br>Despesas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;Bruto:&nbsp;&nbsp;R$&nbsp;".number_format($saida, 2, ',','.')."</b></font>";
?>
<form name="form" method="post" action="">
  <div align="center">
    <input type="button" name="Submit" value="Voltar" onClick="javascript:voltar()">
  </div>
</form>
<p align="center">&nbsp;</p></td>
    </tr>
    <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
    </tr>
</table>
</body>
</html>
