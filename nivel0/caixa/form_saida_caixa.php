<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<form name="form" enctype="multipart/form-data" method="POST">
  <table width="400" border="0" bordercolor="#cccccc" height="235" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="547" height="22" valign="top" bgcolor="#CC0000"><div align="center" class="style3"><strong> <? echo "Saída no caixa  -  ";?> 
<? if (empty($txt_data_cadastro)){
$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
}else{
echo Convert_Data_Ingl_Port($txt_data_cadastro);
}
?>
      </strong></div></td>
    </tr>
    <tr>
      <td width="547" valign="top"><table width="400" height="190" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="547"><table width="400" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="53" height="20"><div align="right"><font size="2"><strong>Material:</strong></font></div></td>
                <td width="286" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                    <?
$sql_2 = mysql_query("select codigo, material from tab_material ORDER BY material ASC") or print("Erro ao ler a tabela:
".mysql_error());
echo "<select name='txt_material' tabindex='1' id='txt_material' onchange='javascript:cad_material()'>";
echo "<option value='".$cod_material."'>".$txt_material."</option>";
echo "<option>"."</option>";
while($pega = mysql_fetch_array($sql_2)){
echo "<option value='".$pega['codigo']."'>".$pega['material']."</option>";
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysql_close($sql_2);

?>
                </font></b></font></div></td>
                </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="400" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="54"><div align="right"><b><font size="2">Qtde:</font></b></div></td>
              <td width="289"><input name="txt_qtde" type="text" id="txt_qtde" tabindex="4" value="<? echo $txt_qtde; ?>" size="6" maxlength="9"/></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="400" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="53"><div align="right"><strong><font size="2">Medida:</font></strong></div></td>
              <td width="290"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                <b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                <select name="sel_medida" tabindex="3" id="sel_medida" >
                  <option value="<? echo $sel_medida; ?>"><? echo $sel_medida;?></option>
                  <option value="Unidade">Unidade</option>
                  <option value="Grama">Grama</option>
                  <option value="Quilo">Quilo</option>
                  <option value="Litro">Litro</option>
                </select>
                </font></strong></font></b>              </font></strong></font></b></font></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="547"><table width="400" border="0" cellspacing="1" cellpadding="1">
            
            <tr>
              <td width="53" height="20"><div align="right"><strong><font size="2">Valor:</font></strong></div></td>
              <td width="290"><input name="txt_valor" type="text" id="txt_valor" tabindex="4" onkeydown="Formata(this,20,event,2)" value="<?=$txt_valor;?>" size="9" maxlength="9"/></td>
            </tr>
          </table></td>
        </tr>
        
        <tr>
          <td width="547"><table width="400" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="53"><div align="right"><strong><font size="2">Esp&eacute;cie</font></strong></div></td>
                <td width="290" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
<?php
$sql_4 = mysql_query("select codigo, especie from combo_especie ORDER BY codigo ASC") or print("Erro ao ler a tabela:
".mysql_error());
echo "<select name='txt_especie' tabindex='5' id='txt_especie' onchange='javascript:tipo_especie()'>";
echo "<option value='".$txt_cod_especie."'>".$txt_especie."</option>";
echo "<option>"."</option>";
while($pega4 = mysql_fetch_array($sql_4)){
echo "<option value='".$pega4['codigo']."'>".$pega4['especie']."</option>";
}
echo "</select>";

@mysql_close($sql_4); 
?>
               </font></strong></font></b></font></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="547" height="61"><table width="400" height="68" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="53" height="66"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
                <td width="290" height="66"><textarea name="txt_obs_caixa" cols="33" rows="3" id="txt_obs_caixa" tabindex="6"><? echo $txt_obs_caixa; ?></textarea>
                    <? //echo $retorno; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="547" height="22"><div align="center">
              <table width="170" height="38" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="53" height="38" valign="middle"><div align="center">
                      <input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar saída no caixa"  onclick="javascript:gravar_saida_caixa();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
                  </div></td>
                  <td width="57"><div align="center">
                      <? if ($nivel>1 and !empty($rad_sel_visl)){
echo '<input type="image" name="ImageField2" src="'.$pontos.'imagens/cad_clie/fechar.gif" onclick="javascript:checar("deleta_clie.php?id='.$rad_sel_visl.');" width="37" height="37" border="0" tabindex="19" alt="Apagar registro" title="Apagar registro">'; 

/* 
echo "<a href=\"javascript:checar('deleta_clie.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cad_clie/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\"></a> ";
*/  

}?>
                  </div></td>
                  <td width="71" valign="middle"><div align="center">
<? 
echo '<a href="javascript:sair_form();"><img src="'.$pontos.'imagens/cad_clie/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="19" /></a>';

?>
                  </div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
