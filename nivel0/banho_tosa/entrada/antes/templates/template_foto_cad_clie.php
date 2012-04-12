<table width="180" height="180" border="1" cellpadding="0" cellspacing="0" bordercolor="#7F9DB9" bgcolor="#FFFFFF">
  <? if ($txt_caminho_foto1=="") {?>
  <tr>
    <td height="135"><div align="center">
      <input name="balizador" type="file" id="balizador" size="10">
      <br>
    </div></td>
  </tr>
  <tr>
    <td height="35"><div align="center">
      <input type="button" name="btn_anx_foto" id="btn_anx_foto" value="Anexar Foto" onClick="javascript: valida_campos();">
    </div></td>
  </tr>
  <? }else{ ?>
  <tr>
    <td height="135"><div align="center"><? echo "<a href=\"$txt_caminho_foto\" target='_blank'><img src=\"$txt_caminho_foto\" width=175 heigth=135>";?> </div></td>
  </tr>
  <tr>
    <td height="35"><div align="center">
	<input name="btn_alt_foto" type="button" id="btn_alt_foto" value="Alterar" onClick="javascript:altera_foto();">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input name="btn_excl_foto" type="button" id="btn_excl_foto" value="Excluir" onClick="javascript:exclui_foto();">
    </div></td>
  </tr>
  <? } ?>
</table>
