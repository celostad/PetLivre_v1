<?php
include("../../../include/arruma_link.php");
include($pontos."include/func_data.php");

$data_inicial = $_POST["data_inicial"];
$data_final = $_POST["data_final"];

$data_inicial_conv = Convert_Data_Ingl_Port($data_inicial);
$data_final_conv = Convert_Data_Ingl_Port($data_final);

?>
<script type="text/JavaScript">
<!--
function sel_periodo(){

cmbx_sel_periodo.value

var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='detalhe_movimento.php';
document.form.target="_self";
document.form.submit();
}
}

function voltar(){

var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='javascript:history.back(1)';
document.form.target="_self";
document.form.submit();
}
}
//-->
</script>

<form name="form" method="post" action="">
<table width="350" border="1" align="center">
  <tr>
    <td><div align="center"><font size="4"><strong>Detalhe do movimento: </strong></font><?php echo $data_inicial_conv;?> à <?php echo $data_final_conv;?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
<?php
$sql = mysqli_query($connection, "SELECT DISTINCT data FROM `tab_caixa` WHERE status=1 and (data BETWEEN '$data_inicial' AND '$data_final' ) ORDER BY data ASC") or die("erro ao selecionar a tabela: SQL");

$nro_row = mysqli_num_rows($sql);


if ($nro_row >1){

?>  
  
  <tr>
    <td><div align="center">
      <select name="cmbx_sel_periodo" id="cmbx_sel_periodo" onchange="javascript: sel_periodo()">
        <option>Selecione...</option>
		<?php
		while ($linha = mysqli_fetch_array($sql)) {

		$valor = $linha['valor'];
		$data = $linha['data'];
		$data_conv = Convert_Data_Ingl_Port($data);
		
		$sql_somatoria = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE status=1 and produto <>'' && data='$data'");
		while($linha_somatoria = mysqli_fetch_array($sql_somatoria)) {
		$txt_valor1 = $linha_somatoria['valor'];
		$total1 += $txt_valor1;
		}
		

		echo '<option value="'.$data.'">'.$data_conv.' - R$ '.number_format($total1, 2, ',','.').'</option>';
		
		unset($total1);
		unset($txt_valor1);
		
		}
		?>
		
      </select>
    </div></td>
  </tr>
  
<?php

}else{

$sql2 = mysqli_query($connection, "SELECT * FROM `tab_caixa` WHERE status=1 && data ='$data_inicial'") or die("erro ao selecionar a tabela: SQL2");

while ($linha2 = mysqli_fetch_array($sql2)) {




?>  
  <tr>
    <td><?php  echo $linha2['produto'];  ?>&nbsp;</td>
  </tr>
  
<?php }

} ?>  
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="50"><div align="center"><input type="button" name="Button" value="Voltar" onclick="javascript: voltar()"/></div></td>
  </tr>
</table>
<div align="center"></div>
</form>
