<link href="../../../css/config.css" rel="stylesheet" type="text/css" />
<form name="form" enctype="multipart/form-data" method="POST">
<table width="550" border="0" bordercolor="#cccccc" height="244" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="550" height="22" valign="top" bgcolor="#66CC66"><div align="center" class="style3"><strong>
      <? if (empty($rad_sel_visl)){ echo "Cadastro de Cliente";}else{echo "Cadastro de Cliente (".$rad_sel_visl.")";}?>
    </strong></div></td>
  </tr>
  <tr>
    <td height="135" valign="top"><table width="540" height="261" border="1" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="60" height="20"><div align="right"><font size="2"><strong>Nome:</strong></font></div></td>
              <td width="278" height="20"><input name="txt_nome_clie"  tabindex="1" type="text" id="txt_nome_clie" value="<? echo $txt_nome_clie; ?>" size="42" /></td>
            </tr>
        </table></td>
        <td width="180" rowspan="8" align="center" valign="top"><table width="186" height="249" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td width="182" height="152"><div align="center">
                  <table width="180" height="152" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                    <tr>
                      <td valign="middle"><?
//echo "txt_caminho_foto1: ".$txt_caminho_foto1;

if (empty($txt_caminho_foto1)) {
echo '<img src="'.$pontos.'imagens/cad_clie/sem_imagem2.gif" width="180" height="152" />';
}else{

echo '<a href="'.$txt_caminho_foto.'" title="Clique aqui para ampliar" target="_blank"><img src="'.$txt_caminho_foto.'" width=180 height=152 border="0">';
}
?>                      </td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td height="30"><div align="center">
                  <? if (!empty($txt_caminho_foto1)){

echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Alterar Foto" onclick="javascript:popup_anexa_foto();" />';
}else{
echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Incluir Foto" onclick="javascript:popup_anexa_foto();" />';
}
?>
              </div></td>
            </tr>
            <tr>
              <td height="37"><div align="center">
                  <table width="180" height="53" border="0" cellpadding="1" cellspacing="1">
                    <tr>
                      <td width="52" valign="middle"><div align="center">
                          <input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar dados do cliente"  onclick="javascript:gravar_clie();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
                      </div></td>
                      <td width="65"><div align="center">
                          <? if ($nivel>1 and !empty($rad_sel_visl)){
echo '<input type="image" name="ImageField2" src="'.$pontos.'imagens/cad_clie/fechar.gif" onclick="javascript:checar("deleta_clie.php?id='.$rad_sel_visl.');" width="37" height="37" border="0" tabindex="19" alt="Apagar registro" title="Apagar registro">'; 

/* 
echo "<a href=\"javascript:checar('deleta_clie.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cad_clie/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\"></a> ";
*/  

}?>
                      </div></td>
                      <td width="53" valign="middle"><div align="center">
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
            <tr>
              <td height="30"><div align="center"><font color="#7F9DB9" size="2">&nbsp;Data Cadastro:</font> <font color="#000000" size="2">
                  <? if (empty($txt_data_cadastro)){
$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
}else{
echo Convert_Data_Ingl_Port($txt_data_cadastro);
}
?>
              </font></div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="60"><div align="right"><b><font size="2">Endere&ccedil;o:</font></b></div></td>
              <td width="278" height="20"><input name="txt_end_clie" tabindex="2" type="text" id="txt_end_clie" value="<? echo $txt_end_clie; ?>" size="42" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="61"><div align="right"><strong><font size="2">Bairro:</font></strong></div></td>
              <td width="181" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                <?
