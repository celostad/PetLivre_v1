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

?>
<html>
<head>
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="<?=$pontos;?>js/outros.js"></script>
</head>
<table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5">


<?php

 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_mensalista WHERE month(`data_banho`)= '$mes' and status=0 ORDER BY mensalista, data_banho ASC");

   
$cor="#FFFFFF";
$nro =0;
$conta_cabec =1;

$qtde_reg = mysqli_num_rows($sql_registros);


while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['id'];
$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_cod_pet = $linha_ref['cod_pet'];
$txt_mensalista = $linha_ref['mensalista'];
$txt_valor = $linha_ref['valor'];
$txt_obs = $linha_ref['obs'];
$txt_data_banho = Convert_Data_Ingl_Port($linha_ref['data_banho']);

if (empty($txt_obs)){$txt_obs ="-";}

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
$nro++;

  
if ($txt_mensalista <> $mensalista){

echo '	  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">

<tr>
      <td height="10" colspan="4">
        </td>
    </tr>
          <tr bgcolor="#66CC66">
            <td height="20" colspan="4" align="center" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3"><img src="../../../imagens/logo_mensalista.jpg" width="570" height="180">
            </div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#00FFFF" class="cabec_style11">
            <td width="100" height="20" bordercolor="#FFFFFF"><div align="center">Data</div></td>
            <td width="164" bordercolor="#FFFFFF"><div align="center">Produto</div></td>
            <td width="79" bordercolor="#FFFFFF"><div align="center">Valor</div></td>
            <td width="189" bordercolor="#FFFFFF"><div align="center">Observa&ccedil;&atilde;o</div></td>
          </tr>';
		  $mensalista = $txt_mensalista;
		  $conta_cabec++;	
		  
}



		  ?>


  <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onMouseOver="this.style.backgroundColor='#66FF66'" onMouseOut="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
            <td width="100" height="5" class="info"><div align="center">
              <?php
echo '<font color="#0000FF">'.$txt_data_banho.'</font>';
?>
            </div></td>
            <td width="186" height="5" class="info"><div align="center"><?php
echo '<font color="#0000FF">'.$txt_produto.'</font>';
?></div></td>
            <td width="79" class="info"><div align="center"><?php echo number_format($txt_valor, 2, ',','.'); ?></div></td>
            <td width="208" class="info"><div align="center"><?php echo $txt_obs; ?></div></td>
<?php


if(($conta_cabec % 4) == 0){

echo "<hr style='page-break-after:always'>";
$conta_cabec =1;	

}

}

if ($qtde_reg < 1){

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
			<?php echo number_format($total1, 2, ',','.');?></font></div></td>
          </tr>
      </table>
	  </td>
    </tr>
    <tr>
      <td height="20" colspan="5"></td>
    </tr>
  </table>
  
</html>
<?php @mysql_close(); 

?>
