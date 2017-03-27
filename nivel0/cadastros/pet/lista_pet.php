<?php


//APAGA FOTO TEMPORÁRIA TAB_TEMP_PET
$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die(mysqli_error($connection));


if ($linha_ref = mysqli_fetch_array($sql_ref)) {
  $txt_caminho_foto1 = $linha_ref['caminho_foto'];
  $txt_caminho_foto ="foto/".$txt_caminho_foto1;
  if(isset($linha_ref['foto_check'])){$foto_check = $linha_ref['foto_check'];}
}

if (!empty($txt_caminho_foto1)){
  if (file_exists($txt_caminho_foto)){unlink("$txt_caminho_foto");}
}

//APAGA DADOS TEMPORARIOS TABELA PET
$sql1 = "DELETE FROM `tab_temp_pet` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysqli_query($connection, $sql1) or die ("Problema no Delete tab_temp_clie - ".mysqli_error($connection));


//######### INICIO Pagina&ccedil;&atilde;o

//paginação
$total_reg = "10"; 

if(!isset($_GET["pagina"])){$_GET["pagina"]='';}

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



// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_pet.js"></script>';
?>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="585" border="0" cellpadding="1" cellspacing="1">
        </table>
          <table width="585" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#66CC66">
              <td height="20" colspan="7" align="center" bordercolor="#0099CC" bgcolor="#0099CC"><div align="center" class="style3"><strong>Cadastro de Pet</strong></div></td>
            </tr>
            <tr bordercolor="#0099CC" bgcolor="#33CCFF" class="cabec_style11">
              <td width="31" height="20"><div align="center" >C&oacute;d.</div></td>
              <td width="179" height="20"><div align="center" >Nome</div></td>
              <td width="108" height="20"><div align="center" >Ra&ccedil;a</div></td>
              <td width="122"><div align="center">Cor</div></td>
              <td width="71" height="20"><div align="center" >Dono</div></td>
              <td width="60" height="20"><div align="center">&nbsp;</div></td>
            </tr>
            <?php	  
    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_pet ORDER BY nome ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_pet");
    
   $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
 
 // echo  "<br/>quantreg: ".$quantreg;

 $tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";

while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_nome = $linha_ref['nome'];
$txt_raca = $linha_ref['raca'];
$txt_cor = $linha_ref['cor'];
$txt_dono = $linha_ref['dono'];
echo $txt_cod_dono = $linha_ref['cod_dono'];

$nome_dono = explode(" ",$txt_dono);

$sql = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE codigo='$txt_cod_dono'") or die("erro ao selecionar - ".mysqli_error($connection));

if ($linha = mysqli_fetch_array($sql)) {

$txt_ddd_tel = $linha['ddd_tel'];
$txt_tel = $linha['tel'];

if ($txt_ddd_tel==""){$txt_ddd_tel= $linha['ddd_cel'];}
if ($txt_tel==""){$txt_tel= $linha['cel'];}
}

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 

if(!isset($cod)){$cod ='';}
if(!isset($txt_nome)){$txt_nome ='';}
if(!isset($txt_raca)){$txt_raca ='';}
if(!isset($txt_cor)){$txt_cor ='';}
if(!isset($nome_dono)){$nome_dono ='';}


?>
            <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
              <td width="31" class="info"><div align="center"><?php echo $cod; ?></div></td>
              <td width="179" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_nome; ?></div></td>
              <td width="108" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_raca; ?></div></td>
              <td width="122" class="info"><div align="center">&nbsp;<?php echo $txt_cor; ?></div></td>
              <td width="71" height="5" class="info"><div align="center">&nbsp;<?php echo $nome_dono[0]; ?></div></td>
              <td width="60" height="5" colspan="2" class="info">&nbsp;<?php 
if ($nivel >1){echo '<a href="javascript:checar(\'deleta_pet.php?id='.$cod.'\');"><img src="'.$pontos.'imagens/delete.gif" border="0" alt="Apagar registro" title="Apagar registro"></a>&nbsp;';
}else{echo'&nbsp;&nbsp;&nbsp;&nbsp;';}

echo '<a href="cad_pet.php?id='.$cod.'"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Alterar registro" title="Alterar registro"></a>';

// VERIFICA SE O PET POSSUI CLIENTE
$sql_ref2 = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE codigo='$txt_cod_dono'") or die("erro ao selecionar sql_ref - ".mysqli_error($connection));
$tr1 = mysqli_num_rows($sql_ref2);

if ($linha_ref2 = mysqli_fetch_array($sql_ref2)){$txt_cod_clie=$linha_ref2['codigo'];}

if ($tr1 >=1){ 

echo '&nbsp;<a href="../clie/cad_clie.php?id='.$txt_cod_clie.'&&ret=2"><img src="'.$pontos.'imagens/cad_pet/btn_clie.gif" border="0" alt="'.$nome_dono[0].'" title="'.$nome_dono[0].'"></a>';

  $txt_nome ="";
  $txt_raca ="";
  $txt_cor ="";
  $txt_cod_dono ="";
  $tr1 ="";
  $txt_ddd_tel="";
  $txt_tel="";
}

}

if ($quantreg==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';}

@mysqli_close();

?></td>
            </tr>
        </table></td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="181" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/procurar.gif" width="112" height="25" border="0" usemap="#Map3Map" />
                <map name="Map3Map" id="Map3Map" title="Procurar cliente">
                  <area shape="rect" coords="3,0,113,28" href="javascript:popup_consulta_cad_pet();" alt="Procurar cliente"/>
                </map>
            </div></td>
            <td width="235" class="info"><div align="center">
                <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o
                  if ($quantreg >=10){include("paginacao.php");}
                ?>
                <br />
            </div></td>
            <td width="170" colspan="3" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/cadastrar.gif" width="105" height="25" border="0" usemap="#Map2Map" />
                <map name="Map2Map" id="Map2Map" title="Cadastrar cliente">
                  <area shape="rect" coords="1,3,105,24" href="cad_pet.php" target="_self" alt="Cadastrar cliente" />
                </map>
                </div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">
          <?php
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