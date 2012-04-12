<table width="180" height="180" border="1" cellpadding="0" cellspacing="0" bordercolor="#7F9DB9" bgcolor="#FFFFFF">
  <? if ($txt_caminho_foto1=="") {?>
  <tr>
    <td height="135"><p align="center">
      <input name="balizador" type="file" id="balizador" size="10" />
      <br />
    </p></td>
  </tr>
  <tr>
    <td height="35"><div align="center">
      <input type="button" name="Button" value="Anexar Foto" onclick="javascript: anexa_foto_cad_clie_ver_alterar();" />
    </div></td>
  </tr>
  <? }else{ ?>
  <tr>
    <td height="135"><p align="center">
      <?
			  echo "<a href=\"$dir_backup\" target='_blank'><img src=\"$dir_backup\" width=175 height=135>";
			  ?>
    </p></td>
  </tr>
  <tr>
    <td height="35"><div align="center">
      <input name="btn_alt_foto2" type="button" id="btn_alt_foto2" value="Alterar" onclick="javascript:volta_para_alterar_foto_ver_altera_cad_clie();" />
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input name="btn_excl_foto2" type="button" id="btn_excl_foto2" value="Excluir" onclick="javascript:exclui_foto_cad_clie_ver_alterar();" />
    </div></td>
  </tr>
  <? } ?>
</table>
