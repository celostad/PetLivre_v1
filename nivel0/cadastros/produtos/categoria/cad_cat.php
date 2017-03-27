<?php
session_start();

include("../../../../include/arruma_link.php");
include($pontos."include/aplication_topo.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];


if (empty($rad_sel_visl)){$rad_sel_visl = $_GET["id"];}
if (empty($retorno)){$retorno = $_GET["ret"];}

if (empty($rad_sel_visl)){
//echo "Entrou 1";
$checa_retorno ='cad_cat';
include("checagem/variaveis_tab_temp_forne.php");
}else{
//echo "Entrou 2";
$checa_retorno ='alt_forne';
include("checagem/variaveis_tab_forne.php");
}

// SETA AS SESSÕES
$_SESSION["rad_sel_visl"]=$rad_sel_visl;
$_SESSION["checa_retorno"]=$checa_retorno;
$_SESSION["retorno"]=$retorno;




?>
<html>
<head>
<title><?php echo TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="<?=$pontos;?>js/func_cad_forne.js"></script>
</head>
<body>
<table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td height="102" colspan="2" valign="top"><?php include($pontos."include/titulo_cima.php"); ?></td>
  </tr>
  <tr>
    <td width="140" height="282" valign="top"><?php include ($pontos."include/menu.php"); ?></td>
    <td width="593" valign="top">
      <div align="right">
        <?php include("form_cad_cat.php"); ?>
    </div></td>
  </tr>
  <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <?php include ($pontos."include/rodape.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>