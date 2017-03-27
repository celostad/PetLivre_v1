<?php
session_start();

include("../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
//include("checagem/check_finaliza_caixa.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// ATRIBUI VALORES AS VARIÁVEIS MOSTRADAS
if (!empty($_SESSION["Dados_post"])){

$Dados_post = $_SESSION["Dados_post"];
foreach ($Dados_post as $key => $row) {

$txt_cod_prod = $row['cod_produto'];
$txt_produto = $row['produto'];
$txt_cod_pet = $row['cod_pet'];
$txt_pet = $row['pet'];
$txt_qtde = $row['qtde'];
$sel_medida = $row['medida'];
$txt_valor = $row['valor'];
$txt_obs_mensal = $row['obs'];


}// fecha foreach
}
//print_r($Dados_post);

$select = 1;

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="../../js/func_mensalista.js"></script>
</head>
<body>
  <table width="740" height="671" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><?php include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" rowspan="2" valign="top"><?php include ($pontos."include/menu.php"); ?></td>
      <td width="589" height="20" valign="top"><div align="center">
	  <?php  include($pontos."include/menu_mensalista.php"); ?>
        </div>
      </td>
    </tr>
    <tr>
      <td valign="top"><div align="center">
          <?php include("form_entrada_mensalista.php"); ?>
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
