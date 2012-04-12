<?php
session_start();

include("../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$data_atual = Convert_Data_Port_Ingl($data_atual2);


//print_r($dia);
//print_r($data_atual);

include($pontos."include/config_permissao_user.php");
include("checagem/check_finaliza_caixa.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

//APAGA DADOS TAB_TEMP_CAIXA
$sql_apaga_temp_caixa = mysql_query("SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("erro ao selecionar1: sql_apaga_temp_caixa");

if ($linha_apaga_temp_caixa = mysql_fetch_array($sql_apaga_temp_caixa)) {
//APAGA DADOS TEMPORARIOS TABELA CLIENTE
$sql1 = "DELETE FROM `tab_temp_caixa` WHERE `usuario` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete TAB_TEMP_CAIXA - SQL1");
}



$select = 1;
?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<link  href="../../include/ajax/estilos/estilos.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
      <td width="589"  valign="top"><?php  include($pontos."include/menu_caixa.php"); ?>
	  <? if($caixa==1){ include("lista_caixa.php");}else{include("checagem/msg_finalizar_caixa.php");}
 ?></td>
    </tr>
    <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
    </tr>
</table>
</body>
</html>