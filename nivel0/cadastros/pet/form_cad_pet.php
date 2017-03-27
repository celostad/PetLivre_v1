<?php
if (!isset($txt_nome_pet)) {$txt_nome_pet = '';}
if (!isset($txt_caminho_foto1)) {$txt_caminho_foto1 = '';}
if (!isset($txt_chip)) {$txt_chip = '';}
if (!isset($txt_rga)) {$txt_rga = '';}
if (!isset($txt_obs_pet)) {$txt_obs_pet = '';}



?>

<form name="form" enctype="multipart/form-data" method="POST">
<table width="540" border="0" bordercolor="#cccccc" height="281" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20"><table width="555" border="0" align="left" cellpadding="1" cellspacing="1">
      <tr>
        <td width="554" align="center" bgcolor="#0099CC"><div align="left" class="style3">
          <div align="center"><strong><?php if (empty($rad_sel_visl)){ echo "Cadastro de Pet";}else{echo "Cadastro de Pet (".$rad_sel_visl.")";}?></strong></div>
        </div></td>
      </tr>
	  <tr>
	  		<td height="5"></td>
</tr>
    </table></td>
  </tr>
  <tr>
    <td height="225"><table width="540" height="261" border="1" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="360"><table width="360" height="20" border="0" cellpadding="2" cellspacing="1">
          <tr>
            <td width="40" height="20"><div align="right"><font size="2"><strong>Nome:</strong></font></div></td>
            <td width="114" height="20"><input name="txt_nome_pet" type="text" id="txt_nome_pet" tabindex="1" value="<?php echo $txt_nome_pet; ?>" size="19"/></td>
            <td width="31"><div align="right"><font size="2"><strong>Ra&ccedil;a:</strong></font></div></td>
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
?></a></font></b></font></div></td>
            </tr>
        </table></td>
        <td width="180" rowspan="7" align="center" valign="top"><table width="180" height="249" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td width="180" height="152"><div align="center">
              <table width="180" height="152" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
