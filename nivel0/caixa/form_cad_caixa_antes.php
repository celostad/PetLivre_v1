<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<form name="form" enctype="multipart/form-data" method="POST">
  <table width="385" border="0" bordercolor="#cccccc" height="235" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="547" height="22" valign="top" bgcolor="#CC0000"><div align="center" class="style3"><strong> <? echo "Entrada no caixa  -  ";?> 
<?php if (empty($txt_data_cadastro)){
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
      <td width="547" valign="top"><table width="430" height="190" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="424"><table width="430" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="50" height="20"><div align="right"><font size="2"><strong>Produto:</strong></font></div></td>
                <td width="30" height="25"><div align="left">
<?
$sql_2 = mysql_query("select codigo, produto from tab_produto ORDER BY produto ASC") or print("Erro ao ler a tabela:
".mysql_error());
echo "<select name='txt_produto' tabindex='1' id='txt_produto' onchange='javascript:cad_produto()'>";
echo "<option value='".$txt_cod_prod."'>".$txt_produto."</option>";
echo "<option>"."</option>";
while($pega = mysql_fetch_array($sql_2)){
echo "<option value='".$pega['codigo']."'>".$pega['produto']."</option>";
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysql_close($sql_2);
?>

              </div></td>
<input type="hidden" id="dados" name="txt_cod_prod" value="">			  
                <td width="22" id="esconde" style="<?=$x;?>" ><div align="right" class="style2"><font size="2">Pet:</font></div></td>
                <td width="113" id="esconde2" style="<?=$x;?>" ><div align="left">
                  <input name="txt_pet" type="text" id="txt_pet" value="<? echo $txt_pet; ?>" size="10" maxlength="20" />
                  <a href="javascript:sel_pet();"><img src="<?=$pontos;?>imagens/atualizar.jpg" width="14" height="16" border="0" /></a></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="410" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="53"><div align="right"><b><font size="2">Qtde:</font></b></div></td>
              <td width="290"><input name="txt_qtde" type="text" id="txt_qtde" tabindex="2" value="<? echo $txt_qtde; ?>" size="5" maxlength="6" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="410" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="53"><div align="right"><strong><font size="2">Medida:</font></strong></div></td>
              <td width="290"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                <select name="sel_medida" tabindex="3" id="sel_medida" >
                  <option value="<? echo $sel_medida; ?>"><? echo $sel_medida; ?></option>
                  <option></option>
                  <option value="Unidade">Unidade</option>
                  <option value="Litro">Litro</option>
                  <option value="Quilo">Quilo</option>
                  <option value="Grama">Grama</option>
				  
                </select>
              </font></strong></font></b></font></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424"><table width="410" border="0" cellspacing="1" cellpadding="1">
            
            <tr>
              <td width="53" height="20"><div align="right"><strong><font size="2">Valor:</font></strong></div></td>
              <td width="290"><input name="txt_valor" type="text" id="txt_valor" tabindex="4" onkeydown="Formata(this,20,event,2)" value="<?=$txt_valor;?>" size="9" maxlength="9"/></td>
            </tr>
          </table></td>
        </tr>
        
        <tr>
          <td width="424"><table width="410" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="53"><div align="right"><strong><font size="2">Esp&eacute;cie</font></strong></div></td>
                <td width="290" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                    <select name="txt_especie" tabindex="5" id="txt_especie" >
                      <option value="<? echo $txt_especie; ?>" selected><? echo $txt_especie; ?></option>
                      <option></option>
                      <option value="Dinheiro">Dinheiro</option>
                      <option value="Cart&atilde;o Cr&eacute;dito">Cart&atilde;o Cr&eacute;dito</option>
                      <option value="Cart&atilde;o D&eacute;bito">Cart&atilde;o D&eacute;bito</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Pendentes">Pendentes</option>
                      <option value="Outros">Outros</option>
                    </select>
                </font></strong></font></b></font></div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="61"><table width="410" height="68" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="53" height="66"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
                <td width="290" height="66"><textarea name="txt_obs_caixa" cols="33" rows="3" id="txt_obs_caixa" tabindex="6"><? echo $txt_obs_caixa; ?></textarea>
                    <? //echo $retorno; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="22"><div align="center">
              <table width="170" height="38" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="53" height="38" valign="middle"><div align="center">
                      <input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar entrada no caixa"  onclick="javascript:gravar_caixa();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
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
if (empty($retorno)){
echo '<a href="javascript:sair_form();"><img src="'.$pontos.'imagens/cad_clie/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="19" /></a>';
}

if ($retorno==1){
echo '<a href="javascript:sair_form_retorna_vindo_busca_clie();"><img src="'.$pontos.'imagens/cad_clie/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="19" /></a>';

}

if ($retorno==2){
echo '<a href="javascript:sair_form_retorna_vindo_cad_pet();"><img src="'.$pontos.'imagens/cad_clie/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="19" /></a>';
}

if ($retorno==3){
echo '<a href="javascript:sair_form_retorna_vindo_busca_pet();"><img src="'.$pontos.'imagens/cad_clie/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="19" /></a>';

}

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
