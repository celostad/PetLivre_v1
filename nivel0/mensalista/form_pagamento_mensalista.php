<?php
session_start();

include("../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];


if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

$data_atual = Convert_Data_Port_Ingl($data_atual2);
$txt_cod_pet = $_GET['cod_pet'];

$sql1 = mysql_query("SELECT * FROM tab_mensalista WHERE cod_pet='$txt_cod_pet'") or print("Erro ao ler a tabela: tab_mensalista".mysql_error());
	if($pega1 = mysql_fetch_array($sql1)){
	$mensalista = $pega1['mensalista'];
}

?>


<head>
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script>
function gravar_pag_mensal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='baixar_pagamento.php';
document.form.target="_self";
document.form.submit();
}
}
</script>
</head>
<body bgcolor="#FFFFFF" onUnload='javascript:window.opener.location ="index_pag_mensalista.php"'>

  <table width="370" border="0" bordercolor="#cccccc" align="center" cellpadding="0" cellspacing="0">
    <form name="form" enctype="multipart/form-data" method="POST">
	<tr>
	
      <td width="547" height="22" valign="top" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3"><strong> <? echo "Mensalistas (Pagamento)  - ";?> 
<?php $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
      </strong></div></td>
    </tr>
    <tr>
      <td width="547" valign="top"><table width="370" height="190" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="424"><table width="100%" height="25" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="70" height="20"><div align="right"><font size="2"><strong>Mensalista:</strong></font></div></td>
                <td width="290" height="25"><div align="left">
                  <?php echo $mensalista;?>
                </div></td>
                </tr>
              
          </table></td>
        </tr>
        

        <tr>
          <td width="424"><table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="70"><div align="right"><strong><font size="2">Esp&eacute;cie</font></strong></div></td>
              <td width="290" height="20"><div align="left"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"></a></font></b></font><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><strong><font size="2">
                  <?
$sql_4 = mysql_query("select codigo, especie from combo_especie ORDER BY codigo ASC") or print("Erro ao ler a tabela:
".mysql_error());
echo "<select name='txt_especie' tabindex='5' id='txt_especie'";
echo "<option value='".$txt_cod_especie."'>".$txt_especie."</option>";
echo "<option>"."</option>";
while($pega4 = mysql_fetch_array($sql_4)){
echo "<option value='".$pega4['codigo']."'>".$pega4['especie']."</option>";
}
echo "</select>";

@mysql_close($sql_4);
?>
              </font></strong></font></b></font></div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="61"><table width="100%" height="68" border="0" cellpadding="1" cellspacing="1">
              <tr>
                <td width="70" height="66"><div align="right"><strong><font size="2">Obs:</font></strong></div></td>
                <td width="290" height="66"><textarea name="txt_obs_mensal" cols="33" rows="3" id="txt_obs_mensal" tabindex="6"><? echo $txt_obs_mensal; ?></textarea>
                    <? //echo $retorno; ?>
                    <input type="hidden" name="txt_cod_pet" value="<?php echo $txt_cod_pet; ?>"/>
					<input type="hidden" name="txt_mensalista" value="<?php echo $mensalista; ?>"/>

					</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="424" height="22"><div align="center">
              <table width="170" height="38" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="38" valign="middle"><div align="center">
<input type="image" name="ImageField" id="ImageField" tabindex="17" title="Gravar pagamento mensalista"  onclick="javascript:gravar_pag_mensal();" src="<?=$pontos;?>imagens/cad_clie/gravar.gif" alt="Gravar" width="31" height="37" border="0" />
                  </div></td>
                  </tr>
              </table>
              </div></td>
        </tr>
      </table></td>
	  
    </tr>
	</form>
  </table>
</body>  