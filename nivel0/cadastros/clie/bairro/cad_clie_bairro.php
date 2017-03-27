<?php 
session_start();


include("../../../../include/arruma_link.php");
include($pontos."include/mostra_erros.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$checa_retorno = $_SESSION["checa_retorno"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];


/*
echo "checa_retorno: ".$checa_retorno;
echo  "<br>rad_sel_visl: ".$rad_sel_visl;
echo  "<br>retorno: ".$retorno;
*/

?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/func_cad_clie.js"></script>
</head>
<title>Pet Livre  (Cadastro de Bairro) </title>
<?php
  if ($checa_retorno=="cad_clie"){
 echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_clie.php\"'>";}
  
   if ($checa_retorno=="alt_clie" and !empty($retorno)){
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_clie.php?id=".$rad_sel_visl."&&ret=".$retorno."\"'>";
}else{
echo "<body bgcolor='#FFFFFF' onUnload='javascript:window.opener.location = \"../cad_clie.php?id=".$rad_sel_visl."\"'>";
}

?>
<table width="350" height="174" border="0" align="center" cellpadding="1" cellspacing="1">
  
  <tr> 
    <td width="468" height="172" align="center"> 
      <form name="frmAjax"  method="post">
        <div align="center"> 
          <table width="350" height="164" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr> 
              <td width="535" height="168" colspan="3" valign="middle"><table width="350" border="1" cellpadding="1" cellspacing="1">
                <tr>
                  <td height="30" colspan="3" bordercolor="#66CC66" bgcolor="#66CC66"><div align="center"><strong><font color="#FFFFFF">Bairro</font></strong></div></td>
                </tr>
                <tr>
                  <td height="50" colspan="3"><div align="center"><strong><em><b><font size="2" face="Times New Roman, Times, serif">Bairro</font></b><font face="Times New Roman, Times, serif"><b><font size="2">:</font></b></font>
                              <input name="txt_bairro" type="text" id="txt_bairro" style="visibility:visible" size="25" maxlength="25">
                    &nbsp;<a href="javascript:gravar_bairro();"><img src="../../../../imagens/cad_clie/gravar.gif" width="31" height="37" border="0" align="absmiddle" alt="Gravar" title="Gravar"></a></em></strong></div></td>
                </tr>
                <tr>
                  <td width="46" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">N&ordm; 
                    Ordem</font></b></font></div></td>
                  <td width="229" bgcolor="#CCCCCC"><div align="center"><font color="#000000"><b><font size="2">Bairro(s) 
                    cadastrado(s) </font></b></font></div></td>
                  <td width="70"><div align="center"><font size="2" color="#000000">
                      <input type="button" name="btn_alterar" value="Alterar" onClick="javascript:alterar_bairro();">
                  </font></div></td>
                </tr>
                <tr>
                  <?php

$sql = mysqli_query($connection, "SELECT * FROM combo_bairro WHERE bairro<>'-- Incluir  /  Alterar --' ORDER BY bairro ASC") or print("Erro ao ler a tabela: ".mysqli_error($connection));

for ($nro = 1; $nro <= 300; $nro++){

$linha = mysqli_fetch_array($sql);

if ($linha =="") {
  
}else {

$codigo = $linha['codigo'];

$bairro = $linha['bairro'];

?>
                  <td width="46"><div align="center">&nbsp; <?php echo $nro; ?> </div></td>
                  <td width="229"><div align="center">&nbsp; <?php echo $bairro; ?> </div></td>
                  <td width="70"><div align="center">
                      <input type="radio" name="rad_sel" value="<?php echo $codigo; ?>">
                  </div></td>
                </tr>
                <?php
}
 }
 @mysqli_close($sql);

?>
                <tr>
                  <td colspan="2">&nbsp;</td>
                  <td width="70"><div align="center"><font size="2">
                      <input type="button" name="btn_excluir" value="Excluir" onClick="javascript:excluir_bairro();">
                  </font></div></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>
      </form>    </td>
  </tr>
</table>
</body>
</html>