<td valign="middle">
<?php
if ($txt_caminho_foto1=="") {
echo '<img src="'.$pontos.'imagens/cad_pet/sem_imagem2.gif" width="180" height="152" />';
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
                  <td width="52" valign="middle"><div align="center"><a href="javascript:gravar_pet();"><img src="<?=$pontos;?>imagens/cad_pet/gravar.gif" alt="Gravar dados do Pet" title="Gravar dados do Pet" width="31" height="37" border="0" tabindex="13" /></a></div></td>
<td width="65"><div align="center">
<?php
if ($nivel>1 and !empty($rad_sel_visl)){echo "<a href=\"javascript:checar('deleta_pet.php?id=".$rad_sel_visl."');\"><img src=\"".$pontos."imagens/cad_pet/fechar.gif\" border=\"0\" title=\"Apagar registro\" alt=\"Apagar registro\" width=\"37\" height=\"37\" tabindex=\"14\"></a> ";}?>
</div></td>
<td width="53" valign="middle"><div align="center">
<?php
if (empty($retorno)){
echo '<a href="javascript:sair_form();"><img src="'.$pontos.'imagens/cad_pet/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="15" /></a>';
}

if ($retorno==1){
echo '<a href="javascript:sair_form_retorna_vindo_busca_pet();"><img src="'.$pontos.'imagens/cad_pet/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="15" /></a>';
}

if ($retorno==2){
echo '<a href="javascript:sair_form_retorna_vindo_cad_clie();"><img src="'.$pontos.'imagens/cad_pet/sair.gif" alt="Volta para resultado da busca" title="Volta para resultado da busca" width="35" height="37" border="0" tabindex="15" /></a>';
}

if ($retorno==3){
echo '<a href="javascript:sair_form_retorna_vindo_busca_clie();"><img src="'.$pontos.'imagens/cad_pet/sair.gif" alt="Sair" title="Sair do formulário" width="35" height="37" border="0" tabindex="15" /></a>';
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
            <td width="40"><div align="right"><strong><font size="2">Sexo:</font></strong></div></td>
            <td width="129">
			<select name="txt_sexo" id="txt_sexo" tabindex="3">
			<?php
				if (!empty($txt_sexo)){
				echo '<option value="'.$txt_sexo.'">'.$txt_sexo.'</option>';
				}
			?>			
              <option></option>
              <option value="Macho">Macho</option>
              <option value="F&ecirc;mea">F&ecirc;mea</option>
            </select></td>
            <td width="48" height="20"><div align="right"><strong><font size="2">Porte:</font></strong></div></td>
            <td width="130"><select name="txt_porte" id="txt_porte" tabindex="4">
			<?php
			if (!empty($txt_porte)){
			echo '<option value="'.$txt_porte.'">'.$txt_porte.'</option>';
			}
			?>	
              <option></option>					
              <option value="Pequeno">Pequeno</option>
              <option value="M&eacute;dio">M&eacute;dio</option>
              <option value="Grande">Grande</option>
            </select></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="40"><div align="right"><strong><font size="2">Cor:</font></strong></div></td>
            <td width="173" height="20"><font size="2"><b><font face="Times New Roman, Times, serif" size="2">
              <?php
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
            <td width="45"><div align="left"><strong><font size="2">Esp&eacute;cie:</font></strong></div></td>
            <td width="89"><select name="txt_especie" id="txt_especie" tabindex="6">
<?php
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
            </select></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="60" height="20"><div align="left"><strong><font size="2">Data Nasc:</font></strong></div></td>
            <td width="110"><font size="2">
              <input name="txt_data_nasc" type="text" id="txt_data_nasc" onchange="validaData(this);" onkeyup="formata(this);" value="<?php echo $txt_data_nasc; ?>" size="8" maxlength="10" tabindex="7" />
            </font></td>
            <td width="64"><div align="left"><strong><font size="2">Mensalista:</font></strong></div>              </td>
            <td width="113" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font>
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
            </div></td>
          </tr>
        </table></td>
      </tr>
      
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="40" height="20"><div align="right"><strong><font size="2">Chip:</font></strong></div></td>
            <td width="139"><font size="2" face="Times New Roman, Times, serif"><b>
              <input name="txt_chip" type="text" id="txt_chip" tabindex="9" onkeyup="somente_numeros(this);" value="<?php echo $txt_chip; ?>" size="14" maxlength="14" />
              </b></font></td>
            <td width="46"><div align="right"><strong><font size="2">RGA:</font></strong></div></td>
            <td width="122" height="20"><font size="2" face="Times New Roman, Times, serif"><b>
              <input name="txt_rga" type="text" id="txt_rga" tabindex="10" value="<?php echo $txt_rga; ?>" size="9" maxlength="11" />
            </b></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="86"><div align="right">
              <div align="right">
                <div align="right"><strong><font color="#FF0000" size="2">Dono(a) :</font></strong></div>
              </div>
              </div></td>
            <td><font size="2"><b><font face="Times New Roman, Times, serif" size="2">

<select name="txt_cod_dono" id="txt_cod_dono" tabindex="11">

<?php
if (!empty($_GET['id'])){
$txt_cod = $_GET['id'];

$sql_pet = mysqli_query($connection, "select codigo, cod_dono from tab_pet WHERE codigo='$txt_cod'") or print("Erro ao ler a tabela: tab_pet".mysqli_error($connection));
if ($linha_pet = mysqli_fetch_array($sql_pet)){
$codDono_bd = $linha_pet['cod_dono'];
}

if (!empty($codDono_bd)){
$sql_1 = mysqli_query($connection, "select codigo, nome from tab_clie WHERE codigo='$codDono_bd'") or print("Erro ao ler a tabela: tab_clie".mysqli_error($connection));
if ($linha_dono = mysqli_fetch_array($sql_1)){
$txt_cod_dono2 = $linha_dono['codigo'];
$txt_dono2 = $linha_dono['nome'];
}

echo "<option value='".$txt_cod_dono2."' select='selected'>".$txt_cod_dono2.' - '.$txt_dono2."</option>";

}
}// fecha if (!empty($codDono_bd)){...


if (!empty($txt_cod_dono)){

$sql_2 = mysqli_query($connection, "select codigo, nome from tab_clie WHERE codigo='$txt_cod_dono'") or print("Erro ao ler a tabela: tab_clie".mysqli_error($connection));
if ($linha_dono2 = mysqli_fetch_array($sql_2)){
$txt_cod_dono = $linha_dono['codigo'];
$txt_dono = $linha_dono2['nome'];
}

echo "<option value='".$txt_cod_dono."' select='selected'>".$txt_cod_dono.' - '.$txt_dono."</option>";


}// fecha if (!empty($txt_cod_dono)) ...



echo "<option>"."</option>";

$sql_1 = mysqli_query($connection, "select codigo, nome from tab_clie ORDER BY nome ASC") or print("Erro ao ler a tabela:
".mysqli_error($connection));

while($pega1 = mysqli_fetch_array($sql_1)){
echo "<option value='".$pega1['codigo']."'>".$pega1['codigo'].' - '.$pega1['nome']."</option>";
}
//}
?>
</select>
            </font></b></font>
              </td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="360"><table width="360" height="59" border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td width="60" height="55"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
              <td width="282" height="55"><textarea name="txt_obs_pet" cols="33" rows="4" id="txt_obs_pet" tabindex="12"><?php echo $txt_obs_pet; ?></textarea><?php //echo $codDono_bd; ?></td>
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