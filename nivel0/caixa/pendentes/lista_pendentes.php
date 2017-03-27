<?php
// limpa variáveis
$cod_produto="";
$txt_produto ="";

$data_atual = Convert_Data_Port_Ingl($entrada);

//paginação
$total_reg = "10"; 

$pagina = $_GET["pagina"];

if(!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
}

$numero_links = "8";
// intevalo revebe o valor da variavel numero_links
$intervalo = $numero_links;
// inicio recebe pc - 1 para montamos o sql
$inicio = $pc-1;
$inicio = $inicio*$total_reg;
// fazemos a conexão


echo '<script type="text/javascript" src="'.$pontos.'js/outros.js"></script>';


$dia_mes = date("d");// Coleta o dia do mês
$mes_num = date("m"); // Nome do m&ecirc;s em n&uacute;mero. Ex.: 01 => January, 02 => February
$ano = date("Y");// Coleta o ano corrente

$mes_port = $mes_num; // Atribui&ccedil;&atilde;o de vari&aacute;veis

switch($mes_port){
case $mes_port == 01 or $mes_port == 1: $mes_conv="janeiro";
case $mes_port == 02 or $mes_port == 2: $mes_conv="fevereiro";
case $mes_port == 03 or $mes_port == 3: $mes_conv="março";
case $mes_port == 04 or $mes_port == 4: $mes_conv="abril";
case $mes_port == 05 or $mes_port == 5: $mes_conv="maio";
case $mes_port == 06 or $mes_port == 6: $mes_conv="junho";
case $mes_port == 07 or $mes_port == 7: $mes_conv="julho";
case $mes_port == 08 or $mes_port == 8: $mes_conv="agosto";
case $mes_port == 09 or $mes_port == 9: $mes_conv="setembro";
case $mes_port == 10: $mes_conv="outubro";
case $mes_port == 11: $mes_conv="novembro";
case $mes_port == 12: $mes_conv="dezembro";
}


?>
<script type="text/javascript" src="../../js/func_caixa.js"></script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<form method="POST" enctype="multipart/form-data" name="form">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#66CC66">
            <td height="22" colspan="7" align="center" bgcolor="#6600CC"><div align="center" class="style3">
              <p><strong><u><font color="#FFFFFF">PENDENTES</font></u><br>
              </strong></p>
              </div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#E6643E" class="cabec_style11">
            <td width="34" height="20" bgcolor="#663366"><div align="center" class="style1" >N&ordm;</div></td>
            <td width="115" bgcolor="#663366"><div align="center" class="style1">Data</div></td>
            <td width="375" height="20" bgcolor="#663366"><div align="center" class="style1" >Produto</div></td>
            <td width="80" bgcolor="#663366"><div align="center" class="style1">Qtde</div></td>
            <td width="273" bgcolor="#663366"><div align="center" class="style1">Medida</div></td>
            <td width="164" bgcolor="#663366"><div align="center" class="style1" >Valor</div></td>
            <td width="123" height="20" bgcolor="#663366"><div align="center" class="style1">&nbsp;</div></td>
          </tr>
<?php
    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE especie=7 and produto <>'' ORDER BY data ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE especie=7 and produto <>''  ORDER BY data ASC");
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
$tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";
$nro =0;
while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_data = Convert_Data_Ingl_Port($linha_ref['data']);
$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_pet = $linha_ref['pet'];
$txt_qtde = $linha_ref['qtde'];
$txt_medida = $linha_ref['medida'];
$txt_valor = $linha_ref['valor'];
$txt_especie =  $linha_ref['especie'];
$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
$nro++;



?>
          <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
            <td width="34" height="5" class="info"><div align="center">&nbsp;<?php echo $nro; ?></div></td>
            <td width="115" class="info"><div align="center"><?php echo $txt_data; ?></div></td>
            <td width="375" height="5" class="info"><div align="center">&nbsp;
<?php
if ($txt_cod_produto <= 10){echo '<font color="#0000FF">'.$txt_produto."&nbsp;".'"'.$txt_pet.'"</font>';
}else{
echo $txt_produto;
}
?></div></td>
            <td width="80" class="info"><div align="center"><?php echo $txt_qtde; ?></div></td>
            <td width="273" class="info"><div align="center">&nbsp;<?php echo $txt_medida; ?></div></td>
            <td width="164" class="info"><div align="center"><?php echo number_format($txt_valor, 2, ',','.'); ?></div></td>
            <td width="123" height="5" class="info"><div align="center"><a href="javascript:var minhapopup = window.open('detalhes_popup_pendentes.php?cod_pendente=<?php echo $cod;?>','pop_pendente','width=490,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='detalhes_popup_pendentes.php?cod_pendente=<?php echo $cod;?>';
document.form.target='pop_pendente';
document.form.submit();
minhapopup.focus();">detalhes</a></div></td>
<?php }
if ($quantreg==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';}
?>
          </tr>
        </table>
          <table width="560" border="0" cellpadding="1" cellspacing="1">
        </table></td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"><?php if ($quantreg >=10){
echo "<div align='center'><font size='1' color='#cccccc' face='Verdana'>";
echo "P&aacute;gina: $pc de $tp &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; registros: $quantreg";
echo "</font></div>";
}
?>
      </td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="175" class="info"></td>
            <td width="218" class="info"><div align="center">                
              
            
            </div></td>
            <td width="135" colspan="3" class="info"><div align="center"><font color="#FFFFFF">
			<?php echo number_format($total1, 2, ',','.');?></font></div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">       <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("../paginacao.php");}
?>
</div></td>
    </tr>
  </table>
</form>
<?php @mysqli_close(); ?>
