<?php
$sel_tipo_pesq = $_SESSION["tipo_pesq"];
$txt_descricao_pesq = $_SESSION["descricao_pesq"];

$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

$sql = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%'") or die("erro ao selecionar");

$linhas=mysqli_num_rows($sql);

if($linhas>0){

//######### INICIO Pagina&ccedil;&atilde;o

//paginação
$total_reg = "11"; 

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

    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysqli_query($connection, "SELECT * FROM tab_clie WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%' ORDER BY nome ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysqli_query($connection, "SELECT * FROM tab_clie WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%'");
    
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o


echo '<script type="text/javascript" src="'.$pontos.'js/outros.js"></script>';

$tp = ceil($quantreg/$total_reg);    



// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

    
?>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="585" border="0" cellpadding="1" cellspacing="1">
        </table>
          <table width="585" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#66CC66">
              <td height="20" colspan="6" align="center" bordercolor="#66CC66" bgcolor="#66CC66"><div align="center" class="style3"><strong>Resultado da busca (</strong>Clientes<strong>)</strong></div></td>
            </tr>
            <tr bordercolor="#66CC66" class="cabec_style11">
              <td width="30" height="20" bgcolor="#66FF66"><div align="center" >C&oacute;d</div></td>
              <td width="190" height="20" bgcolor="#66FF66"><div align="center" >Nome</div></td>
              <td width="196" height="20" bgcolor="#66FF66"><div align="center" >Endere&ccedil;o</div></td>
              <td width="100" height="20" bgcolor="#66FF66"><div align="center" >Telefone</div></td>
              <td width="57" height="20" bgcolor="#66FF66"><div align="center">&nbsp;</div></td>
            </tr>
            <?		  
/*    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
$sql_registros = mysqli_query($connection, "SELECT * FROM tab_clie ORDER by nome ASC  LIMIT $inicio,$total_reg");

     $sql_conta = mysqli_query($connection, "SELECT * FROM tab_clie ");
   
    $quantreg = mysqli_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
 */   
$tp = ceil($quantreg/$total_reg);    
$cor="#FFFFFF";

while($linha_ref = mysqli_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_nome_clie = $linha_ref['nome'];
$txt_end_clie = $linha_ref['endereco'];
$txt_ddd_tel_clie = $linha_ref['ddd_tel'];
$txt_tel_clie = $linha_ref['tel'];
$txt_ddd_cel_clie = $linha_ref['ddd_cel'];
$txt_cel_clie = $linha_ref['cel'];
$txt_rg_clie = $linha_ref['rg'];

if ($txt_ddd_tel_clie <>""){$txt_ddd_tel=$txt_ddd_tel_clie; $txt_ddd_cel_clie="";}
if ($txt_tel_clie <>""){$txt_tel=$txt_tel_clie;$txt_cel_clie="";}
if ($txt_ddd_cel_clie <>""){$txt_ddd_tel=$txt_ddd_cel_clie;}
if ($txt_cel_clie <>""){$txt_tel=$txt_cel_clie;}

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
  ?>
            <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#5F8FBF'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
              <td width="30" class="info"><div align="center"><?php echo $cod ; ?></div></td>
              <td width="190" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_nome_clie; ?></div></td>
              <td width="196" height="5" class="info"><div align="center">&nbsp;<?php echo $txt_end_clie; ?></div></td>
              <td width="100" height="5" class="info"><div align="center"> &nbsp;
                      <?php if (!empty($txt_ddd_tel)){echo "(".$txt_ddd_tel.") ".$txt_tel;} ?>
              </div></td>
              <td width="57" height="5" colspan="2" class="info"><div align="center">
                  <?php 
if ($nivel >1){echo '<a href="javascript:checar(\'deleta_clie.php?id='.$cod.'\');"><img src="'.$pontos.'imagens/delete.gif" border="0" alt="Apagar registro" title="Apagar registro"></a>&nbsp;';
}else{echo'&nbsp;&nbsp;&nbsp;&nbsp;';}

echo '<a class="classe2" href="cad_clie.php?id='.$cod.'"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Ver/Alterar Cliente" title="Ver/Alterar Cliente"></a>';

// VERIFICA SE CLIENTE POSSUI ANIMAL
$sql_ref2 = mysqli_query($connection, "SELECT * FROM `tab_pet` WHERE cod_dono='$cod'") or die("erro ao selecionar sql_ref");
$tr1 = mysqli_num_rows($sql_ref2);

if ($linha_ref2 = mysqli_fetch_array($sql_ref2)){$txt_cod_dono=$linha_ref2['codigo'];}


if ($tr1 >=1){


echo '&nbsp;<a href="../pet/cad_pet.php?id='.$txt_cod_dono.'&&ret=2"><img src="'.$pontos.'imagens/cad_clie/btn_cao.gif" border="0" alt="Ver/Alterar Pet" title="Ver/Alterar Pet"></a>';


$txt_nome ="";
$txt_raca ="";
$txt_cor ="";
$txt_cod_dono ="";
$tr1 ="";
$txt_ddd_tel="";
$txt_tel="";
}
}
}else{

echo '<script>
alert ("                                Atenção!\n\nNão foi encontrado nenhum registro para '.$sel_tipo_pesq.' = '.$txt_descricao_pesq.'  \n\n") 
window.location = "index_cad_clie.php";
</script>';
//

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
          </table></td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="181" class="info"><div align="center"> <img src="<?=$pontos;?>imagens/cad_clie/procurar.gif" width="112" height="25" border="0" usemap="#Map_busca_clie" /></div></td>
            <td width="235" class="info"><div align="center">
                <?php // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("paginacao.php");}

?>
                <br />
            </div></td>
            <td width="170" colspan="3" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/cadastrar.gif" width="105" height="25" border="0" usemap="#map_cad_clie" /></div></td>
          </tr>
      </table></td>
    </tr>
    
    <tr>
      <td height="20" colspan="5"><div align="center">
          <p>Total de&nbsp;<strong><font color="#5D8FC0"><?php echo  $quantreg; ?></font>&nbsp;</strong>&nbsp;<?php echo $reg; ?>&nbsp;<?php echo $enc; ?>&nbsp;para&nbsp;<strong><font color="#5D8FC0"><?php echo $txt_descricao_pesq; ?></font></strong> </p>
          </div></td>
    </tr>
  </table>
  <map name="Map_busca_clie" id="Map_busca_clie" title="Procurar cliente">
    <area shape="rect" coords="1,3,112,23" href="javascript:popup_consulta_cad_clie();" />
  </map>
  <map name="map_cad_clie" id="map_cad_clie" title="Cadastrar cliente">
    <area shape="rect" coords="3,3,108,27" href="cad_clie.php" />
  </map>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>