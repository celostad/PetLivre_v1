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
      <td width="547" height="22" valign="top" bgcolor="#999999"><div align="center" class="style3"><strong> <?php echo "Banho e Tosa  -  ";?> 
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
      <td width="547" valign="top"><table width="540" height="190" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><font color="#FFFFFF" size="3"><strong>Dados do Cliente</strong></font></div></td>
        </tr>
        <tr>
          <td width="590"><table width="540" height="215" border="1" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="60" height="20"><div align="right"><font size="2"><strong>Nome:</strong></font></div>
                    </td>
                    <td width="278" height="20"><input name="txt_nome_clie2"  tabindex="1" type="text" id="txt_nome_clie22" value="<?php echo $txt_nome_clie; ?>" size="42" />
                    </td>
                  </tr>
                </table>
              </td>
              <td width="180" rowspan="7" align="center" valign="top"><table width="186" height="210" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                  <tr>
                    <td width="182" height="154"><div align="center">
                        <table width="180" height="152" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td valign="middle"><?
//echo "txt_caminho_foto1: ".$txt_caminho_foto1;

if (empty($txt_caminho_foto1)) {
echo '<img src="'.$pontos.'imagens/cad_clie/sem_imagem2.gif" width="180" height="152" />';
}else{

echo '<a href="'.$txt_caminho_foto.'" title="Clique aqui para ampliar" target="_blank"><img src="'.$txt_caminho_foto.'" width=180 height=152 border="0">';
}
?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td height="52"><div align="center">
                        <?php if (!empty($txt_caminho_foto1)){

echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Alterar Foto" onclick="javascript:popup_anexa_foto();" />';
}else{
echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Incluir Foto" onclick="javascript:popup_anexa_foto();" />';
}
?>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="60"><div align="right"><b><font size="2">Endere&ccedil;o:</font></b></div>
                    </td>
                    <td width="278" height="20"><input name="txt_end_clie" tabindex="2" type="text" id="txt_end_clie" value="<?php echo $txt_end_clie; ?>" size="42" />
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="61"><div align="right"><strong><font size="2">Bairro:</font></strong></div>
                    </td>
                    <td width="181" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                      <?
