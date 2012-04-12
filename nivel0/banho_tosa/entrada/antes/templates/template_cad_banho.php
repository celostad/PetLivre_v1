  <table width="733" border="0" bordercolor="#cccccc" height="492" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="10"><img src="../../../imagens/fundo_cad_cima.jpg" width="735" height="15" border="0" /></td>
    </tr>
    <tr>
      <td height="10" background="../../../imagens/fundo_formulario.jpg"><div align="center"><img src="../../../imagens/teste2.jpg" width="727" height="30" /></div></td>
    </tr>
    <tr>
      <td height="10" nowrap="nowrap" background="../../../imagens/fundo_formulario.jpg"><table width="720" height="188" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="525"><table width="535" border="0" cellspacing="1" cellpadding="1">
                <tr>
                  <td width="39" height="28"><font size="2">C&oacute;digo</font></td>
                  <td width="72" height="28"><input name="txt_id_clie" type="text" id="txt_id_clie" onkeyup="somente_numeros(this);" value="<? echo $txt_id_clie; ?>" size="3" />
                    <a href="javascript:localz_clie_cod();"><img src="../../../imagens/lupa1.jpg" width="20" height="22" border="0" align="absmiddle" /></a></td>
                  <td width="34"><div align="left"><font size="2">Nome:</font></div></td>
                  <td width="242"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                    <?
$sql_3 = mysql_query("select nome from tab_clie ORDER BY nome ASC") or print("Erro ao ler a tabela: Cidade ".mysql_error());
echo "<select name='sel_nome_clie' id='sel_nome_clie' onChange='javascript:combo_sel_dados_clie();'>";
echo "<option value='".$txt_nome_clie."'>".$txt_nome_clie."</option>";
echo "<option>"."</option>";
while($pega3 = mysql_fetch_array($sql_3)){
echo "<option value='".$pega3['nome']."'>".$pega3['nome']."</option>";
}
echo "</select>";

?>
                  </font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><a href="javascript:cad_clie_banho();"><img src="../../../imagens/cadastro.gif" alt="Cadastra cliente" width="10" height="16" border="0" align="absmiddle" /></a></font></b></font></td>
                  <td width="28"><div align="left"><font size="2">Sexo:</font></div></td>
                  <td width="87"><em><strong><font size="1"><font color="#FFFFFF"><font color="#7F9DB9"><font color="#7F9DB9" size="2"> <? echo $sel_sexo; ?> </font></font></font></font></strong></em></td>
                </tr>
              </table>
                <table width="535" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="57" height="22"><div align="left"><font size="2">Endere&ccedil;o:</font></div></td>
                    <td width="318" height="22"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_end_clie; ?></strong></em></font></td>
                    <td width="28"><div align="left"><font size="2">CEP:</font></div></td>
                    <td width="106"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_cep_clie; ?></strong></em></font></td>
                  </tr>
                </table>
              <table width="535" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="41" height="20"><div align="left"><font size="2">Bairro:</font></div></td>
                    <td width="242" height="20"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_bairro_clie; ?></strong></em></font></td>
                    <td width="41"><div align="left"><font size="2">Cidade:</font></div></td>
                    <td width="185" height="20"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_cidade_clie; ?></strong></em></font></td>
                  </tr>
                </table>
              <table width="535" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="21"><div align="left"><font size="2">UF:</font></div></td>
                    <td width="53"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_uf; ?></strong></em></font></td>
                    <td width="54"><div align="right"><font size="2">Telefone:</font></div></td>
                    <td width="148"><font size="2">(&nbsp;<font color="#7F9DB9"><em><strong><? echo $txt_ddd_tel_clie; ?></strong></em></font>&nbsp;)&nbsp;&nbsp;<font size="2"><font color="#7F9DB9"><em><strong><? echo $txt_tel_clie; ?></strong></em></font></td>
                    <td width="46"><div align="right"><font size="2">Celular:</font></div></td>
                    <td width="150"><font size="2">(&nbsp;<font color="#7F9DB9"><em><strong><? echo $txt_ddd_cel_clie; ?></strong></em></font>&nbsp;)&nbsp;&nbsp;<font size="2"><font color="#7F9DB9"><em><strong><? echo $txt_cel_clie; ?></strong></em></font></td>
                  </tr>
                </table>
              <table width="535" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="26" height="26"><div align="left"><font size="2">RG:</font></div></td>
                    <td width="97"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_rg_clie; ?></strong></em></font><font size="3"><font color="#FFFFFF"><font color="#999999"><font color="#000000"></td>
                    <td width="110" height="26"><div align="right"><font size="2">Data Nascimento:</font></div></td>
                    <td width="90" height="26"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_data_nasc_clie; ?></strong></em></font></td>
                    <td width="79"><font color="#000000" size="2">Data Cadastro:</font>
                        </div>                    </td>
                    <td width="95"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_data_cadastro_clie;?> </strong></em></font></td>
                  </tr>
                </table>
              <table width="535" height="47" border="0" cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="32" height="43"><div align="left"><font size="2">Obs:</font></div></td>
                    <td width="383" height="43"><textarea name="txt_obs_clie" cols="54" id="txt_obs_clie"><? echo $txt_obs_clie; ?></textarea></td>
                  </tr>
              </table></td>
            <td width="175" height="145"><table width="175" height="140" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><div align="center">
                      <? if ($txt_caminho_foto1==""){echo '<img src="../../../imagens/semimagem.jpg" width="175" height="145" />';
}else{
 echo "<a href=\"$txt_caminho_foto\" target='_blank'><img src=\"$txt_caminho_foto\" width=175 heigth=145>";
}
 ?>
                  </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10" background="../../../imagens/fundo_formulario.jpg"><div align="center"><img src="../../../imagens/meio_formulario_cad_banho.jpg" width="727" height="30" /></div></td>
    </tr>
    <tr>
      <td height="10" background="../../../imagens/fundo_formulario.jpg"><table width="720" height="124" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="535"><table width="535" height="20" border="0" cellpadding="2" cellspacing="2">
                <tr>
                  <td width="39" height="20"><div align="left"><font size="2">Nome:</font></div></td>
                  <td width="166" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
                    <?
