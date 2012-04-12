<?php
session_start();

include("../../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];


if ($nivel ==1){
echo '<script>
alert("                          Atenção!\n\nVocê não tem permissão para visualizar esta página.\n\n")
window.location = "../../index_menu.php"
</script>';
}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}


$mes = $_POST['sel_mes'];

switch($mes){
case $mes == 01 or $mes == 1: $mes_conv="janeiro";break;
case $mes == 02 or $mes == 2: $mes_conv="fevereiro";break;
case $mes == 03 or $mes == 3: $mes_conv="março";break;
case $mes == 04 or $mes == 4: $mes_conv="abril";break;
case $mes == 05 or $mes == 5: $mes_conv="maio";break;
case $mes == 06 or $mes == 6: $mes_conv="junho";break;
case $mes == 07 or $mes == 7: $mes_conv="julho";break;
case $mes == 08 or $mes == 8: $mes_conv="agosto";break;
case $mes == 09 or $mes == 9: $mes_conv="setembro";break;
case $mes == 10: $mes_conv="outubro";break;
case $mes == 11: $mes_conv="novembro";break;
case $mes == 12: $mes_conv="dezembro";break;
}

?>
<html>
<head>
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="<?=$pontos;?>js/outros.js"></script>
</head>
<?php

 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysql_query("SELECT * FROM tab_mensalista WHERE month(`data_banho`)= '$mes' and status=0 ORDER BY mensalista, data_banho ASC");

while($linha_ref = mysql_fetch_array($sql_registros)) {

$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_cod_pet = $linha_ref['cod_pet'];
$txt_mensalista = $linha_ref['mensalista'];
$txt_cod_dono = $linha_ref['cod_dono'];
$txt_qtde = $linha_ref['qtde'];
$txt_medida = $linha_ref['medida'];
$txt_valor = $linha_ref['valor'];
$txt_obs = $linha_ref['obs'];
$txt_data_banho = $linha_ref['data_banho'];

#tab_temp_mensalista

    $sql_inser_temp = mysql_query("INSERT INTO `tab_temp_mensalista` (`id`, `cod_produto`, `produto`, `cod_pet`, `mensalista`, `cod_dono`, `qtde`, `medida`, `valor`, `obs`, `usuario`, `data_banho`)VALUES(NULL, '$txt_cod_produto', '$txt_produto', '$txt_cod_pet', '$txt_mensalista', '$txt_cod_dono', '$txt_qtde', '$txt_medida', '$txt_valor', '$txt_obs', '$usuario', '$txt_data_banho')");

}// fecha while($linha_ref...


$qtde_reg = mysql_num_rows($sql_registros);


if ($qtde_reg > 0){

    $sql_registro2 = mysql_query("SELECT DISTINCT cod_pet, SUM(valor) as total FROM tab_temp_mensalista WHERE usuario='$usuario' GROUP BY cod_pet ORDER BY mensalista, data_banho ASC") or die (mysql_error());
	
	
while($linha_2 = mysql_fetch_array($sql_registro2)) {

		$cod_pet_db = $linha_2['cod_pet'];
		$total = $linha_2['total'];


    $sql_mensal2 = mysql_query("SELECT * FROM tab_temp_mensalista WHERE usuario='$usuario' && cod_pet='$cod_pet_db' ORDER BY mensalista, data_banho ASC") or die (mysql_error());


$cor="#FFFFFF";


while($linha_mensal2 = mysql_fetch_array($sql_mensal2)) {

$txt_cod_produto = $linha_mensal2['cod_produto'];
$txt_produto = $linha_mensal2['produto'];
$txt_cod_pet = $linha_mensal2['cod_pet'];
$txt_mensalista = $linha_mensal2['mensalista'];
$txt_cod_dono = $linha_mensal2['cod_dono'];
$txt_qtde = $linha_mensal2['qtde'];
$txt_medida = $linha_mensal2['medida'];
$txt_valor = $linha_mensal2['valor'];
$txt_obs = $linha_mensal2['obs'];
$txt_data_banho = Convert_Data_Ingl_Port($linha_mensal2['data_banho']);

if (empty($txt_obs)){$txt_obs ="-";}

  
if ($txt_mensalista <> $mensalista){
?>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
	<tr>
      <td height="25" colspan="4"></td>
    </tr>
          <tr bgcolor="#66CC66">
            <td height="20" colspan="4" align="center" bordercolor="#333333" bgcolor="#FFFFFF">
			<div align="center" class="style3">
			<img src="../../../imagens/logo_mensalista.jpg" width="570" height="180">            </div></td>	
</tr>
          <tr bgcolor="#66CC66">
              <td height="20" colspan="4" align="center" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center"><font size="4px" color="#000000"><p>Mensalista - <strong><?php echo $txt_mensalista; ?></strong></p>
            </font></div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#00FFFF" class="cabec_style11">
            <td width="100" height="20" bordercolor="#FFFFFF"><div align="center">Data</div></td>
            <td width="186" bordercolor="#FFFFFF"><div align="center">Produto</div></td>
            <td width="79" bordercolor="#FFFFFF"><div align="center">Valor</div></td>
            <td width="208" bordercolor="#FFFFFF"><div align="center">Observa&ccedil;&atilde;o</div></td>
          </tr>
<?php	$mensalista = $txt_mensalista;	  
}

if ($cor=="#FFFFFF"){$cor="#E6E6E6";}else{$cor="#FFFFFF";}
?>

          <tr bgcolor="<?php echo $cor; ?>" onMouseOver="this.style.backgroundColor='#66FF66'" onMouseOut="this.style.backgroundColor='<?php echo $cor;?>'">
            <td width="100" height="5"><div align="center">
              <?php echo $txt_data_banho;?>
            </div></td>
            <td width="186" height="5"><div align="center"><?php
echo $txt_produto;?></div></td>
            <td width="79"><div align="center"><? echo number_format($txt_valor, 2, ',','.'); ?></div></td>
            <td width="208"><div align="center"><?php echo $txt_obs; ?></div></td>
          </tr>

<?php


if(($conta_cabec % 4) == 0){

echo "<br style='page-break-after:always'>";
$conta_cabec =2;	
}


}// fecha while


// COLOCA DIZERES NO RODAPÉ (FUTURAMENTE COLOCAR NA TABELA
$rodape = '<b>Referência: '.$mes_conv.'/2009</b>';
$rodape .= '<br><b>Obs: Pagamentos  até o 5º dia útil de cada mês.</b>';
$rodape .= '<br><b>Obrigado por confiar em nossos serviços.</b>';

?>


		 <tr>
            <td height="5" colspan="2" align="right"><b>TOTAL&nbsp;&nbsp;</b></td>
            <td align="center"><?php echo "R$ ".number_format($total, 2, ',','.'); ?></td>
            <td align="center">&nbsp;</td>
          </tr>

          <tr>
            <td height="5" colspan="4" align="center"><?php echo $rodape; ?></td>
          </tr>

<?php
$total ="";

}// fecha while



}else{
echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></div</font></td></tr>';
}

$sql_del = mysql_query("DELETE FROM tab_temp_mensalista WHERE usuario='$usuario'");
@mysql_close();
?>
        </table>
  </html>