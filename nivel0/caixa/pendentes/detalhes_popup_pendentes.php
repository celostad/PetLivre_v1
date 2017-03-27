<?php
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];

$cod_pendente = $_GET["cod_pendente"];

?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/func_caixa.js"></script>
<script>
/*function fecha(){
this.opener.location="entrada_caixa.php";
window.setInterval("self.close();window.opener.focus();",1000);
}*/
</script>
</head>
<title>Pet Livre  (Detalhes (Pendentes)) </title>

<?php 

$sql_pendente = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE codigo='$cod_pendente'")Or die ("Erro na tabela: tab_caixa - sql_pendente".mysqli_error($connection));

	if ($linha_pendente = mysqli_fetch_array($sql_pendente)){
	
	$codigo_bd = $linha_pendente ['codigo'];
	$data_bd = Convert_Data_Ingl_Port($linha_pendente ['data']);
	$obs_bd = $linha_pendente ['obs'];
}


?>
<table width="435" height="174" border="0" align="center" cellpadding="1" cellspacing="1">
  
  <tr> 
    <td width="468" height="172" align="center"> 
      <form name="frmAjax"  method="post">
        <div align="center"> 
          <table width="435" height="164" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr> 
              <td width="535" height="168" colspan="3" valign="middle"><table width="100%" border="1" cellpadding="1" cellspacing="1">
                <tr>
                  <td align="center" bgcolor="#6600CC"><font color="#FFFFFF"><strong>Pendentes (Detalhes)</strong></font></td>
                </tr>
                <tr>
                  <td height="134"><table width="100%" border="0">
                    <tr>
                      <td width="18%" height="28"><div align="right"><font color="#000000"><b><font size="2">C&oacute;digo</font></b></font>:&nbsp;&nbsp;</div></td>
                      <td width="82%"><?php echo $codigo_bd; ?></td>
                    </tr>
                    <tr>
                      <td height="29"><div align="right"><font color="#000000"><b><font size="2">Data:&nbsp;&nbsp;</font></b></font></div></td>
                      <td><?php echo $data_bd; ?></td>
                    </tr>
                    <tr>
                      <td height="79"><div align="right"><font color="#000000"><b><font size="2">Observa&ccedil;&atilde;o:&nbsp;&nbsp;</font></b></font></div></td>
                      <td><label>
                        <textarea name="textarea" cols="40" rows="4"><?php echo $obs_bd; ?></textarea>
                      </label></td>
                    </tr>
                    
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#6600CC"><font color="#FFFFFF"><strong>
                    <div align="center">Pagamento</div>
                  </strong></font></td>
                </tr>
                <tr>
                  <td height="44"><table width="100%" border="0">
                    <tr>
                      <td width="13%"><div align="left"><strong><font size="2">Esp&eacute;cie</font></strong></div></td>
                      <td width="57%"><?
$sql_4 = mysqli_query($connection, "select codigo, especie from combo_especie ORDER BY codigo ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_especie' tabindex='5' id='txt_especie' onchange='javascript:tipo_especie()'>";
echo "<option value='".$txt_cod_especie."'>".$txt_especie."</option>";
echo "<option>"."</option>";
while($pega4 = mysqli_fetch_array($sql_4)){
echo "<option value='".$pega4['codigo']."'>".$pega4['especie']."</option>";
}
echo "</select>";

@mysql_close($sql_4);
?></td>
                      <td width="30%"><div align="center">
<input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar pagamento pendente"  onclick="javascript:gravar_pag_pendente();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
                  </div></td>
                    </tr>
                    
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </form>    </td>
  </tr>
</table>
</body>
</html>
