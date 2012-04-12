<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");
include("checagem/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

$checa_retorno=11;

$_SESSION["checa_retorno"]=$checa_retorno;

$sql_ref = mysql_query("SELECT * FROM `tab_temp_banho` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_id_clie = $linha_ref['id_clie'];
$txt_nome_clie = $linha_ref['nome_clie'];
$sel_sexo = strtoupper($linha_ref['sexo_clie']);
$txt_end_clie = strtoupper($linha_ref['endereco']);
$txt_cep_clie = $linha_ref['cep'];
$txt_bairro_clie = strtoupper($linha_ref['bairro']);
$txt_cidade_clie = strtoupper($linha_ref['cidade']);
$txt_uf = $linha_ref['uf'];
$txt_ddd_tel_clie = $linha_ref['ddd_tel'];
$txt_tel_clie = $linha_ref['tel'];
$txt_ddd_cel_clie = $linha_ref['ddd_cel'];
$txt_cel_clie = $linha_ref['cel'];
$txt_rg_clie = $linha_ref['rg'];
$txt_obs_clie = $linha_ref['obs_clie'];
$txt_data_nasc_clie = Convert_Data_Ingl_Port($linha_ref['data_nasc_clie']);
$txt_caminho_foto1 = $linha_ref['caminho_foto_clie'];
$txt_caminho_foto ="../../cadastros/foto_webcam/".$txt_caminho_foto1;
$txt_data_cadastro_clie = Convert_Data_Ingl_Port($linha_ref['data_cadastro_clie']);

$txt_id_animal = $linha_ref['codigo'];
$txt_nome_animal = $linha_ref['nome_animal'];
$txt_raca = $linha_ref['raca'];
$sel_sexo_animal = $linha_ref['sexo_animal'];
$txt_cor = $linha_ref['cor'];
$sel_porte = $linha_ref['porte'];
$sel_especie = $linha_ref['especie'];
$txt_data_nasc_animal = Convert_Data_Ingl_Port($linha_ref['data_nasc_animal']);
$sel_mensal = $linha_ref['mensalista'];
$txt_dono = $linha_ref['dono'];
$txt_cod_dono = $linha_ref['cod_dono'];
$txt_obs_animal = $linha_ref['obs_animal'];
$txt_caminho_foto_animal1 = $linha_ref['caminho_foto_animal'];
$txt_caminho_foto_animal ="../../cadastros/foto_webcam/".$txt_caminho_foto_animal1;
$txt_data_cadastro_animal = Convert_Data_Ingl_Port($linha_ref['data_cad_animal']);

}


if ($txt_data_nasc_clie =="00/00/0000"){$txt_data_nasc_clie="";}
if ($txt_data_cadastro_clie =="00/00/0000"){$txt_data_cadastro_clie="";}
if ($txt_data_nasc_animal =="00/00/0000"){$txt_data_nasc_animal="";}
if ($txt_data_cadastro_animal =="00/00/0000"){$txt_data_cadastro_animal="";}
if ($sel_mensal =="0"){$sel_mensal="";}
if ($sel_mensal =="Não"){$sel_mensal="Não";}


@mysql_close($sql_ref,$sql_2);
?>
<html>
<head>
<script type="text/javascript" src="../../../js/func_banho.js"></script>
<script type="text/javascript" src="../../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../../js/functions.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style3 {	font-size: 18px;
	color: #555;
	font-style: italic;
}
-->
</style>
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Clientes)</title>
<BODY bgcolor="#FFFFFF">
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="733" border="0" bordercolor="#cccccc" height="90" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="15"><div align="center">
          <script language="JavaScript" src="../../../js/menu1.js"></script>
          <? if ($nivel ==1){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_usuario.js\"></script>";} ?>
          <? if ($nivel ==2){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_supervisor.js\"></script>";} ?>
          <? if ($nivel ==3){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_gerente.js\"></script>";} ?>
          <script language="JavaScript" src="../../../js/menu3.js"></script>
      </div></td>
    </tr>
    <tr>
      <td height="19"><div align="center"></div></td>
      <td height="19"><div align="center"></div></td>
    </tr>
    <tr>
      <td height="20"><img src="../../../imagens/titulos/titulo_banho.jpg" width="735" height="25"></td>
    </tr>
    <tr>
      <td height="19"></td>
    </tr>
    <tr>
      <td height="90"><? include("templates/template_cad_banho.php"); ?></td>
    </tr>
    
    <tr>
      <td height="20" align="center" valign="bottom"><div align="center"><font size="1" color="#999999">Usu&aacute;rio Logado:</font><font size="1"><font color="#000000"> <? echo $usuario; ?> </font><font color="#999999">|</font><font color="#000000"> </font><font color="#FFFFFF"><font color="#999999">IP 
        da M&aacute;quina:</font></font><font color="#666666"><font color="#000000"> <? echo $ip = getenv("REMOTE_ADDR")?> <font color="#999999">|</font><font color="#FFFFFF">&nbsp;</font><font color="#999999">Data:</font> </font></font><font color="#FFFFFF"> <font color="#999999"> <font color="#000000">
                <? $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
                </font>|</font>&nbsp;</font><font color="#999999">Hor&aacute;rio:</font><font color="#666666"><font color="#000000">
                <? $ha=date("H");
               echo $date =date("$ha:i"); ?>
            </font></font></font></div></td>
    </tr>
  </table>
</form>
</body>
</html>