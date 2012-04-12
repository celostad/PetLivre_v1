<?
$sel_tipo_pesq = $_SESSION["tipo_pesq"];
$txt_descricao_pesq = $_SESSION["descricao_pesq"];
$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

if ($sel_tipo_pesq =="Nome"){$sel_tipo_pesq ="nome";$pesq =1;}
if ($sel_tipo_pesq =="Raça"){$sel_tipo_pesq ="raca";$pesq =1;}
if ($sel_tipo_pesq =="Porte"){$sel_tipo_pesq ="porte";$pesq =1;}
if ($sel_tipo_pesq =="Sexo"){$sel_tipo_pesq ="sexo";$pesq =1;}
if ($sel_tipo_pesq =="Código"){$sel_tipo_pesq ="codigo";$pesq =1;}
if ($sel_tipo_pesq =="Espécie"){$sel_tipo_pesq ="especie";$pesq =1;}
if ($sel_tipo_pesq =="Idade"){$sel_tipo_pesq ="idade";$pesq =1;}
if ($sel_tipo_pesq =="Dono"){$sel_tipo_pesq ="dono";$pesq =1;}
if ($sel_tipo_pesq =="Mensalista"){$sel_tipo_pesq ="mensalista";}

//######### INICIO Pagina&ccedil;&atilde;o

//paginação
$total_reg = 10; 

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


$h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

if (($sel_tipo_pesq =="mensalista") && (empty($txt_descricao_pesq))){
$sql = "SELECT * FROM `tab_pet` WHERE mensalista='Sim'";
}

if (($sel_tipo_pesq =="mensalista") && (!empty($txt_descricao_pesq))){
$sql = "SELECT * FROM `tab_pet` WHERE mensalista='Sim' && $sel_tipo_pesq like '%$txt_descricao_pesq%'";
}

if ($pesq ==1){
$sql = "SELECT * FROM `tab_pet` WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%'";
}

$resultado = mysql_query($sql) or die("erro ao selecionar: resultado");

$linhas=mysql_num_rows($resultado);



