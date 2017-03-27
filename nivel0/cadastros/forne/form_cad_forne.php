<form name="form" enctype="multipart/form-data" method="POST">
<table width="540" border="0" bordercolor="#cccccc" height="281" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20"><table width="555" border="0" align="left" cellpadding="1" cellspacing="1">
      <tr>
        <td width="554" align="center" bgcolor="#FF9933"><div align="left" class="style3">
          <div align="center"><strong><?php if (empty($rad_sel_visl)){ echo "Cadastro de Fornecedor";}else{echo "Cadastro de Fornecedor (".$rad_sel_visl.")";}?></strong></div>
        </div></td>
      </tr>
	  <tr>
	  		<td height="5"></td>
</tr>
    </table></td>
  </tr>
  <tr>
    <td height="225"><table width="540" height="290" border="1" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="360"><table width="360" height="20" border="0" cellpadding="2" cellspacing="1">
          <tr>
            <td width="79" height="20"><div align="right"><font size="2"><strong>Raz&atilde;o
                    Social:</strong></font></div></td>
            <td width="270" height="20"><input name="txt_razao_social" type="text" id="txt_razao_social" tabindex="1" value="<?php echo $txt_razao_social; ?>" size="40"/>              
            <div align="right"><font size="2"></font></div>              <div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font></div></td>
            </tr>
        </table></td>
        <td width="180" rowspan="8" align="center" valign="top"><table width="180" height="249" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td width="180" height="152"><div align="center">
              <table width="180" height="152" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
<td valign="middle">
<?php
if ($txt_caminho_foto1=="") {
  echo '<img src="'.$pontos.'imagens/cadastro/sem_imagem2.gif" width="180" height="152" />';

}else{

  echo '<a href="'.$txt_caminho_foto.'" title="Clique aqui para ampliar" target="_blank"><img src="'.$txt_caminho_foto.'" width=180 height=152 border="0">';
}
?>				  </td>                
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td height="30"><div align="center">
<?php if (!empty($txt_caminho_foto1)){

echo '<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Alterar Foto" onclick="javascript:popup_anexa_foto();" />';
}else{
echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Incluir Foto" onclick="javascript:popup_anexa_foto();" />';
}
?>            </div></td>
          </tr>
          <tr>
            <td height="37"><div align="center">
              <table width="180" height="53" border="0" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="52" valign="middle"><div align="center"><a href="javascript:gravar_forne();"><img src="<?=$pontos;?>imagens/cadastro/gravar.gif" alt="Gravar dados do Pet" title="Gravar dados do Pet" width="31" height="37" border="0" tabindex="15" /></a></div></td>
<td width="65"><div align="center">
<?php
if ($nivel>1 and !empty($rad_sel_visl)){echo "<a href=\"javascript:checar('deleta_forne.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cadastro/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\" tabindex=\"16\"></a> ";}?>
</div></td>
<td width="53" valign="middle"><div align="center">
<?php
if (empty($retorno)){
echo '<a href="javascript:sair_form();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==1){
echo '<a href="javascript:sair_form_retorna_vindo_busca_pet();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==2){
echo '<a href="javascript:sair_form_retorna_vindo_cad_clie();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Volta para resultado da busca" title="Volta para resultado da busca" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==3){
echo '<a href="javascript:sair_form_retorna_vindo_busca_clie();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="17" /></a>';
}

?>
</div></td>
                </tr>
              </table>
              </div></td>
          </tr>
          <tr>
            <td height="30"><div align="center"><font color="#7F9DB9" size="2">&nbsp;Data Cadastro:</font> <font color="#000000" size="2">