$sql_2 = mysql_query("select * from combo_bairro ORDER BY bairro ASC") or print("Erro ao ler a tabela:
".mysql_error());
echo "<select name='txt_bairro_clie' tabindex='3' id='txt_bairro_clie' onchange='javascript:incluir_bairro()'>";
if (!empty($txt_bairro_clie)){
echo "<option value='".$txt_bairro_clie."'>".$txt_bairro_clie."</option>";
echo "<option>"."</option>";
while($pega = mysql_fetch_array($sql_2)){
echo "<option value='".$pega['bairro']."'>".$pega['bairro']."</option>";
}

}else{
echo "<option>"."</option>";
while($pega = mysql_fetch_array($sql_2)){
echo "<option value='".$pega['bairro']."'>".$pega['bairro']."</option>";
}
}

echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysql_close($sql_2);


if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_bairro();'>";}
if ($checa_retorno==11){echo "<a href='javascript:cad_bairro_cad_clie_banho();'>";}
if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_bairro();'>";}
?>
              </font></b></font></td>
              <td width="28"><div align="right"><strong><font size="2">CEP:</font></strong></div></td>
              <td width="77"><input name="txt_cep_clie" tabindex="4" type="text" id="cep" onkeyup="formata_cep(this.value); somente_numeros(this);" value="<? echo $txt_cep_clie; ?>" size="7" maxlength="9" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="60" height="20"><div align="right"><strong><font size="2">Cidade:</font></strong></div></td>
              <td width="211"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                <?
$sql_3 = mysql_query("select * from combo_cidade ORDER BY cidade ASC") or print("Erro ao ler a tabela: Cidade ".mysql_error());
echo "<select name='txt_cidade_clie' tabindex='5' id='txt_cidade_clie' onchange='javascript:incluir_cidade()'>";
if (!empty($txt_cidade_clie)){
echo "<option value='".$txt_cidade_clie."'>".$txt_cidade_clie."</option>";
echo "<option>"."</option>";
while($pega3 = mysql_fetch_array($sql_3)){
echo "<option value='".$pega3['cidade']."'>".$pega3['cidade']."</option>";
}

}else{
echo "<option>"."</option>";
while($pega3 = mysql_fetch_array($sql_3)){
echo "<option value='".$pega3['cidade']."'>".$pega3['cidade']."</option>";
}
}

echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysql_close($sql_3);

if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_cidade();'>";}
if ($checa_retorno==11 ){echo "<a href='javascript:cad_cidade_cad_clie_banho();'>";}

if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_cidade();'>";}


?>
              </font></b></font></td>
              <td width="19"><div align="right"><strong><font size="2">UF:</font></strong></div></td>
              <td width="57" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                  <select name="uf" tabindex="6" id="uf" >
<?
if (!empty($txt_uf)){
echo '<option value="'.$txt_uf.'">'.$txt_uf.'</option>';
$x_uf="";
}else{
$x_uf='selected="selected"'; 
}
?>
			  <option></option>
			  <option value="SP" <?=$x_uf?>>SP</option>
			  <option value="RJ">RJ</option>
			  <option value="MG">MG</option>
               </select>
              </font></strong></font></b></font></div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="61" height="20"><div align="right"><strong><font size="2">Telefone:</font></strong></div></td>
              <td width="118"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font><font size="2"><font size="2">
                <input name="txt_ddd_tel_clie" tabindex="7" type="text" id="txt_ddd_tel_clie" value="<? echo $txt_ddd_tel_clie; ?>" size="1" maxlength="2" />
                -</font><b><font size="2">
                  <input name="txt_tel_clie" type="text" id="telefone" onkeyup="formata_tel(this.value); somente_numeros(this);" value="<? echo $txt_tel_clie; ?>" size="7" maxlength="9" tabindex="8" />
                </font></b></font></b></font></td>
              <td width="46"><div align="right"><strong><font size="2">Celular:</font></strong></div></td>
              <td width="122" height="20"><font size="2"><font size="2">
                <input name="txt_ddd_cel_clie" tabindex="9" type="text" id="txt_ddd_cel_clie" value="<? echo $txt_ddd_cel_clie; ?>" size="1" maxlength="2" />
                -
                <input name="txt_cel_clie" type="text" id="cel" onkeyup="formata_cel(this.value); somente_numeros(this);" value="<? echo $txt_cel_clie; ?>" size="7" maxlength="9" tabindex="10" />
              </font></font></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="61"><div align="right"><strong><font size="2">CPF:</font></strong></div></td>
              <td width="170"><font size="2" face="Times New Roman, Times, serif"><b>
                <input name="txt_cpf" type="text" id="txt_cpf" tabindex="11" onkeyup="formata_cpf(this.value); somente_numeros(this);"  value="<? echo $txt_cpf; ?>" size="14" maxlength="14" />
              </b></font></td>
              <td width="25"><div align="right"><strong><font size="2">RG:</font></strong></div></td>
              <td width="91"><font size="2" face="Times New Roman, Times, serif"><b>
                <input name="txt_rg_clie" type="text" id="txt_rg_clie" tabindex="12" value="<? echo $txt_rg_clie; ?>" size="9" maxlength="11" />
              </b></font></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="104" height="26"><div align="right"><strong><font size="2">Data Nascimento:</font></strong></div></td>
              <td width="63" height="26"><font size="2">
                <input name="txt_data_nasc_clie" type="text" id="data"  onkeyup="formata(this);" value="<? echo $txt_data_nasc_clie; ?>" size="8" maxlength="10" tabindex="13" />
              </font></td>
              <td width="62"><div align="right"><font size="2"><strong>Sexo:</strong></font></div></td>
              <td width="118"><strong><font size="2">
                <select name="sel_sexo" id="sel_sexo" tabindex="14">
<?
if (!empty($sel_sexo)){
echo '<option value="'.$sel_sexo.'">'.$sel_sexo_descr.'</option>';
}
?>
                  <option></option>
                  <option value="feminino">Feminino</option>
                  <option value="masculino">Masculino</option>
                </select>
              </font></strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360" height="61"><table width="360" height="59" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="60" height="55"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
              <td width="282" height="55"><textarea name="txt_obs_clie" cols="33" rows="3" id="txt_obs_clie" tabindex="15"><? echo $txt_obs_clie; ?></textarea>
                  <? //echo $retorno; ?></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