if($linhas>0){






// APAGA OS DADOS DAS VARIVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
 
 if (($sel_tipo_pesq =="mensalista") && (empty($txt_descricao_pesq))){
$sql2 = "SELECT * FROM `tab_pet` WHERE mensalista='Sim' ORDER BY nome ASC";
}

if (($sel_tipo_pesq =="mensalista") && (!empty($txt_descricao_pesq))){
$sql2 = "SELECT * FROM `tab_pet` WHERE mensalista='Sim' && $sel_tipo_pesq like '%$txt_descricao_pesq%' ORDER BY nome ASC";
}

if ($pesq ==1){
$sql2 = "SELECT * FROM `tab_pet` WHERE $sel_tipo_pesq like '%$txt_descricao_pesq%' ORDER BY nome ASC LIMIT $inicio, $total_reg";
}

$resultado2 = mysql_query($sql2) or die("erro ao selecionar: resultado2");

 
$quantreg = mysql_num_rows($resultado2); // Quantidade de registros pra pagina&ccedil;&atilde;o

$tp = ceil($quantreg/$total_reg);    

echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_pet.js"></script>';
?>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5"><table width="585" border="0" cellpadding="1" cellspacing="1">
        </table>
          <table width="585" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#66CC66">
              <td height="20" colspan="7" align="center" bordercolor="#0099CC" bgcolor="#0099CC"><div align="center" class="style3"><strong>Resultado da busca </strong>(Pet)</div></td>
            </tr>
            <tr bordercolor="#0099CC" bgcolor="#33CCFF" class="cabec_style11">
              <td width="38" height="20"><div align="center">C&oacute;d.</div></td>
              <td width="180" height="20"><div align="center" >Nome</div></td>
              <td width="99" height="20"><div align="center" >Ra&ccedil;a</div></td>
              <td width="122"><div align="center">Cor</div></td>
              <td width="70" height="20"><div align="center" >Dono</div></td>
              <td width="62" height="20"><div align="center">&nbsp;</div></td>
            </tr>
            <?		  
if($quantreg >0) {

while($linha_ref = mysql_fetch_array($resultado2)) {

$cod = $linha_ref['codigo'];
$txt_nome = $linha_ref['nome'];
$txt_raca = $linha_ref['raca'];
$txt_cor = $linha_ref['cor'];
$txt_dono = $linha_ref['dono'];
$txt_cod_dono = $linha_ref['cod_dono'];

$nome_dono = explode(" ",$txt_dono);

$sql = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$txt_cod_dono'") or die("erro ao selecionar");

if ($linha = mysql_fetch_array($sql)) {

$txt_ddd_tel = $linha['ddd_tel'];
$txt_tel = $linha['tel'];

if ($txt_ddd_tel==""){$txt_ddd_tel= $linha['ddd_cel'];}
if ($txt_tel==""){$txt_tel= $linha['cel'];}
}//fecha if

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
  ?>
            <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
              <td width="38" class="info"><div align="center"><? echo $cod; ?></div></td>
              <td width="180" height="5" class="info"><div align="center">&nbsp;<? echo $txt_nome; ?></div></td>
              <td width="99" height="5" class="info"><div align="center">&nbsp;<? echo $txt_raca; ?></div></td>
              <td width="122" class="info"><div align="center">&nbsp;<? echo $txt_cor; ?></div></td>
              <td width="70" height="5" class="info"><div align="center">&nbsp;<? echo $nome_dono[0]; ?></div></td>
              <td width="62" height="5" colspan="2" class="info"><div align="center">
                    <? 
if ($nivel >1){echo '<a href="javascript:checar(\'deleta_pet.php?id='.$cod.'\');"><img src="'.$pontos.'imagens/delete.gif" border="0" alt="Apagar registro" title="Apagar registro"></a>&nbsp;';
}else{echo'&nbsp;&nbsp;&nbsp;&nbsp;';}

echo '<a href="cad_pet.php?id='.$cod.'&&ret=1"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Alterar registro" title="Alterar registro"></a>';

// VERIFICA SE O PET POSSUI CLIENTE
$sql_ref2 = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$txt_cod_dono'") or die("erro ao selecionar sql_ref");
$tr1 = mysql_num_rows($sql_ref2);

if ($linha_ref2 = mysql_fetch_array($sql_ref2)){$txt_cod_clie=$linha_ref2['codigo'];}

if ($tr1 >=1){ 

echo '&nbsp;<a href="../clie/cad_clie.php?id='.$txt_cod_clie.'&&ret=3"><img src="'.$pontos.'imagens/cad_pet/btn_clie.gif" border="0" alt="'.$nome_dono[0].'" title="'.$nome_dono[0].'"></a>';

$txt_nome ="";
$txt_raca ="";
$txt_cor ="";
$txt_cod_dono ="";
$tr1 ="";
$txt_ddd_tel="";
$txt_tel="";
}
}
}
}else{

 if ($sel_tipo_pesq =="nome"){$sel_tipo_pesq="Nome";}
 if ($sel_tipo_pesq =="tel"){$sel_tipo_pesq="Telefone";}
 if ($sel_tipo_pesq =="cel"){$sel_tipo_pesq="Celular";}
 if ($sel_tipo_pesq =="rg"){$sel_tipo_pesq="RG";}
 if ($sel_tipo_pesq =="codigo"){$sel_tipo_pesq="C&oacute;digo";}
 if ($sel_tipo_pesq =="endereco"){$sel_tipo_pesq="Endere&ccedil;o";}

echo '<script>
alert ("                                Aten&ccedil;&atilde;o!\n\nN&atilde;o foi encontrado nenhum registro para '.$sel_tipo_pesq.' = '.$txt_descricao_pesq.'  \n\n") 
window.location = "index_cad_pet.php";
</script>';
//break;

}
@mysql_close();

if ($quantreg <=1){
$reg="registro"; $enc ="encontrado";
}else{
$reg="registros"; $enc ="encontrados";
}


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
            <td width="181" class="info"><div align="center"><img src="<?=$pontos;?>imagens/cad_clie/procurar.gif" width="112" height="25" border="0" usemap="#Map3Map" />
                    <map name="Map3Map" id="Map3Map" title="Procurar cliente">
                      <area shape="rect" coords="3,0,113,28" href="javascript:popup_consulta_cad_pet();" alt="Procurar cliente"/>
                    </map>
            </div></td>
            <td width="235" class="info"><div align="center">
                <? // Chama o arquivo que monta a pagina&ccedil;&atilde;o
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
      <td height="20" colspan="5"><div align="center">Total de&nbsp;<strong><font color="#5D8FC0"><? echo  $quantreg; ?></font>&nbsp;</strong>&nbsp;<? echo $reg; ?>&nbsp;<? echo $enc; ?>&nbsp;para&nbsp;<strong><font color="#5D8FC0"><? echo $txt_descricao_pesq; ?></font></strong></div></td>
    </tr>
  </table>
</form>