$sql_2 = mysqli_query($connection, "select * from combo_bairro ORDER BY bairro ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_bairro_clie' tabindex='3' id='txt_bairro_clie' onchange='javascript:incluir_bairro()'>";
if (!empty($txt_bairro_clie)){
echo "<option value='".$txt_bairro_clie."'>".$txt_bairro_clie."</option>";
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

@mysql_close($sql_2);


if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_bairro();'>";}
if ($checa_retorno==11){echo "<a href='javascript:cad_bairro_cad_clie_banho();'>";}
if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_bairro();'>";}
?>
                    </font></b></font></td>
                    <td width="28"><div align="right"><strong><font size="2">CEP:</font></strong></div>
                    </td>
                    <td width="77"><input name="txt_cep_clie" tabindex="4" type="text" id="cep" onkeyup="formata_cep(this.value); somente_numeros(this);" value="<?php echo $txt_cep_clie; ?>" size="7" maxlength="9" />
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="60" height="20"><div align="right"><strong><font size="2">Cidade:</font></strong></div>
                    </td>
                    <td width="211"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                      <?
$sql_3 = mysqli_query($connection, "select * from combo_cidade ORDER BY cidade ASC") or print("Erro ao ler a tabela: Cidade ".mysqli_error($connection));
echo "<select name='txt_cidade_clie' tabindex='5' id='txt_cidade_clie' onchange='javascript:incluir_cidade()'>";
if (!empty($txt_cidade_clie)){
echo "<option value='".$txt_cidade_clie."'>".$txt_cidade_clie."</option>";
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

@mysql_close($sql_3);

if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_cidade();'>";}
if ($checa_retorno==11 ){echo "<a href='javascript:cad_cidade_cad_clie_banho();'>";}

if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_cidade();'>";}


?>
                    </font></b></font></td>
                    <td width="19"><div align="right"><strong><font size="2">UF:</font></strong></div>
                    </td>
                    <td width="57" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
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
                      </font></strong></font></b></font></div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="61" height="20"><div align="right"><strong><font size="2">Telefone:</font></strong></div>
                    </td>
                    <td width="118"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></font><font size="2"><font size="2">
                      <input name="txt_ddd_tel_clie" tabindex="7" type="text" id="txt_ddd_tel_clie" value="<?php echo $txt_ddd_tel_clie; ?>" size="1" maxlength="2" />
            -</font><b><font size="2">
            <input name="txt_tel_clie" type="text" id="telefone" onkeyup="formata_tel(this.value); somente_numeros(this);" value="<?php echo $txt_tel_clie; ?>" size="7" maxlength="9" tabindex="8" />
          </font></b></font></b></font></td>
                    <td width="46"><div align="right"><strong><font size="2">Celular:</font></strong></div>
                    </td>
                    <td width="122" height="20"><font size="2"><font size="2">
                      <input name="txt_ddd_cel_clie" tabindex="9" type="text" id="txt_ddd_cel_clie" value="<?php echo $txt_ddd_cel_clie; ?>" size="1" maxlength="2" />
            -
            <input name="txt_cel_clie" type="text" id="cel" onkeyup="formata_cel(this.value); somente_numeros(this);" value="<?php echo $txt_cel_clie; ?>" size="7" maxlength="9" tabindex="10" />
                    </font></font></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="61"><div align="right"><strong><font size="2">CPF:</font></strong></div>
                    </td>
                    <td width="170"><font size="2" face="Times New Roman, Times, serif"><b>
                      <input name="txt_cpf" type="text" id="txt_cpf" tabindex="11" onkeyup="formata_cpf(this.value); somente_numeros(this);"  value="<?php echo $txt_cpf; ?>" size="14" maxlength="14" />
                    </b></font></td>
                    <td width="25"><div align="right"><strong><font size="2">RG:</font></strong></div>
                    </td>
                    <td width="91"><font size="2" face="Times New Roman, Times, serif"><b>
                      <input name="txt_rg_clie" type="text" id="txt_rg_clie" tabindex="12" value="<?php echo $txt_rg_clie; ?>" size="9" maxlength="11" />
                    </b></font></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360" height="30"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="104" height="26"><div align="right"><strong><font size="2">Data
                            Nascimento:</font></strong></div>
                    </td>
                    <td width="63" height="26"><font size="2">
                      <input name="txt_data_nasc_clie" type="text" id="data"  onkeyup="formata(this);" value="<?php echo $txt_data_nasc_clie; ?>" size="8" maxlength="10" tabindex="13" />
                    </font></td>
                    <td width="62"><div align="right"><font size="2"><strong>Sexo:</strong></font></div>
                    </td>
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
                </table>
              </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><font color="#FFFFFF" size="3"><strong>Dados
                  do Pet</strong></font></div>
          </td>
        </tr>
        <tr>
          <td width="590" height="61"><table width="540" height="189" border="1" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="360"><table width="360" height="20" border="0" cellpadding="2" cellspacing="1">
                  <tr>
                    <td width="40" height="20"><div align="right"><font size="2"><strong>Nome:</strong></font></div>
                    </td>
                    <td width="114" height="20"><input name="txt_nome_pet" type="text" id="txt_nome_pet" tabindex="1" value="<?php echo $txt_nome_pet; ?>" size="19"/>
                    </td>
                    <td width="31"><div align="right"><font size="2"><strong>Ra&ccedil;a:</strong></font></div>
                    </td>
                    <td width="154"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                        <?php
$sql_2 = mysqli_query($connection, "select * from combo_raca ORDER BY raca ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_raca' id='txt_raca' tabindex='3' onchange='javascript:cad_raca()'>";
if (!empty($txt_raca)){
echo "<option value='".$txt_raca."'>".$txt_raca."</option>";
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['raca']."'>".$pega['raca']."</option>";
}
}else{
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['raca']."'>".$pega['raca']."</option>";
}
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

if ($checa_retorno==1 or $checa_retorno==3){echo "<a href='javascript:cad_raca();'>";}
if ($checa_retorno==10 or $checa_retorno==30){echo "<a href='javascript:foto_cad_raca();'>";}
?>
                      </font></b></font></div>
                    </td>
                  </tr>
                </table>
              </td>
              <td width="180" rowspan="5" align="center" valign="top"><table width="186" height="197" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                  <tr>
                    <td width="180" height="154" valign="top"><div align="center">
                        <table width="180" height="152" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td valign="middle">
                              <?php
if ($txt_caminho_foto1=="") {
echo '<img src="'.$pontos.'imagens/cad_pet/sem_imagem2.gif" width="180" height="152" />';
}else{

echo '<a href="'.$txt_caminho_foto.'" title="Clique aqui para ampliar" target="_blank"><img src="'.$txt_caminho_foto.'" width=180 height=152 border="0">';
}
?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td height="40"><div align="center">
                        <?php if (!empty($txt_caminho_foto1)){

echo '<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Alterar Foto" onclick="javascript:popup_anexa_foto();" />';
}else{
echo'<input type="button" name="btn_anx_foto" id="btn_anx_foto" tabindex="16" value="Incluir Foto" onclick="javascript:popup_anexa_foto();" />';
}
?>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="40"><div align="right"><strong><font size="2">Sexo:</font></strong></div>
                    </td>
                    <td width="129">
                      <select name="txt_sexo" id="txt_sexo" tabindex="3">
                        <?
				if (!empty($txt_sexo)){
				echo '<option value="'.$txt_sexo.'">'.$txt_sexo.'</option>';
				}
			?>
                        <option></option>
                        <option value="Macho">Macho</option>
                        <option value="F&ecirc;mea">F&ecirc;mea</option>
                      </select>
                    </td>
                    <td width="48" height="20"><div align="right"><strong><font size="2">Porte:</font></strong></div>
                    </td>
                    <td width="130"><select name="txt_porte" id="txt_porte" tabindex="4">
                        <?
			if (!empty($txt_porte)){
			echo '<option value="'.$txt_porte.'">'.$txt_porte.'</option>';
			}
			?>
                        <option></option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="M&eacute;dio">M&eacute;dio</option>
                        <option value="Grande">Grande</option>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="40"><div align="right"><strong><font size="2">Cor:</font></strong></div>
                    </td>
                    <td width="173" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                      <?
$sql_1 = mysqli_query($connection, "select * from combo_cor ORDER BY cor ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_cor' id='txt_cor' tabindex='5' onchange='javascript:cad_cor()'>";
if (!empty($txt_cor)){
echo "<option value='".$txt_cor."'>".$txt_cor."</option>";
echo "<option>"."</option>";
while($pega1 = mysqli_fetch_array($sql_1)){
echo "<option value='".$pega1['cor']."'>".$pega1['cor']."</option>";
}
}else{
echo "<option>"."</option>";
while($pega1 = mysqli_fetch_array($sql_1)){
echo "<option value='".$pega1['cor']."'>".$pega1['cor']."</option>";
}
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

?>
                    </font></b></font></td>
                    <td width="45"><div align="left"><strong><font size="2">Esp&eacute;cie:</font></strong></div>
                    </td>
                    <td width="89"><select name="txt_especie" id="txt_especie" tabindex="6">
                        <?
if (!empty($txt_especie)){
echo '<option value="'.$txt_especie.'">'.$txt_especie.'</option>';
$x_especie="";
}else{
$x_especie='selected="selected"'; 
}
?>
                        <option></option>
                        <option value="Canina" <?=$x_especie?>>Canina</option>
                        <option value="Felina">Felina</option>
                        <option value="Roedor">Roedor</option>
                        <option value="Outra">Outra</option>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="60" height="20"><div align="left"><strong><font size="2">Data
                            Nasc:</font></strong></div>
                    </td>
                    <td width="110"><font size="2">
                      <input name="txt_data_nasc" type="text" id="txt_data_nasc" onchange="validaData(this);" onkeyup="formata(this);" value="<?php echo $txt_data_nasc; ?>" size="8" maxlength="10" tabindex="7" />
                    </font></td>
                    <td width="64"><div align="left"><strong><font size="2">Mensalista:</font></strong></div>
                    </td>
                    <td width="113" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></font></b></font>
                            <select name="txt_mensal" id="txt_mensal" tabindex="8">
                              <?php
if (!empty($txt_mensal)){
echo '<option value="'.$txt_mensal.'">'.$txt_mensal.'</option>';
$x_mensal="";
}else{
$x_mensal='selected="selected"'; 
}
?>
                              <option></option>
                              <option value="N&atilde;o" <?=$x_mensal?>>N&atilde;o</option>
                              <option value="Sim">Sim</option>
                            </select>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="360" height="67"><table width="360" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="40" height="20"><div align="right"><strong><font size="2">Chip:</font></strong></div>
                    </td>
                    <td width="139"><font size="2" face="Times New Roman, Times, serif"><b>
                      <input name="txt_chip" type="text" id="txt_chip" tabindex="9" onkeyup="somente_numeros(this);" value="<?php echo $txt_chip; ?>" size="14" maxlength="14" />
                    </b></font></td>
                    <td width="46"><div align="right"><strong><font size="2">RGA:</font></strong></div>
                    </td>
                    <td width="122" height="20"><font size="2" face="Times New Roman, Times, serif"><b>
                      <input name="txt_rga" type="text" id="txt_rga" tabindex="10" value="<?php echo $txt_rga; ?>" size="9" maxlength="11" />
                    </b></font></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><font color="#FFFFFF" size="3"><strong>Dados
                  do Banho</strong></font></div>
          </td>
        </tr>
        <tr>
          <td height="22">&nbsp;</td>
        </tr>
        <tr>
          <td width="590" height="22"><div align="center">
              <table width="170" height="38" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="53" height="38" valign="middle"><div align="center">
                      <input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar entrada no caixa"  onclick="javascript:gravar_caixa();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
                  </div></td>
                  <td width="57"><div align="center">
                      <?php if ($nivel>1 and !empty($rad_sel_visl)){
echo '<input type="image" name="ImageField2" src="'.$pontos.'imagens/cad_clie/fechar.gif" onclick="javascript:checar("deleta_clie.php?id='.$rad_sel_visl.');" width="37" height="37" border="0" tabindex="19" alt="Apagar registro" title="Apagar registro">'; 

/* 
echo "<a href=\"javascript:checar('deleta_clie.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cad_clie/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\"></a> ";
*/  

}?>
                  </div></td>
                  <td width="71" valign="middle"><div align="center">
                      <?php 
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
              <font color="#7F9DB9" size="2">&nbsp;Data do banho:</font> <font color="#000000" size="2">
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
  </table>
</form>