<?php
session_start();

include("../../../../include/arruma_link.php");
include($pontos."include/aplication_topo.php");

//limpa sessão
include($pontos."include/limpa_sessao.php");

?>
<html>
<head>
<title><?php echo TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
</head>
<body>
<table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td height="102" colspan="2" valign="top"><?php include($pontos."include/titulo_cima.php"); ?></td>
  </tr>
  <tr>
    <td width="150" height="280" valign="top"><?php include ($pontos."include/menu.php"); ?></td>
    <td width="589" valign="top"><div align="center"><?php  include($pontos."include/menu_cadastros.php"); ?>
	<?php include("lista_categoria.php"); ?></div></td>
  </tr>
  <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <?php include ($pontos."include/rodape.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>