<?php if (empty($txt_data_cadastro)){
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
            <td width="60" height="20"><div align="right"><strong><font size="2">Endere&ccedil;o</font></strong></div>
            </td>
            <td width="275"><font size="2">
              <input name="txt_endereco" type="text" id="txt_endereco" value="<?php echo $txt_endereco; ?>" size="40" tabindex="2" />
            </font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="61"><div align="right"><strong><font size="2">Bairro:</font></strong></div>
            </td>
            <td width="181" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
              <?php
$sql_2 = mysqli_query($connection, "select * from combo_bairro ORDER BY bairro ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_bairro' tabindex='3' id='txt_bairro' onchange='javascript:incluir_bairro()'>";
if (!empty($txt_bairro)){
echo "<option value='".$txt_bairro."'>".$txt_bairro."</option>";
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['bairro']."'>".$pega['bairro']."</option>";
}

}else{
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['bairro']."'>".$pega['bairro']."</option>";
}
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysqli_close($sql_2);


if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_bairro();'>";}
if ($checa_retorno==11){echo "<a href='javascript:cad_bairro_cad_clie_banho();'>";}
if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_bairro();'>";}
?>
            </font></b></font></td>
            <td width="28"><div align="right"><strong><font size="2">CEP:</font></strong></div>
            </td>
            <td width="77"><input name="txt_cep" id="cep" tabindex="4" type="text" onkeyup="formata_cep(this.value); somente_numeros(this);" value="<?php echo $txt_cep; ?>" size="7" maxlength="9" />
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="20"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="60" height="20"><div align="right"><strong><font size="2">Cidade:</font></strong></div>
            </td>
            <td width="211"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
<?php
$sql_3 = mysqli_query($connection, "select * from combo_cidade ORDER BY cidade ASC") or print("Erro ao ler a tabela: Cidade ".mysqli_error($connection));
echo "<select name='txt_cidade' tabindex='5' id='txt_cidade' onchange='javascript:incluir_cidade()'>";
if (!empty($txt_cidade)){
echo "<option value='".$txt_cidade."'>".$txt_cidade."</option>";
echo "<option>"."</option>";
while($pega3 = mysqli_fetch_array($sql_3)){
echo "<option value='".$pega3['cidade']."'>".$pega3['cidade']."</option>";
}

}else{
echo "<option>"."</option>";
while($pega3 = mysqli_fetch_array($sql_3)){
echo "<option value='".$pega3['cidade']."'>".$pega3['cidade']."</option>";
}
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysqli_close($sql_3);

if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_cidade();'>";}
if ($checa_retorno==11 ){echo "<a href='javascript:cad_cidade_cad_clie_banho();'>";}

if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_cidade();'>";}


?>
            </font></b></font></td>
            <td width="19"><div align="right"><strong><font size="2">UF:</font></strong></div>
            </td>
            <td width="57" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
              <select name="uf" tabindex="6" id="uf" >
                <?php
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
            </font></strong></font></b></font></div>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360" height="20"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="39"><div align="right"><strong><font size="2">CNPJ:</font></strong></div>
            </td>
            <td width="150"><font size="2">
              <input name="txt_cnpj" type="text" id="txt_cnpj" tabindex="7" onKeyUp="Mascara('CNPJ',this,event);" value="<?php echo $txt_cnpj; ?>" size="18" maxlength="18">
            </font></td>
            <td width="50" height="24"><div align="right"><strong><font size="2">Contato:</font></strong></div>
            </td>
            <td width="108"><input name="txt_contato" type="text" id="txt_contato" tabindex="8" value="<?php echo $txt_contato; ?>" size="15">
            </td>
          </tr>
        </table></td>
      </tr>
      
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="61" height="20"><div align="right"><strong><font size="2">Telefone:</font></strong></div>
            </td>
            <td width="118"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></font><font size="2"><font size="2">
              <input name="txt_ddd_tel" tabindex="9" type="text" id="txt_ddd_tel" value="<?php echo $txt_ddd_tel; ?>" size="1" maxlength="2" />
      -</font><b><font size="2">
      <input name="txt_tel_com" type="text" id="telefone" onkeyup="formata_tel(this.value); somente_numeros(this);" value="<?php echo $txt_tel_com; ?>" size="7" maxlength="9" tabindex="10" />
    </font></b></font></b></font></td>
            <td width="46"><div align="right"><strong><font size="2">Celular:</font></strong></div>
            </td>
            <td width="122" height="20"><font size="2"><font size="2">
              <input name="txt_ddd_cel" tabindex="11" type="text" id="txt_ddd_cel" value="<?php echo $txt_ddd_cel; ?>" size="1" maxlength="2" />
      -
      <input name="txt_cel" type="text" id="cel" onkeyup="formata_cel(this.value); somente_numeros(this);" value="<?php echo $txt_cel; ?>" size="7" maxlength="9" tabindex="12" />
            </font></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="60" height="20"><div align="right"><strong><font size="2">Email</font></strong></div>
            </td>
            <td width="275"><font size="2">
              <input name="txt_email" type="text" id="txt_email" value="<?php echo $txt_email; ?>" size="40" tabindex="13" />
            </font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" height="59" border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td width="60" height="55"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
              <td width="282" height="55"><textarea name="txt_obs_forne" cols="33" rows="4" id="txt_obs_forne" tabindex="14"><?php echo $txt_obs_forne; ?></textarea><?php // echo $rad_sel_visl //$link; "<br>"//$retorno; ?></td>
            </tr>
        </table></td>
      </tr>
      
      
    </table></td>
  </tr>
</table>
<br />
</form>
<br />
<br />