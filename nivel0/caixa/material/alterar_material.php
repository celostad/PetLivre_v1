<?php
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");


$usuario = $_SESSION["sessao_login"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql = mysqli_query($connection, "SELECT * FROM tab_material WHERE codigo='$txt_rad_sel'") or print("Erro ao ler a tabela:
".mysqli_error($connection));


if ($linha = mysqli_fetch_array($sql)){

$material = $linha['material'];
$sel_categoria = $linha['categoria'];
}

?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/func_caixa.js"></script>
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
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../saida_caixa.php\"'>";
  
?>
</head>
<title>Pet Livre - (Alterar Material)</title>
<BODY bgcolor="#FFFFFF">
<table width="430" height="100" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="535" height="35" align="center" bordercolor="#CC0000" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Alterar
    Material</strong></font></td>
  </tr>
  <tr> 
    <td width="535" height="50" align="center" valign="middle"> 
      <form name="frmAjax"  method="post">
        <table width="430" border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td width="219"><strong><em><b><font size="2" face="Times New Roman, Times, serif">Material</font></b><font face="Times New Roman, Times, serif"><b><font size="2">:</font></b></font>
                  <input name="txt_material" type="text" id="txt_material" style="visibility:visible" size="20" maxlength="25" value="<?php echo $material; ?>">
            </em></strong></td>
            <td width="211"><strong><em><b><font size="2" face="Times New Roman, Times, serif">Categoria:</font></b>
<?
$sql_2 = mysqli_query($connection, "select codigo, categoria_mat from combo_categoria ORDER BY categoria_mat ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='sel_categoria' tabindex='1' id='sel_categoria'>";
echo "<option value='".$sel_categoria."'>".$sel_categoria ."</option>";
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['categoria_mat']."'>".$pega['categoria_mat']."</option>";
}
echo "</select>";

@mysql_close($sql_2);
?>                  <a href="javascript:alterar_material2();"><img src="../../../imagens/cad_clie/gravar.gif" width="31" height="37" border="0" align="absmiddle" alt="Gravar" title="Gravar"></a></em></strong></td>
          </tr>
        </table>
          </form>    </td>
  </tr>
</table>
</body>
</html>