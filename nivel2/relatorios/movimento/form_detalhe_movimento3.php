<?php
include("../../../include/arruma_link.php");
//include($pontos."include/func_data.php");





//Exemplo de uso
//echo diasemana2($data_inicial_hidden);
?>
<script type="text/JavaScript">
<!--
function voltar(){

var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='movimento.php?data_inicial=<?php echo $data_inicial_hidden; ?>&&data_final=<?php echo $data_final_hidden; ?>';
document.form.target="_self";
document.form.submit();
}
}
//-->
</script>

<form name="form" method="post" action="">
<table width="692" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6"><div align="center"><font size="4"><strong>Movimento do dia: </strong></font><?php echo $data_conv_sel_periodo; ?></div></td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="29" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Nro</strong></font></div></td>
    <td width="216" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Produto</strong></font></div></td>
    <td width="37" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Qtde</strong></font></div></td>
    <td width="76" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Medida</strong></font></div></td>
    <td width="101" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Valor</strong></font></div></td>
    <td width="219" bgcolor="#CCCCCC"><div align="center"><font color="#333333" size="3"><strong>Esp&eacute;cie</strong></font></div></td>
  </tr>
<?php

$cor ="#FFFFFF";
$nro =0;

$sql2 = mysql_query("SELECT * FROM `tab_caixa` WHERE status=1 && (data BETWEEN '$data_inicial_hidden' AND '$data_final_hidden') && cod_produto <>0") or die("erro ao selecionar a tabela: SQL2");


while ($linha2 = mysql_fetch_array($sql2)) {

$txt_valor = $linha2['valor'];
$soma += $txt_valor;

$nro++;

if($cor=="#E6E6E6"){$cor="#FFFFFF";}else{$cor="#E6E6E6";}
//if($cor=="#FFFFFF"){$cor="#E6E6E6";}else{$cor="#FFFFFF";}
 
?>

          <tr bgcolor="<?php echo $cor; ?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?php echo $cor;?>'">
    <td><?php echo $nro; ?></td>
    <td><font size="2">
      <?php
	  
	  if ($linha2['cod_produto'] <= 10){echo '<font color="#0000FF">'. $linha2['produto']."&nbsp;".'"'.$linha2['pet'].'"</font>';
}else{
echo $linha2['produto'];
}
		
		?>
    </font></td>
    <td><div align="center">
      <font size="2">
      <?php  echo $linha2['qtde'];  ?>
      </font></div></td>
    <td><div align="center">
      <font size="2">
      <?php  echo $linha2['medida'];  ?>
      </font></div></td>
    <td><div align="center">
      <font size="2">
      <?php  echo "R$ ".number_format($linha2['valor'], 2, ',','.'); ?>
      </font></div></td>
    <td><div align="center">
      <font size="2">
      <?php 
	  
	  $cod_especie = $linha2['especie'];
	  
	  $sql4 = mysql_query("SELECT * FROM `combo_especie` WHERE codigo='$cod_especie'") or die("erro ao selecionar a tabela: SQL4");

	if($linha4 = mysql_fetch_array($sql4)) {
	  
	  echo $linha4['especie'];
	}
	
	?>
      </font></div></td>
  </tr>

  
<?php } ?>  
  <tr>
    <td colspan="3">&nbsp;</td>
    <td><div align="right"><font color="#0000FF"><strong>Total&nbsp;</strong></font></div></td>
    <td><div align="center"><font color="#0000FF">R$ <?php echo number_format($soma, 2, ',','.'); ?></font></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><div align="center">
      <label>
      <input type="button" name="Button" value="Voltar" onclick="javascript: voltar()"/>
      </label>
    </div></td>
  </tr>
</table>
<div align="center"></div>
</form>
