<form name="form" enctype="multipart/form-data" method="POST">
<table width="70%" border="0" bordercolor="#cccccc" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20"><table width="555" border="0" align="left" cellpadding="1" cellspacing="1">
      <tr>
        <td width="554" align="center" bgcolor="#FF9933"><div align="left" class="style3">
          <div align="center"><strong><? if (empty($rad_sel_visl)){ echo "Cadastro de Categoria";}else{echo "Cadastro de Categoria (".$rad_sel_visl.")";}?></strong></div>
        </div></td>
      </tr>
	  <tr>
	  		<td height="5"></td>
</tr>
    </table></td>
  </tr>
  <tr>
    <td height="164" valign="top"><table width="100%" height="131" border="1" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="360" height="39" align="center"><table width="360" height="20" border="0" cellpadding="2" cellspacing="1">
          <tr>
            <td width="79" height="20"><div align="right"><font size="2"><strong>Categorial:</strong></font></div></td>
            <td width="270" height="20"><input name="txt_razao_social" type="text" id="txt_razao_social" tabindex="1" value="<? echo $txt_razao_social; ?>" size="40"/>              
            <div align="right"><font size="2"></font></div>              <div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font></div></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td width="360" height="90" align="center"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          
          <tr>
            <td width="180" height="37" align="center"><div align="center">
              <table width="180" height="53" border="0" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="52" valign="middle"><div align="center"><a href="javascript:gravar_forne();"><img src="<?=$pontos;?>imagens/cadastro/gravar.gif" alt="Gravar dados do Pet" title="Gravar dados do Pet" width="31" height="37" border="0" tabindex="15" /></a></div></td>
                  <td width="64"><div align="center">
                      <?
if ($nivel>1 and !empty($rad_sel_visl)){echo "<a href=\"javascript:checar('deleta_forne.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cadastro/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\" tabindex=\"16\"></a> ";}?>
                  </div></td>
                  <td width="54" valign="middle"><div align="center">
                      <?
if (empty($retorno)){
echo '<a href="javascript:sair_form();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==1){
echo '<a href="javascript:sair_form_retorna_vindo_busca_pet();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==2){
echo '<a href="javascript:sair_form_retorna_vindo_cad_clie();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Volta para resultado da busca" title="Volta para resultado da busca" width="35" height="37" border="0" tabindex="17" /></a>';
}

if ($retorno==3){
echo '<a href="javascript:sair_form_retorna_vindo_busca_clie();"><img src="'.$pontos.'imagens/cadastro/sair.gif" alt="Sair" title="Sair do formul&aacute;rio" width="35" height="37" border="0" tabindex="17" /></a>';
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
      
      
      
      
    </table></td>
  </tr>
</table>
<br />
</form>
<br />
<br />
