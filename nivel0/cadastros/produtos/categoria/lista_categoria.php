<?php

//######### INICIO Pagina&ccedil;&atilde;o

//paginação
$total_reg = "10"; 

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
    
    
//######### FIM dados Pagina&ccedil;&atilde;o




echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_forne.js"></script>';
?>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="520" border="0" cellpadding="1" cellspacing="1">
        </table>
          <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bordercolor="#FF993" bgcolor="#FF9933">
              <td height="20" colspan="4" align="center" bgcolor="#FF9933"><div align="center" class="style3"><strong>Cadastro
              de Categoria </strong></div></td>
            </tr>
            <tr bordercolor="#FF993" bgcolor="#FFCC33" class="cabec_style11">
              <td width="61" height="20"><div align="center" >C&oacute;d.</div></td>
              <td width="283" height="20"><div align="center" >Categoria</div></td>
              <td width="233" height="20"><div align="center">&nbsp;</div></td>
            </tr>
            <?		  
    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysql_query("SELECT * FROM combo_categoria ORDER BY categoria_mat ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysql_query("SELECT * FROM combo_categoria");
    
    $quantreg = mysql_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
 $tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";

while($linha_ref = mysql_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_categoria = $linha_ref['categoria_mat'];

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 

?>
<tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
              <td width="61" class="info"><div align="center"><? echo $cod; ?></div></td>
              <td width="283" height="5" class="info"><div align="center">&nbsp;<? echo $txt_categoria; ?></div></td>
              <td width="233" height="5" colspan="2" class="info"><div align="center"><? 
if ($nivel >1){echo '<a href="javascript:checar(\'deleta_cat.php?id='.$cod.'\');"><img src="'.$pontos.'imagens/delete.gif" border="0" alt="Apagar registro" title="Apagar registro"></a>&nbsp;';
}else{echo'&nbsp;&nbsp;&nbsp;&nbsp;';}

echo '<a href="cad_cat.php?id='.$cod.'"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Alterar registro" title="Alterar registro"></a>';

}

if ($quantreg==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';}

@mysql_close();

?>
              </div></td>
            </tr>
        </table></td>
      <td width="1" height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="181" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/procurar.gif" width="112" height="25" border="0" usemap="#Map3Map" />
                <map name="Map3Map" id="Map3Map" title="Procurar cliente">
                  <area shape="rect" coords="3,0,113,28" href="javascript:popup_consulta_cad_forne();" alt="Procurar cliente"/>
                </map>
            </div></td>
            <td width="235" class="info"><div align="center">
                <? // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >10){include("paginacao.php");}
?>
                <br />
            </div></td>
            <td width="170" colspan="3" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/cadastrar.gif" width="105" height="25" border="0" usemap="#Map2Map" />
                <map name="Map2Map" id="Map2Map" title="Cadastrar cliente">
                  <area shape="rect" coords="1,3,105,24" href="cad_forne.php" target="_self" alt="Cadastrar cliente" />
                </map>
                </div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">
          <?
if ($quantreg >=10){
echo "<font size='1' color='#cccccc' face='Verdana'>";
echo "P&aacute;gina: $pc de $tp &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; registros: $quantreg";
echo "</font>";
}
?>
      </div></td>
    </tr>
  </table>
</form>
