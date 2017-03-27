<?php
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include("checagem/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];

if (empty($rad_sel_visl)){$rad_sel_visl = $_GET["id"];}
if (empty($retorno)){$retorno = $_GET["ret"];}

if (empty($rad_sel_visl)){
$checa_retorno ='cad_pet';
include("checagem/variaveis_tab_temp_pet.php");
}else{
$checa_retorno ='alt_pet';
include("checagem/variaveis_tab_pet.php");
}

// SETA AS SESSÕES
$_SESSION["rad_sel_visl"]=$rad_sel_visl;
$_SESSION["checa_retorno"]=$checa_retorno;
$_SESSION["retorno"]=$retorno;


echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_pet.js"></script>';

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop (Pet)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
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
        <?php include("form_cad_pet.php"); ?>
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