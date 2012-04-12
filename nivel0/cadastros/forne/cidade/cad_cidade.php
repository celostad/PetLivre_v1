<?
session_start();

include("../../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];

?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/func_cad_clie.js"></script>
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
<title>Pet Livre  (Cadastro de cidade) </title>
<?
  if ($checa_retorno=="cad_forne"){
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_forne.php\"'>";}
  
   if ($checa_retorno=="alt_forne" and !empty($retorno)){
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_forne.php?id=".$rad_sel_visl."&&ret=".$retorno."\"'>";
}else{
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_forne.php?id=".$rad_sel_visl."\"'>";
}

?>
<table width="350" height="157" border="0" align="center" cellpadding="1" cellspacing="1">
  
  
  <tr> 
    <td width="468" height="155" align="center"> 
      <form name="frmAjax"  method="post">
        <div align="center">
          <table width="350" border="1" cellpadding="1" cellspacing="1">
          <tr>
            <td colspan="3" bordercolor="#66CC66" bgcolor="#66CC66"><div align="center"><strong><font color="#FFFFFF">Cidade</font></strong></div></td>
          </tr>
          <tr>
            <td height="50" colspan="3"><div align="center"><strong><em><b><font size="2" face="Times New Roman, Times, serif">cidade</font></b><font face="Times New Roman, Times, serif"><b><font size="2">:</font></b></font>
                        <input name="txt_cidade" type="text" id="txt_cidade" style="visibility:visible" size="25" maxlength="25">
              &nbsp;<a href="javascript:gravar_cidade();"><img src="../../../../imagens/cad_clie/gravar.gif" width="31" height="37" border="0" align="absmiddle"></a></em></strong></div></td>
          </tr>
          <tr>
            <td width="46" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">N&ordm; 
              Ordem</font></b></font></div></td>
            <td width="229" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">cidade(s) 
              cadastrada(s) </font></b></font></div></td>
            <td width="70"><div align="center"><font size="2" color="#000000">
                <input type="button" name="btn_alterar" value="Alterar" onClick="javascript:alterar_cidade();">
            </font></div></td>
          </tr>
          <tr>
            <?
$sql = mysql_query("SELECT * FROM combo_cidade ORDER BY cidade ASC") or print("Erro ao ler a tabela:
".mysql_error());

for ($nro = 1; $nro <= 300; $nro++){

$linha = mysql_fetch_array($sql);

if ($linha =="") {
break;
}else {

$codigo = $linha['codigo'];

$cidade = $linha['cidade'];

?>
            <td width="46"><div align="center">&nbsp; <? echo $nro; ?> </div></td>
            <td width="229"><div align="center">&nbsp; <? echo $cidade; ?> </div></td>
            <td width="70"><div align="center">
                <input type="radio" name="rad_sel" value="<? echo $codigo; ?>">
            </div></td>
          </tr>
          <?
}
 }
@mysql_close($sql);

?>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td width="70"><div align="center"><font size="2">
                <input type="button" name="btn_excluir" value="Excluir" onClick="javascript:excluir_cidade();">
            </font></div></td>
          </tr>
        </table>
        </div>
      </form>    </td>
  </tr>
</table>
</body>
</html>