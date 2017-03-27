<?php
session_start();

include("../../barra.php");
include("../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];

$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

$sql_2 = mysqli_query($connection, "SELECT * FROM `tab_temp_banho` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_2");

if ($linha2 = mysqli_fetch_array($sql_2)) {

$sql2 = "DELETE FROM `tab_temp_banho` WHERE `user_cadastro` = '$usuario'";
$resultado2 = mysql_query($sql2) or die ("Problema no Delete tab_temp_animal - SQL2");
}


		  //######### INICIO Pagina&ccedil;&atilde;o
    $numreg = 10; // Quantos registros por p&aacute;gina vai ser mostrado
    if (!isset($pg)) {
        $pg = 0;
    }
    $inicial = $pg * $numreg;
	
	    $quant_pg = ceil($quantreg/$numreg);
    $quant_pg++;
    
    
//######### FIM dados Pagina&ccedil;&atilde;o




// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["checa_retorno"] ="";

// APAGA TABELA TEMPORÁRIA CLIENTE

$sql_3 = mysqli_query($connection, "SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha3 = mysqli_fetch_array($sql_3)) {

$sql3 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado3 = mysql_query($sql3) or die ("Problema no Delete tab_temp_clie - SQL2");
}

// APAGA TABELA TEMPORÁRIA ANIMAL

$sql_4 = mysqli_query($connection, "SELECT * FROM `tab_temp_animal` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha4 = mysqli_fetch_array($sql_4)) {

$sql4 = "DELETE FROM `tab_temp_animal` WHERE `user_cadastro` = '$usuario'";
$resultado4 = mysql_query($sql4) or die ("Problema no Delete tab_temp_animal - SQL3");
}

@mysql_close($sql_2,$sql2,$sql_3,$sql3,$sql_4,$sql4);

?>
<html>
<head>
<script type="text/javascript" src="../../js/func_banho.js"></script>
<script type="text/javascript" src="../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../js/functions.js"></script>
<link rel="stylesheet" href="../../css/config.css" type="text/css">
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style3 {
	font-size: 18px;
	color: #555;
	font-style: italic;
}
-->
</style>
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Banho e Tosa)</title>
<BODY bgcolor="#FFFFFF">
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="735" height="95" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
    <tr>
      <td height="15">
          <div align="center">
              <script language="JavaScript" src="../../js/menu1.js"></script>
            <?php if ($nivel ==1){echo "<script language=\"JavaScript\" src=\"../../js/menu_cad_clie/menu_usuario.js\"></script>";} ?>
            <?php if ($nivel ==2){echo "<script language=\"JavaScript\" src=\"../../js/menu_cad_clie/menu_supervisor.js\"></script>";} ?>
            <?php if ($nivel ==3){echo "<script language=\"JavaScript\" src=\"../../js/menu_cad_clie/menu_gerente.js\"></script>";} ?>
            <script language="JavaScript" src="../../js/menu3.js"></script>
        </div></td>
    </tr>
    <tr>
      <td height="15">&nbsp;</td>
    </tr>
    <tr>
      <td height="10"><div align="center">
        <table width="735" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="735" height="25" border="0" cellpadding="0" cellspacing="0" background="../../imagens/titulos/titulo_banho.jpg">
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
    
    <tr>
      <td height="15"><table width="735" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="147">&nbsp;</td>
          <td width="147"><div align="center"><a href="javascript:popup_consulta_cad_clie()" class="link1">Buscar</a></div></td>
          <td width="147">&nbsp;</td>
          <td width="147"><div align="center"><a href="entrada/cad_banho.php" class="link1">Cadastrar</a></div></td>
          <td width="147">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
    
    <tr>
      <td height="5"><?
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_banho ORDER BY codigo LIMIT $inicial, $numreg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_banho");
    
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
?>



	  <table width="735" border="1" cellpadding="1" cellspacing="1">
	    
	    <tr bgcolor="#CCCCCC">
	      <td height="10" colspan="6" align="center" bgcolor="#FFFFFF"><table width="734" height="10" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center" class="style3 ">
                  <?php 
$data = date('D');
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array("Sun" => "Domingo", "Mon" => "Segunda-Feira", "Tue" => "Terca-Feira",
"Wed" => "Quarta-Feira", "Thu" => "Quinta-Feira", "Sat" => "Sabado");

