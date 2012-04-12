<?
session_start();

include("../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include("checagem/func_data.php");


$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

$data_hoje= date("Y-m-d");


echo '<script type="text/javascript" src="'.$pontos.'js/func_caixa.js"></script>';


	    $sql_somatoria = mysql_query("SELECT * FROM tab_caixa WHERE status =0 and produto <>'' and data<>'$data_hoje'");
		while($linha_somatoria = mysql_fetch_array($sql_somatoria)) {
		$txt_valor1 = $linha_somatoria['valor'];
		$total1 += $txt_valor1;
		}

?>
<form id="form" name="form" method="post">
  <table width="585" border="0" align="center">
    <tr>
      <td><table width="585" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#66CC66">
          <td height="20" colspan="7" align="center" bordercolor="#CC0000" bgcolor="#CC0000"><div align="center" class="style3"><strong>Vendas n&atilde;o finalizadas</strong></div></td>
        </tr>
        <tr bordercolor="#CC0000" bgcolor="#E6643E" class="cabec_style11">
          <td width="29" height="20"><div align="center" >N&ordm;</div></td>
          <td width="281" height="20"><div align="center" >Produto</div></td>
          <td width="80"><div align="center">Qtde</div></td>
          <td width="77"><div align="center">Medida</div></td>
          
		  <?php if ($status_caixa_valor ==1){ 
		  echo '<td width="81"><div align="center">Valor</div></td>';
		  } ?>
          
		  <td width="81"><div align="center">Data Venda</div></td>
          <td width="81" height="20"><div align="center" >Vendedor</div></td>
        </tr>
        <?

	$nro = 0;

 // Faz o Select pegando o DIA e STATUS

    $sql_fcx = mysql_query("SELECT * FROM tab_caixa WHERE status =0 and produto <>'' and data<>'$data_hoje'");
	
	    $quantreg = mysql_num_rows($sql_fcx); // Quantidade de registros pra pagina&ccedil;&atilde;o

     
	while ($linha_fcx = mysql_fetch_array($sql_fcx)) {
	
	$cod_produto = $linha_fcx['cod_produto'];
	$txt_produto = $linha_fcx['produto'];
	$txt_qtde = $linha_fcx['qtde'];
	$txt_medida = $linha_fcx['medida'];
	$txt_valor = $linha_fcx['valor'];
	$txt_data_bd = $linha_fcx['data'];
	$txt_usuario = $linha_fcx['usuario'];
	$nro ++;
	
	$data_bd_convertido = Convert_Data_Ingl_Port($txt_data_bd);

?>
        <tr>
          <td width="29" height="5" class="info"><div align="center">&nbsp;<? echo $nro; ?></div></td>
          <td width="281" height="5" class="info"><div align="center">&nbsp;<? echo $txt_produto; ?></div></td>
          <td width="80" class="info"><div align="center"><? echo $txt_qtde; ?></div></td>
          <td width="77" class="info"><div align="center">&nbsp;<? echo $txt_medida; ?></div></td>
          <?php if ($status_caixa_valor ==1){ 
echo '<td width="81" class="info"><div align="center">'.number_format($txt_valor, 2, ',','.').'</div></td>';
}?>
          <td width="81" class="info"><div align="center"><? echo $data_bd_convertido; ?></div></td>
          <td width="81" height="5" class="info"><div align="center"><? echo $txt_usuario; ?>&nbsp;</div></td>
<?
 }
	if ($quantreg=="")
 	{

		echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';
	}

@mysql_close();

?>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="25"><div align="right"><font color="#FFFFFF">
		    <? echo number_format($total1, 2, ',','.');?></font><br />
      </div></td>
    </tr>
    <tr>
      <td height="45"><p align="center">
        <input type="button" name="Button" value="Finalizar" onclick="javascript:finalizar_caixa();" />
      </p></td>
    </tr>
  </table>
</form>
