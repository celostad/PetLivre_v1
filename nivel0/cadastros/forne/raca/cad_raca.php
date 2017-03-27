<?php
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];

?>
<html>
<head>
<script type="text/javascript" src="../../../../js/func_cad_pet.js"></script>
</head>
<title>Pet Livre  (Cadastro de Raça) </title>
<?
  if ($checa_retorno=="cad_pet"){
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_pet.php\"'>";}
  
   if ($checa_retorno=="alt_pet" and !empty($retorno)){
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_pet.php?id=".$rad_sel_visl."&&ret=".$retorno."\"'>";
}else{
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_pet.php?id=".$rad_sel_visl."\"'>";
}?>

<table width="350" height="84" border="0" align="center" cellpadding="1" cellspacing="1">
  
  <tr> 
    <td width="468" height="82" align="center"> 
      <form name="frmAjax"  enctype="multipart/form-data" method="post">
        <table width="350" border="1" cellpadding="1" cellspacing="1">
          <tr>
            <td height="30" colspan="3" bordercolor="#0099CC" bgcolor="#0099CC"><div align="center"><strong><font color="#FFFFFF">Ra&ccedil;a</font></strong></div></td>
          </tr>
          <tr>
            <td height="50" colspan="3"><div align="center"><strong><em><b><font size="2" face="Times New Roman, Times, serif">Ra&ccedil;a</font></b><font face="Times New Roman, Times, serif"><b><font size="2">:</font></b></font>
                        <input name="txt_raca" type="text" id="txt_raca" style="visibility:visible" size="20" maxlength="18">
                    &nbsp;<a href="javascript:gravar_bairro();"></a><a href="javascript:gravar_raca();"><img src="../../../../imagens/cad_pet/gravar.gif" width="31" height="37" border="0" align="absmiddle"></a></em></strong></div></td>
          </tr>
          <tr>
            <td width="46" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">N&ordm; 
              Ordem</font></b></font></div></td>
            <td width="229" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">Ra&ccedil;a(s) 
              cadastrada(s) </font></b></font></div></td>
            <td width="70"><div align="center"><font size="2" color="#000000">
                <input type="button" name="btn_alterar" value="Alterar" onClick="javascript:alterar_raca();">
            </font></div></td>
          </tr>
          <tr>
            <?
$sql = mysqli_query($connection, "SELECT * FROM combo_raca ORDER BY raca ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));

for ($nro = 1; $nro <= 300; $nro++){

$linha = mysqli_fetch_array($sql);

if ($linha =="") {

}else {

$codigo = $linha['codigo'];

$raca = $linha['raca'];

?>
            <td width="46"><div align="center">&nbsp; <?php echo $nro; ?> </div></td>
            <td width="229"><div align="center">&nbsp; <?php echo $raca; ?> </div></td>
            <td width="70"><div align="center">
                <input type="radio" name="rad_sel" value="<?php echo $codigo; ?>">
            </div></td>
          </tr>
          <?
}
 }
?>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td width="70"><div align="center"><font size="2">
                <input type="button" name="btn_excluir" value="Excluir" onClick="javascript:excluir_raca();">
            </font></div></td>
          </tr>
        </table>
      </form>    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>