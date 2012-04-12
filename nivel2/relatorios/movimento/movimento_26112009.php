<?php
session_start();

include("../../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include_once($pontos."include/func_data.php");

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo $pontos;?>css/config.css" rel="stylesheet" type="text/css">
<script>
function voltar(){

document.form.action='index_movimento.php'
document.form.submit();
}


function detalhes_mov(){

document.form.action='detalhe_movimento.php';
document.form.target="_self";
document.form.submit();

}


</script>
<style type="text/css">
<!--
.style6 {font-size: 14px}
.style7 {font-size: 36px}
-->
</style>
</head>
<body>
<?php
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



if (!empty($_GET['data_inicial']) && !empty($_GET['data_final'])){

$data_inicial = $_GET["data_inicial"];
$data_final = $_GET["data_final"];

$data_periodo_inicial = Convert_Data_Ingl_Port($data_inicial);
$data_periodo_final = Convert_Data_Ingl_Port($data_final);

}else{

$data_inicial = $ano_inicial."-".$mes_inicial."-".$dia_inicial;
$data_final = $ano_final."-".$mes_final."-".$dia_final;

$data_periodo_inicial = $dia_inicial." / ".$mes_inicial." / ".$ano_inicial;
$data_periodo_final = $dia_final." / ".$mes_final." / ".$ano_final;
}

// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

// RECEBIDOS
//$sql_caixa = mysql_query("SELECT produto, valor, status, data FROM `tab_caixa` where data >='$data_inicial' and data <='$data_final' and produto <>'' and status=1") or die("erro ao selecionar1");
$sql_caixa = mysql_query("SELECT * FROM `tab_caixa` WHERE status=1 and (data BETWEEN '$data_inicial' AND '$data_final' && cod_produto<>0)") or die("erro ao selecionar1");

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

  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
      <td width="589"  valign="top"><div align="center">
        <form name="form" method="post" action="">
		<input type="hidden" name="data_inicial" value="<?php echo $data_inicial; ?>">
		<input type="hidden" name="data_final" value="<?php echo $data_final; ?>">
		
		
          <table width="400" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td height="42" colspan="3"><div align="center"><strong><span class="style6">Periodo entre:&nbsp;&nbsp;</span><font color="#0000FF" size="2"><?php echo $data_periodo_inicial; ?></font> </font><span class="style6">&nbsp;&nbsp;&aacute;&nbsp;&nbsp;</span><font size="2" color="#0000FF"><?php echo $data_periodo_final; ?></font></font></strong></div></td>
            </tr>
            <tr>
              <td height="30" class="info"><div align="center">Recebimento</div></td>
              <td class="info"><div align="center">R$ &nbsp;<?php echo number_format($soma, 2, ',','.'); ?></div></td>
              <td class="info"><div align="center"><a href="javascript:detalhes_mov();"><span class="classe2"><img src="../../../imagens/btn_detalhes.gif" width="40" height="15" border="0" usemap="#Map"></span></a></div></td>
            </tr>
            <tr>
              <td width="138" height="31" class="info"><div align="center">Despesas</div></td>
              <td width="140" class="info"><div align="center">R$ <?php echo number_format($saida, 2, ',','.'); ?></div></td>
              <td width="114" class="info">&nbsp;</td>
            </tr>
            <tr>
              <td height="50" colspan="3" valign="middle"><div align="center">
                  <input type="button" name="Submit" value="Voltar" onClick="javascript:voltar()">
              </div></td>
            </tr>
          </table>
        </form>
        </div>
					  
      </td>
    </tr>
    <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
    </tr>
</table>

<map name="Map"><area shape="rect" coords="3,3,41,15" href="javascript:detalhes_mov();"></map></body>
</html>
