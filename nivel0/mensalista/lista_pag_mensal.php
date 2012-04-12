<?php
// limpa variáveis
$cod_produto="";
$txt_produto ="";

$data_atual = Convert_Data_Port_Ingl($data_atual2);

//paginação
$total_reg = "15"; 

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

if ($mes_num =1){
$mes_num =13;
}

$ano = date("Y");// Coleta o ano corrente

?>

<script type="text/javascript">

function popup_baixar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();


var minhapopup = window.open("baixar_pagamento.php?cod_pet=<?php echo $txt_cod_pet; if (!empty($pagina)){echo "&&pagina=".$pagina;}?>","pop_consulta","width=420,height=150,scrollbars=auto,status=0");
minhapopup.focus();
}

</script>

<form method="POST" enctype="multipart/form-data" name="form" action="">
  <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5">
	  
	  <table width="59%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#66CC66">
            <td height="25" colspan="3" align="center" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3">
              <strong>Mensalistas (Pagamento) </strong></div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#00FFFF" class="cabec_style11">
            <td width="61" height="20" bordercolor="#FFFFFF"><div align="center" >Codigo</div></td>
            <td width="170" bordercolor="#FFFFFF"><div align="center">Mensalista</div></td>
            <td width="92" bordercolor="#FFFFFF"><div align="center">&nbsp;</div></td>
          </tr>
<?php
    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
 
$mes_num = $mes_num-1;
 
    $sql_registros = mysql_query("SELECT DISTINCT cod_pet, mensalista FROM tab_mensalista WHERE month(`data_banho`)= '$mes_num' and status=0 ORDER BY mensalista ASC");


    $sql_resultado = mysql_query("SELECT DISTINCT cod_pet, mensalista FROM tab_mensalista WHERE month(`data_banho`)= '$mes_num' and status=0 ORDER BY mensalista ASC LIMIT $inicio, $total_reg");

    $quantreg = mysql_num_rows($sql_registros); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
 	$tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";
$nro =0;
while($linha_ref = mysql_fetch_array($sql_resultado)) {

$txt_cod_pet = $linha_ref['cod_pet'];
$txt_mensalista = $linha_ref['mensalista'];

/*
	$sql_soma = mysql_query("SELECT cod_pet, valor, SUM(valor) as total FROM tab_mensalista WHERE cod_pet='$txt_cod_pet' and  month(`data_banho`)= '$mes_num' and status=0 GROUP BY cod_pet") or die("erro: ".mysql_error());

	if($linha_soma = mysql_fetch_array($sql_soma)){
		$txt_total = $linha_soma['total'];
	}
*/	
	
$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
$nro++;

?>
<tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">

<td width="61" height="18" class="info"><div align="center">&nbsp;<? echo $txt_cod_pet; ?></div></td>
            <td width="170" height="18" class="info"><div align="center"><? echo $txt_mensalista; ?></div></td>
            <td width="92" height="18" class="info"><div align="center"><a href="javascript:
			var minhapopup = window.open('form_pagamento_mensalista.php?cod_pet=<?php echo $txt_cod_pet; if (!empty($pagina)){echo '&&pagina='.$pagina;}?>','pop_consulta','width=400,height=250,scrollbars=auto,status=0');
minhapopup.focus();">Baixar</a></div></td>


<?php 


unset($txt_total);
}
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
      <td height="10" colspan="10"><? if ($quantreg >=10){
echo "<div align='center'><font size='1' color='#cccccc' face='Verdana'>";
echo "P&aacute;gina: $pc de $tp &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; registros: $quantreg";
echo "</font></div>";
}
?>
      </td>
    </tr>
    <tr>
      <td height="20" colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">       <? // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("paginacao.php");}
?>
</div></td>
    </tr>
  </table>
</form>
<?php @mysql_close(); 
//print_r($data_atual);die();

?>
