<?php
session_start();

include("../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

echo '<script type="text/javascript" src="'.$pontos.'js/outros.js"></script>';


$mes = "07";

?>
<script type="text/javascript" src="../../js/func_caixa.js"></script>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5">
	  
	  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#66CC66">
            <td height="22" colspan="5" align="center" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3">
              <p><strong>Mensalista</strong></p>
            </div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#00FFFF" class="cabec_style11">
            <td width="35" height="20" bordercolor="#FFFFFF"><div align="center" >N&ordm;</div></td>
            <td width="150" height="20" bordercolor="#FFFFFF"><div align="center" >Data</div></td>
            <td width="151" bordercolor="#FFFFFF">Produto</td>
            <td width="137" bordercolor="#FFFFFF"><div align="center">Mensalista</div></td>
            <td width="97" bordercolor="#FFFFFF"><div align="center">Valor</div></td>
          </tr>
<?php
/*
	    $sql_somatoria = mysql_query("SELECT * FROM tab_mensalista WHERE status=0 and data_banho='$data_atual'");
		while($linha_somatoria = mysql_fetch_array($sql_somatoria)) {
		$txt_valor1 = $linha_somatoria['valor'];
		$total1 += $txt_valor1;
		}
*/

    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysql_query("SELECT * FROM tab_mensalista WHERE month(`data_banho`)= '$mes' and status=0 ORDER BY mensalista, data_banho ASC");

   
$cor="#FFFFFF";
$nro =0;
while($linha_ref = mysql_fetch_array($sql_registros)) {

$cod = $linha_ref['id'];
$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_cod_pet = $linha_ref['cod_pet'];
$txt_mensalista = $linha_ref['mensalista'];
$txt_valor = $linha_ref['valor'];
$txt_data_banho = $linha_ref['data_banho'];


$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
$nro++;




?>
          <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
            <td width="35" height="5" class="info"><div align="center">&nbsp;<? echo $nro; ?></div></td>
            <td width="150" height="5" class="info"><div align="center">
              <?php
echo '<font color="#0000FF">'.$txt_data_banho.'</font>';
?>
            </div></td>
            <td width="151" height="5" class="info">&nbsp;
              <?php
echo '<font color="#0000FF">'.$txt_produto.'</font>';
?></td>
            <td width="137" class="info"><div align="center"><? echo $txt_mensalista; ?></div></td>
            <td width="97" class="info"><div align="center">&nbsp;<? echo number_format($txt_valor, 2, ',','.'); ?></div></td>
            <?php }
if ($linha_ref==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';}
?>
          </tr>
        </table>
		
          <table width="560" border="0" cellpadding="1" cellspacing="1">
        </table></td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10">
        </td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="175" class="info">&nbsp;</td>
            <td width="218" class="info"><div align="center"></div></td>
            <td width="135" colspan="3" class="info"><div align="center"><font color="#FFFFFF">
			<? echo number_format($total1, 2, ',','.');?></font></div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center"></div></td>
    </tr>
  </table>
</form>
<?php @mysql_close(); 

?>
