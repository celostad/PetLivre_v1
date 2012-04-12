<?
session_start();

include("../../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$checa_retorno = $_SESSION["checa_retorno"];

$usuario = $_SESSION["sessao_login"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql = mysql_query("SELECT * FROM combo_cor WHERE codigo='$txt_rad_sel'") or print("Erro ao ler a tabela:
".mysql_error());


if ($linha = mysql_fetch_array($sql)){

$cor = $linha['cor'];
}

?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/func_cad_pet.js"></script>
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
<?
  if ($checa_retorno=="cad_pet"){
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_pet.php\"'>";}
  
   if ($checa_retorno=="alt_pet"){
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_pet.php\"'>";}
?>
</head>
<title>Pet Livre - (Altera Cor)</title>
<BODY bgcolor="#FFFFFF">
<table width="345" height="100" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="535" height="35" align="center" bordercolor="#0099CC" bgcolor="#0099CC"><strong><font color="#FFFFFF">Alterar Cor</font></strong></td>
  </tr>
  <tr> 
    <td width="535" height="50" align="center"> 
      <form name="frmAjax"  method="post">
        <strong><em><b><font size="2" face="Times New Roman, Times, serif">Cor</font></b><font face="Times New Roman, Times, serif"><b><font size="2">:</font></b></font>
        <input name="txt_cor" type="text" id="txt_cor" style="visibility:visible" size="28" maxlength="30" value="<? echo $cor; ?>">
&nbsp;<a href="javascript:alterar_cor2();"><img src="../../../../imagens/cad_pet/gravar.gif" width="31" height="37" border="0" align="absmiddle"></a></em></strong>
      </form>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>