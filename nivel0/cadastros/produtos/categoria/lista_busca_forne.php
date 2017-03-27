<?
$sel_tipo_pesq = $_SESSION["tipo_pesq"];
$txt_descricao_pesq = $_SESSION["descricao_pesq"];

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];


$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];


$sql = mysqli_query($connection, "SELECT * FROM `tab_fornecedor` WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%'") or die("erro ao selecionar");

//if ($linha = mysqli_fetch_array($sql)) {

$linhas=mysqli_num_rows($sql);
if($linhas>0){


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




// APAGA OS DADOS DAS VARIVEIS

$_SESSION["rad_sel_visl"] ="";
//$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

    
echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_forne.js"></script>';
?>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="585" border="0" cellpadding="1" cellspacing="1">
        </table>
          <table width="585" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bordercolor="#FF993" bgcolor="#FF9933">
              <td height="20" colspan="6" align="center" bgcolor="#FF9933"><div align="center" class="style3"><strong>Resultado da Busca </strong>(Fornecedor)</div></td>
            </tr>
            <tr bordercolor="#FF993" bgcolor="#FFCC33" class="cabec_style11">
              <td width="31" height="20"><div align="center" >C&oacute;d.</div></td>
              <td width="205" height="20"><div align="center" >Nome</div></td>
              <td width="165" height="20"><div align="center" >Email</div></td>
              <td width="110"><div align="center">Telefone</div></td>
              <td width="62" height="20"><div align="center">&nbsp;</div></td>
            </tr>
            <?		  
    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_fornecedor WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%' ORDER BY razao_social ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_fornecedor WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%'");
    
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
 $tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";

while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_razao_social = $linha_ref['razao_social'];
$txt_email = $linha_ref['email'];
$txt_ddd_tel = $linha_ref['ddd_tel'];
$txt_tel = $linha_ref['tel_com'];
$txt_ddd_cel = $linha_ref['ddd_cel'];
$txt_cel = $linha_ref['cel'];

if ($txt_ddd_tel <>""){$txt_ddd_tel=$txt_ddd_tel; $txt_ddd_cel="";}
if ($txt_tel <>""){$txt_tel=$txt_tel;$txt_cel="";}
if ($txt_ddd_cel <>""){$txt_ddd_tel=$txt_ddd_cel;}
if ($txt_cel <>""){$txt_tel=$txt_cel;}

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
  ?>
            <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
              <td width="31" class="info"><div align="center"><?php echo $cod; ?></div></td>
              <td width="205" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_razao_social; ?></div></td>
              <td width="165" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_email; ?></div></td>
              <td width="110" class="info"><div align="center">&nbsp;
                    <?php if (!empty($txt_ddd_tel)){echo "(".$txt_ddd_tel.") ".$txt_tel;} ?>
              </div></td>
              <td width="62" height="5" colspan="2" class="info"><div align="center">
                <?php 
if ($nivel >1){echo '<a href="javascript:checar(\'deleta_forne.php?id='.$cod.'\');"><img src="'.$pontos.'imagens/delete.gif" border="0" alt="Apagar registro" title="Apagar registro"></a>&nbsp;';
}else{echo'&nbsp;&nbsp;&nbsp;&nbsp;';}

echo '<a href="cad_forne.php?id='.$cod.'"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Alterar registro" title="Alterar registro"></a>';

}

}else{

echo '<script>
alert ("                                Atenção!\n\nNão foi encontrado nenhum registro para '.$sel_tipo_pesq.' = '.$txt_descricao_pesq.'  \n\n") 
window.location = "index_cad_forne.php";
</script>';
//break;

}//fecha else


if ($quantreg <=1){
$reg="registro"; $enc ="encontrado";
}else{
$reg="registros"; $enc ="encontrados";
}

@mysql_close();

?>
              </div></td>
            </tr>
          </table>
      </td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="181" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/procurar.gif" width="112" height="25" border="0" usemap="#Map3Map" />
                  <map name="Map3Map" id="Map3Map2" title="Procurar cliente">
                    <area shape="rect" coords="3,0,113,28" href="javascript:popup_consulta_cad_forne();" alt="Procurar Fornecedor"/>
                  </map>
          </div></td>
          <td width="235" class="info"><div align="center">
              <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("paginacao.php");}
?>
              <br />
          </div></td>
          <td width="170" colspan="3" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/cadastrar.gif" width="105" height="25" border="0" usemap="#Map2Map" />
                  <map name="Map2Map" id="Map2Map2" title="Cadastrar cliente">
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
    <tr>
      <td height="20" colspan="5"><div align="center">Total de&nbsp;<strong><font color="#5D8FC0"><?php echo  $quantreg; ?></font>&nbsp;</strong>&nbsp;<?php echo $reg; ?>&nbsp;<?php echo $enc; ?>&nbsp;para&nbsp;<strong><font color="#5D8FC0"><?php echo $txt_descricao_pesq; ?></font></strong></div></td>
    </tr>
  </table>
</form>