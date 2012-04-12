<?
session_start();

include("../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

/*
echo "phpself: ".$phpself;
echo "<br>link: ".$link;
*/

// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
</head>
<body>
  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><? require($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
      <td width="589" valign="top"><div align="center"><? include ("lista_menu.php"); ?> </div></td>
    </tr>
    <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
    </tr>
  </table>
</body>
</html>
