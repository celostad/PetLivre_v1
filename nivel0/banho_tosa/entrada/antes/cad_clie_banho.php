<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");
include("checagem/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

$sql = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die (mysql_error());
$linha = mysql_fetch_array($sql);

if ($linha==""){
$data_atual = Convert_Data_Port_Ingl($data_atual2);

$sql_7 = mysql_query("INSERT INTO `tab_temp_clie` (`codigo`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$usuario','$data_atual')") or die (mysql_error());}


$sql_ref = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_nome_clie = $linha_ref['nome'];
$sel_sexo = $linha_ref['sexo'];
$txt_end_clie = $linha_ref['endereco'];
$txt_cep_clie = $linha_ref['cep'];
$txt_bairro_clie = $linha_ref['bairro'];
$txt_cidade_clie = $linha_ref['cidade'];
$txt_uf = $linha_ref['uf'];
$txt_ddd_tel_clie = $linha_ref['ddd_tel'];
$txt_tel_clie = $linha_ref['tel'];
$txt_ddd_cel_clie = $linha_ref['ddd_cel'];
$txt_cel_clie = $linha_ref['cel'];
$txt_rg_clie = $linha_ref['rg'];
$txt_obs_clie = $linha_ref['obs'];
$txt_data_nasc_clie = Convert_Data_Ingl_Port($linha_ref['data_nasc']);
$txt_caminho_foto1 = $linha_ref['caminho_foto'];

$txt_caminho_foto ="../foto_webcam/".$txt_caminho_foto1;
}


if ($txt_data_nasc_clie =="00/00/0000"){$txt_data_nasc_clie="";}
if ($sel_sexo=="feminino"){$sel_sexo_descr="Feminino";}
if ($sel_sexo=="masculino"){$sel_sexo_descr="Masculino";}

@mysql_close($sql,$sql_7,$sql_ref);
?>
<html>
<head>
<script type="text/javascript" src="../../../js/func_banho.js"></script>
<script type="text/javascript" src="../../../js/functions.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Clientes)</title>
<? if ($checa_retorno==11){
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"cad_banho.php\"'>";} ?>

<form method="POST" enctype="multipart/form-data" name="form">
  <table width="733" border="0" bordercolor="#cccccc" height="90" align="center" cellpadding="0" cellspacing="0">
    
    <tr>
      <td height="20"><div align="center"><img src="../../../imagens/titulos/titulo_cad_clie.jpg" width="735" height="25"></div></td>
    </tr>
    <tr>
      <td height="19"></td>
    </tr>
    <tr>
      <td height="90"><? include("../../cadastros/clie/templates/template_cad_clie.php"); ?></td>
    </tr>
  </table>
</form>
</body>
</html>