$sql_4 = mysql_query("SELECT cod_dono,nome FROM tab_animal WHERE cod_dono='$txt_id_clie' ORDER BY nome ASC") or print("Erro ao ler a tabela: ANIMAL ".mysql_error());
echo "<select name='sel_nome_animal' id='sel_nome_animal' onChange='javascript:combo_sel_dados_animal();'>";
echo "<option value='".$txt_nome_animal."'>".$txt_nome_animal."</option>";
echo "<option>"."</option>";
while($pega4 = mysql_fetch_array($sql_4)){
echo "<option value='".$pega4['nome']."'>".$pega4['nome']."</option>";
}
echo "</select>";

?>
                  </font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><a href="javascript:cad_animal_banho();"><img src="../../../imagens/cadastro.gif" alt="Cadastra cliente" width="10" height="16" border="0" align="absmiddle" /></a></font></b></font></b></font></td>
                  <td width="29"><div align="left"><font size="2">Ra&ccedil;a:</font></div></td>
                  <td width="131"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_raca; ?></strong></em></font></td>
                  <td width="28"><div align="left"><font size="2">Sexo:</font></div></td>
                  <td width="104"><font size="2" color="#7F9DB9"><em><strong><? echo $sel_sexo_animal; ?></strong></em></font></td>
                </tr>
              </table>
                <table width="535" height="20" border="0" cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="34" height="20"><div align="left"><font size="2">Porte:</font></div></td>
                    <td width="99" height="20"><font size="2" color="#7F9DB9"><em><strong><? echo $sel_porte; ?></strong></em></font></td>
                    <td width="25"><div align="left"><font size="2">Cor:</font></div></td>
                    <td width="224"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_cor; ?></strong></em></font></td>
                    <td width="45"><div align="left"><font size="2">Esp&eacute;cie:</font></div></td>
                    <td width="77"><font size="2" color="#7F9DB9"><em><strong><? echo $sel_especie; ?></strong></em></font></td>
                  </tr>
                </table>
              <table width="535" height="20" border="0" cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="61" height="20"><div align="left"><font size="2">Data Nasc:</font></div></td>
                    <td width="123" height="20"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_data_nasc_animal; ?></strong></em></font></td>
                    <td width="62" height="20"><div align="left"><font size="2">Mensalista:</font></div></td>
                    <td width="76" height="20"><font size="2" color="#7F9DB9"><em><strong><? echo $sel_mensal; ?></strong></em></font></td>
                    <td width="78"><font color="#000000" size="2">Data Cadastro</font></td>
                    <td width="97"><font size="2" color="#7F9DB9"><em><strong><? echo $txt_data_cadastro_animal;?></strong></em></font></td>
                  </tr>
                </table>
              <table width="535" height="43" border="0" cellpadding="2" cellspacing="2">
                  <tr>
                    <td width="32" height="39"><div align="left"><font size="2">Obs:</font></div></td>
                    <td width="383" height="39"><textarea name="textarea" cols="54" rows="4" id="textarea"><? echo $txt_obs_animal; ?></textarea></td>
                  </tr>
              </table></td>
            <td width="175" height="124"><table width="175" height="97" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="95"><div align="center">
                      <? if ($txt_caminho_foto_animal1==""){echo '<img src="../../../imagens/semimagem.jpg" width="175" height="145" />';
}else{
 echo "<a href=\"$txt_caminho_foto_animal\" target='_blank'><img src=\"$txt_caminho_foto_animal\" width=175 heigth=145>";
}
 ?>
                  </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="41" nowrap="nowrap" background="../../../imagens/fundo_formulario.jpg">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" nowrap="nowrap" background="../../../imagens/fundo_formulario.jpg"><div align="center">
        <input type="button" name="Button" value="Voltar" onclick="javascript:voltar();" />
      </div></td>
    </tr>
    <tr>
      <td height="15" align="center" valign="bottom"><img src="../../../imagens/fundo_cad_baixo.jpg" width="735" height="15" /></td>
    </tr>
  </table>