$mess = array("Jan" => "Janeiro", "Feb" => "Fevereiro", "Mar" => "Marco", "Apr" => "Abril", "May" => "Maio", "Jun" => "Junho", "Jul" => "Julho", "Aug" => "Agosto", "Nov" => "Novembro", "Sep" => "Setembro", "Oct" => "Outubro", "Dec" => "Dezembro");
echo $semana["$data"];
echo ", $dia de ";
echo $mess["$mes"];
echo " de $ano";
?>
                &nbsp;</div></td>
            </tr>
          </table></td>
	      </tr>
	    <tr bgcolor="#CCCCCC">
          <td width="45" height="10" align="center">
		  <?php if($quantreg==""){
		  echo '<font color="#eeeeee"><b>Fila</b></font>';
		  }else{
		  echo '<div align="center" class="cabec_style11">Fila</div>';}
		  ?>		  </td>
          <td width="163" align="center">
		  <?php if($quantreg==""){
		  echo '<font color="#eeeeee"><b>Animal</b></font>';
		  }else{
		  echo '<div align="center" class="cabec_style11">Animal</div>';}
		  ?></td>
          <td width="250" height="10" align="center">
		  <?php if($quantreg==""){
		  echo '<font color="#eeeeee"><b>Tipo de Servi&ccedil;o</b></font>';
		  }else{
		  echo '<div align="center" class="cabec_style11">Tipo de Servi&ccedil;o</div>';}
		  ?></td>
          <td width="92" align="center">
		  <?php if($quantreg==""){
		  echo '<font color="#eeeeee"><b>&nbsp;Hor&aacute;rio</b></font>';
		  }else{
		  echo '<div align="center" class="cabec_style11">&nbsp;Hor&aacute;rio</div>';}
		  ?></td>
          <td width="92" height="10" align="center">
		  <?php if($quantreg==""){
		  echo '<font color="#eeeeee"><b>&nbsp;Telefone</b></font>';
		  }else{
		  echo '<div align="center" class="cabec_style11">&nbsp;Telefone</div>';}
		  ?></td>
          <td width="83" height="10" align="center"><div align="center">  
<?
 if ($quantreg==""){
 $x1="disabled=\"disabled\"";
		 echo '<input name="Button5" type="button" onClick="cad_clie_ver_alterar();" value="Ver/Alterar" style="'.$x1.'">';
			}else{
			echo '<input name="Button5" type="button" onClick="cad_clie_ver_alterar();" value="Ver/Alterar">';
} ?>			
			
          </div></td>
        </tr>
        <?		  
while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_nome_clie = $linha_ref['nome'];
$txt_end_clie = $linha_ref['endereco'];
$txt_ddd_tel_clie = $linha_ref['ddd_tel'];
$txt_tel_clie = $linha_ref['tel'];
$txt_rg_clie = $linha_ref['rg'];
?>
        <tr>
          <td height="5"><div align="center"><font size="2">&nbsp;<?php echo $cod; ?></font></div></td>
          <td height="5"><div align="center"><font size="2">&nbsp;<?php echo $txt_nome_clie; ?></font></div></td>
          <td height="5"><div align="center"><font size="2">&nbsp;<?php echo $txt_end_clie; ?></font></div></td>
          <td><div align="center"><font size="2">&nbsp;<?php echo $txt_end_clie; ?></font></div></td>
          <td height="5"><div align="center"><font size="2">&nbsp;(<?php echo $txt_ddd_tel_clie; ?>)&nbsp;<?php echo $txt_tel_clie; ?></font></div></td>
          <td height="5">
              <div align="center">
                <input name="rad_sel_visl" type="radio" value="<?=$cod;?>">
                </div></td>
          <?
}
if ($quantreg==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b><em>&nbsp;Não há registros</em></b></font></div></td>';}
@mysql_close();
?>
        </tr>
        <tr>
          <td height="10" colspan="5"><div align="center">
              <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o. ex: << anterior 1 2 3 4 5 pr&oacute;ximo >>
    include("paginacao.php");
?>
          </div></td>
          <td height="10"><div align="center">
              <input type="button" name="Button" value="Voltar" onClick="javascript:location = '../index_menu.php';" >
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
    <tr>
      <td height="10"><table width="735" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#ECE9D8">
        <tr>
          <td width="450" align="center" bordercolor="#cccccc"><div align="center"><font size="1" color="#999999">Usu&aacute;rio Logado:</font><font size="1"><font color="#5F8FBF"> <?php echo $usuario; ?> </font><font color="#999999">|</font><font color="#5F8FBF"> </font><font color="#FFFFFF"><font color="#999999">IP 
            da M&aacute;quina:</font></font><font color="#666666"><font color="#5F8FBF"> <?php echo $ip = getenv("REMOTE_ADDR")?> <font color="#999999">|</font><font color="#FFFFFF">&nbsp;</font><font color="#999999">Data:</font> </font></font><font color="#FFFFFF"> <font color="#999999"> <font color="#5F8FBF">
                    <?php $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
                    </font>|</font>&nbsp;</font><font color="#999999">Hor&aacute;rio:</font><font color="#666666"><font color="#5F8FBF">
                    <?php $ha=date("H");
               echo $date =date("$ha:i"); ?>
                </font></font></font></div></td>
          <td bordercolor="#cccccc"><div align="center" class="style8"><?php echo "<font size='2' color=#CCCCCC>"."Total de registros: ". $quantreg."</font>"; ?></div></td>
        </tr>
      </table></td>
    </tr>
</table>
</form>
</body>
</html>