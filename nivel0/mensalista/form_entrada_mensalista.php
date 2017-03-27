<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
  <table width="385" border="0" bordercolor="#cccccc" align="center" cellpadding="0" cellspacing="0">
    <form name="form" enctype="multipart/form-data" method="POST">
	<tr>
	
      <td width="547" height="22" valign="top" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3"><strong> <?php echo "Mensalista  -  ";?> 
<?php $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
      </strong></div></td>
    </tr>
    <tr>
      <td width="547" valign="top"><table width="430" height="190" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="424"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="70" height="20"><div align="right"><font size="2"><strong>Mensalista:</strong></font></div></td>
                <td width="290" height="25"><div align="left">
                  <?
$sql1 = mysqli_query($connection, "select codigo, nome from tab_pet where mensalista='Sim' ORDER BY nome ASC") or print("Erro ao ler a tabela: tab_pet".mysqli_error($connection));
echo "<select name='txt_cod_pet' tabindex='1' id='txt_cod_pet'>";
if (!empty($txt_pet)){
echo "<option value='".$txt_cod_pet."'>".$txt_pet."</option>";
}
echo "<option>"."</option>";
while($pega1 = mysqli_fetch_array($sql1)){
echo "<option value='".$pega1['codigo']."'>".$pega1['nome']."</option>";
}
echo "</select>";

@mysql_close($sql1);
?>
                </div></td>
                </tr>
              
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="70"><div align="right"><font size="2"><strong>Produto:</strong></font></div></td>
              <td width="290"><div align="left">
                <?
$sql_2 = mysqli_query($connection, "select codigo, produto from tab_produto ORDER BY produto ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));
echo "<select name='txt_cod_prod' tabindex='2' id='txt_cod_prod' onchange='javascript:cad_produto_mensal()'>";
echo "<option value='".$txt_cod_prod."'>".$txt_produto."</option>";
echo "<option>"."</option>";
while($pega = mysqli_fetch_array($sql_2)){
echo "<option value='".$pega['codigo']."'>".$pega['produto']."</option>";
}
echo "<option></option>";
echo "<option value='-- Incluir  /  Alterar --'>-- Incluir  /  Alterar --</option>";
echo "</select>";

@mysql_close($sql_2);
?>
              </div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="70"><div align="right"><b><font size="2">Qtde:</font></b></div></td>
              <td width="290"><input name="txt_qtde" type="text" id="txt_qtde" tabindex="2" value="<?
			  echo $txt_qtde; ?>" size="5" maxlength="6" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="70"><div align="right"><strong><font size="2">Medida:</font></strong></div></td>
              <td width="290"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                <select name="sel_medida" tabindex="3" id="sel_medida" >
                  <?php if(!empty($sel_medida)){echo '<option value="'.$sel_medida.'">'.$sel_medida.'</option>';} ?>
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
          <td width="424"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="70" height="20"><div align="right"><strong><font size="2">Valor:</font></strong></div></td>
              <td width="290"><input name="txt_valor" type="text" id="txt_valor" tabindex="4" onkeydown="Formata(this,20,event,2)" value="<?php echo $txt_valor;?>" size="9" maxlength="9"/></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="61"><table width="100%" height="68" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="70" height="66"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
                <td width="290" height="66"><textarea name="txt_obs_mensal" cols="33" rows="3" id="txt_obs_mensal" tabindex="6"><?php echo $txt_obs_mensal; ?></textarea>
                    <?php //echo $retorno; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="22"><div align="center">
              <table width="170" height="38" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="53" height="38" valign="middle"><div align="center">
                      <input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar entrada mensalista"  onclick="javascript:gravar_mensal();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
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
            </div></td>
        </tr>
      </table></td>
	  
    </tr>
	</form>
  </table>