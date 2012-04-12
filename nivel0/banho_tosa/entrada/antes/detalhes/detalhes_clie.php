<?
session_start();

require_once("../conexao.php");
include("../../barra.php");

$usuario = $_SESSION["sessao_login"];
$rad_alterar = $_POST["rad_alterar"];

$sql = mysql_query("SELECT * FROM `tab_cad_clie` WHERE codigo='$rad_alterar'") or die("erro ao selecionar");


if ($linha = mysql_fetch_array($sql)) {

$txt_nome_clie = $linha['nome'];
$sel_sexo_clie = $linha['sexo'];
$entradadata = $linha['data_nasc'];
$txt_rg_clie = $linha['rg'];
$txt_cpf_clie = $linha['cpf'];
$txt_end_clie = $linha['endereco'];
$txt_compl_end_clie = $linha['compl_end'];
$txt_cep_clie = $linha['cep'];
$txt_bairro_clie = $linha['bairro'];
$ID_Estados = $linha['estado'];
$ID_Cidades = $linha['cidade'];
$txt_tel_clie = $linha['tel'];
$sel_tipo_tel_clie = $linha['tipo_tel'];
$txt_obs_clie = $linha['obs_cad'];
$checa_erro = $linha['checa_erro'];

function Convert_Data_Ingl_Port($entradata){
    $conv1 = explode("-",$entradata);
    $conv2 = array_reverse($conv1);
    $saidata = implode("/",$conv2);
    return $saidata;
}
//muda tambem $entrada, coloca por exemplo Convert_Data_Ingl_Port($linha[data])

$txt_data_nasc_clie = Convert_Data_Ingl_Port($linha['data_nasc']);

if ($txt_data_nasc_clie =="00/00/0000") {$txt_data_nasc_clie ="";}

}



$sql2 = mysql_query("SELECT * FROM `estados` WHERE ID_ESTADO='$ID_Estados'") or die("erro ao selecionar SQL2");

if ($linha2 = mysql_fetch_array($sql2)) {

$listEstados = $linha2['DSC_ESTADO'];
}

$sql3 = mysql_query("SELECT * FROM `cidades` WHERE ID_CIDADE='$ID_Cidades'") or die("erro ao selecionar SQL3");

if ($linha3 = mysql_fetch_array($sql3)) {

$listCidades = $linha3['DSC_CIDADE'];
}

?>
<html>
<head>
<script type="text/javascript" src="../../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../../js/functions.js"></script>
<script type="text/javascript" src="../../../js/outros.js"></script>
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
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop  (Detalhes do propriet&aacute;rio) </title>
<BODY bgcolor="#FFFFFF">
<table width="535" height="70" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="535" height="50" align="center"><form name="frmAjax"  method="post">
      <div align="center">
        <table width="535" height="70" border="0" align="center" cellpadding="1" cellspacing="1">
          <tr>
            <td width="535" height="70" colspan="3" valign="top">
                <p align="center"><strong><em><u>Detalhes Propriet&aacute;rio</u></em></strong></p>
              <div align="center">
                <table width="535" height="40" cellpadding="0" cellspacing="0" border="0" align="center">
                  <tr>
                    <td height="40" width="535"><table width="535" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                            <td width="535" height="92" colspan="8" align="left"> 
                              <div align="left"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif">Data 
                                Nascimento:</font></b></font></b></font><font size="1"><b><font face="Times New Roman, Times, serif"> 
                                </font></b></font></font></font> <font size="1"> 
                                <? echo $data_nasc_clie; ?>
                                </font></b></font></font></b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Rg</font><font face="Times New Roman, Times, serif">:</font></b></font></font></font></font><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b> 
                                <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font> <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Cpf:</font></b></font></b></font></font> 
                                <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font> 
                                <font face="Times New Roman, Times, serif" size="1"><br>
                                </font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                </font></font></b></font></font><font face="Times New Roman, Times, serif" size="1" color="#999999">Endere&ccedil;o:</font> 
                                <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Compl.:</font> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font><font size="2" face="Times New Roman, Times, serif"><b><font size="1"><br>
                                </font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                </font></font></b></font></font><font size="1" color="#999999">Cep:</font></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" face="Times New Roman, Times, serif" color="#999999">Bairro:</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font><font face="Times New Roman, Times, serif" size="2" color="#999999"><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" face="Times New Roman, Times, serif">Estado:</font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                </b></font><font size="2" face="Times New Roman, Times, serif"><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" color="#999999">Cidade</font><font size="1">:</font></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font><br>
                                </b></font><font size="2" face="Times New Roman, Times, serif"><b><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                </font></font></b></font></font><font size="2" color="#999999"><font size="1">Telefone:</font></font></b></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font><font size="2" face="Times New Roman, Times, serif"><b><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" color="#999999">Tipo:</font></b></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font face="Times New Roman, Times, serif" size="2"><b><font size="1"><br>
                                </font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                                </font></font></b></font></font><font size="1" color="#999999">Observa&ccedil;&atilde;o:</font></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                                <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                                <? echo $data_nasc_clie; ?>
                                </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></div>
                            </td>
                      </tr>
                      </table></td>
                  </tr>
                  </table>
                  <input type="button" name="Button" value="Fechar" onclick="javascript:window.close();">
                </div></td>
          </tr>
        </table>
      </div>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>