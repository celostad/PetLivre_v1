<?php
// limpa variáveis
$cod_produto="";
$txt_produto ="";

//paginação
$total_reg = "10"; 

if(!empty($pagina)) {$pagina = $_GET["pagina"];}else{$pagina="";}
// $pagina = $_GET["pagina"];

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

// echo "<br/>dia_mes: ".$dia_mes;
// echo "<br/>mes_num: ".$mes_num;
// echo "<br/>ano: ".$ano;
// echo "<br/>mes_port: ".$mes_port;
// die();/*

switch($mes_port){
  case $mes_port == '01' or $mes_port == '1': $mes_conv="janeiro";break;
  case $mes_port == '02' or $mes_port == '2': $mes_conv="fevereiro";break;
  case $mes_port == '03' or $mes_port == '3': $mes_conv="março";break;
  case $mes_port == '04' or $mes_port == '4': $mes_conv="abril";break;
  case $mes_port == '05' or $mes_port == '5': $mes_conv="maio";break;
  case $mes_port == '06' or $mes_port == '6': $mes_conv="junho";break;
  case $mes_port == '07' or $mes_port == '7': $mes_conv="julho";break;
  case $mes_port == '08' or $mes_port == '8': $mes_conv="agosto";break;
  case $mes_port == '09' or $mes_port == '9': $mes_conv="setembro";break;
  case $mes_port == 10: $mes_conv="outubro";break;
  case $mes_port == 11: $mes_conv="novembro";break;
  case $mes_port == 12: $mes_conv="dezembro";break;
}


// VERIFICA SE EXISTE SAÍDAS
$sql_sai = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE cod_material <>'' && status =0 && data ='$data_atual' && cod_produto <> 6") or print("Erro ao ler a tabela:
".mysqli_error($connection));
if($linha_sai = mysqli_fetch_array($sql_sai)){$checa_cod_material = $linha_sai['cod_material'];}

?>
<script type="text/javascript" src="../../js/func_caixa.js"></script>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="560" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#66CC66">
            <td height="22" colspan="6" align="center" bordercolor="#CC0000" bgcolor="#CC0000"><div align="center" class="style3">
              <p><strong>CAIXA<?php echo "&nbsp;-&nbsp;".$dia_mes." de ".$mes_conv." de ".$ano."&nbsp;(&nbsp;".diasemana()."&nbsp;)"; ?></strong></p>
              </div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#E6643E" class="cabec_style11">
            <td width="29" height="20"><div align="center" >N&ordm;</div></td>
            <td width="260" height="20"><div align="center" >Produto</div></td>
            <td width="80"><div align="center">Qtde</div></td>
            <td width="77"><div align="center">Medida</div></td>
            <td width="70" height="20"><div align="center" >Espécie</div></td>
			<?php
			
			if ($status_caixa_valor ==1){ 
            echo '<td width="81" height="20"><div align="center" >Valor</div></td>';
			}
			?>
          </tr>
<?php
	    $sql_somatoria = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE status=0 and produto <>'' && especie <>8  && cod_produto <> 6");
		while($linha_somatoria = mysqli_fetch_array($sql_somatoria)) {
		$txt_valor1 = $linha_somatoria['valor'];
		$total1 += $txt_valor1;
		}


    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE status=0 && data='$data_atual' and produto <>'' && especie <>8  && cod_produto <> 6 ORDER BY codigo ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_caixa WHERE status=0 && data='$data_atual' && produto <>'' && especie <>8  && cod_produto <> 6");
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
 $tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";
$nro =0;
while($linha_ref = mysqli_fetch_array($sql_registros)) {

  $cod = $linha_ref['codigo'];
  $txt_cod_produto = $linha_ref['cod_produto'];
  $txt_produto = $linha_ref['produto'];
  $txt_pet = $linha_ref['pet'];
  $txt_qtde = $linha_ref['qtde'];
  $txt_medida = $linha_ref['medida'];
  $txt_valor = $linha_ref['valor'];
  $txt_especie =  $linha_ref['especie'];
  $cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
  $nro++;


// Converte o número da especie em nominal

switch ($txt_especie){

case 1 :    $txt_especie ="DIN";break;
case 2 :    $txt_especie ="CCR";break;
case 3 :    $txt_especie ="CCR";break;
case 4 :    $txt_especie ="CDB";break;
case 5 :    $txt_especie ="CDB";break;
case 6 :    $txt_especie ="CHQ";break;
case 7 :    $txt_especie ="PEN";break;
}


?>
          <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
            <td width="29" height="5" class="info"><div align="center">&nbsp;<?php echo $nro; ?></div></td>
            <td width="281" height="5" class="info"><div align="center">&nbsp;
<?php
if ($txt_cod_produto <= 10){echo '<font color="#0000FF">'.$txt_produto."&nbsp;".'"'.$txt_pet.'"</font>';
}else{
echo $txt_produto;
}
?></div></td>
            <td width="80" class="info"><div align="center"><?php echo $txt_qtde; ?></div></td>
            <td width="77" class="info"><div align="center">&nbsp;<?php echo $txt_medida; ?></div></td>
            <td width="70" class="info"><div align="center">&nbsp;<?php
             if ($txt_especie =="CCR"){
             echo '<font size=2 color="#FF0000">'.$txt_especie.'</font>';

             }else{
             echo $txt_especie;
             }


             ?></div></td>
            <?php
			
			if ($status_caixa_valor ==1){ 
			echo '<td width="81" height="5" class="info"><div align="center">'.number_format($txt_valor, 2, ',','.').'</div></td>';
			}

}// fecha while ...

if (empty($quantreg)){

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
            <td width="175" class="info"><div align="center"><font size="2"><a href="javascript:cad_entrada_caixa()">Inserir</a></font></div></td>
            <td width="218" class="info"><div align="center">                
              <?php if (!empty($checa_cod_material))
	   		{
		  		echo '<a href="javascript:visualiza_saida();"><font size="2">Visualizar Sa&iacute;das</font></a>';
			}

//echo "Checa_cod_material: ".$checa_cod_material;
?>
             
            </div></td>
<?php		
			if ($status_caixa_total ==1){ 

            echo '<td width="135" colspan="3" class="info"><div align="center"><font color="#FFFFFF">Total: '.number_format($total1, 2, ',','.').'</font></div>
            </td>';
			}
?>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">       <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("paginacao.php");}
?>
</div></td>
    </tr>
  </table>
</form>
<?php @mysqli_close(); ?>