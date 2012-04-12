<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];
$checa_vazio2 = $_SESSION["checa_rad_vazio2"];

if ($checa_vazio2 ==""){

$sql_ref1 = mysql_query("SELECT * FROM `tab_clie` WHERE nome='$txt_dono'") or die("erro ao selecionar1");

if ($linha_ref1 = mysql_fetch_array($sql_ref1)){

$txt_cod_dono = $linha_ref1['codigo'];
}

// VARIÁVEIS POSTADAS 
$txt_nome_animal = $_POST["txt_nome_animal"];
$txt_raca = $_POST["txt_raca"];
$sel_sexo = $_POST["sel_sexo"];
$txt_cor = $_POST["txt_cor"];
$sel_porte = $_POST["sel_porte"];
$sel_especie = $_POST["sel_especie"];
$txt_data_nasc = $_POST["txt_data_nasc"];
$sel_tipo_idade = $_POST["sel_tipo_idade"];
$sel_mensal = $_POST["sel_mensal"];
$txt_dono = $_POST["txt_dono"];
$txt_obs = $_POST["txt_obs"];
$dados_check_animal=0;


include("checagem/checa_alteracao.php");
}


$sql_ref_2 = mysql_query("SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref_2 = mysql_fetch_array($sql_ref_2)){

$dados_check_animal = $linha_ref_2['dados_check'];
}
  



// PEGA O NOME DO ANIMAL
$sql_ref3 = mysql_query("SELECT * FROM `tab_pet` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar sql_ref1");

if ($linha_ref3 = mysql_fetch_array($sql_ref3)) {

$txt_codigo_animal = $linha_ref3['codigo'];
$txt_nome_animal = $linha_ref3['nome'];
$txt_dono_tab = $linha_ref3['dono'];
}else{
 echo "Erro: Não existe Nome do Animal (Mostra Clie.php)";} 

//echo "<br>dados_check_animal: ".$dados_check_animal;

?>

<html>
<head>
<script type="text/javascript" src="../../../js/func_cad_pet.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style8 {font-size: 11px}
.style11 {
	font-size: 10px;
	color: #5F8FBF;
	font-weight: bold;
}
.style19 {font-family: Verdana, sans-serif; font-weight: bold; font-size: 11px;}
.style21 {color: #5F8FBF}
.style22 {
	font-size: 11px;
	color: #5F8FBF;
	font-weight: bold;
}
.style23 {font-size: 10px}
-->
</style>
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Animal)</title>
<body bgcolor="#FFFFFF">
<form name="frmAjax" method="POST">
  <table width="400" border="0" bordercolor="#cccccc" height="100" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="634" height="20" colspan="3"><div align="left"><span class="style19">&nbsp;&nbsp;C&oacute;digo:&nbsp;</span><span class="link1 style21">&nbsp;<? echo $txt_codigo_animal; ?> </span><span class="style19">&nbsp;&nbsp;&nbsp;&nbsp;Animal:</span>&nbsp;<span class="link1 style21"><? echo $txt_nome_animal; ?></span></div></td>
    </tr>
    <tr>
      <td height="10" colspan="3"></td>
    </tr>
    <tr>
      <td height="15" colspan="3"><img src="../../../imagens/fundo_cad_cima.jpg" width="400" height="15" border="0"></td>
    </tr>
    <tr>
      <td height="20" colspan="3" nowrap background="../../../imagens/fundo_formulario_popup.jpg"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="24" class="cabec_style11"><table width="395" border="1" align="center" cellpadding="1" cellspacing="1">
              <tr bgcolor="#CCCCCC">
                <td width="44" align="center"><div align="center" class="style8"><em><strong>C&oacute;digo</strong></em><em><strong></strong></em></div></td>
                <td width="135" align="center"><div align="center" class="style8"><em><strong>Nome</strong></em> <em><strong>do Cliente </strong></em></div></td>
                <td width="113" align="center"><div align="center" class="style8"><em><strong>Telefone</strong></em></div></td>
                <td width="80" align="center"><div align="center">
<input name="Button5" type="button" onClick="javascript:gera_tela_cliente_animal_antes_de_fechar();" value="Ver/Alterar">
                </div></td>
              </tr>
              <tr>
                <?		  
    
// PEGA OS DADOS DO ANIMAL

$sql_registros = mysql_query("SELECT * FROM tab_clie WHERE nome='$txt_dono_tab' ORDER BY nome");

while($linha_ref = mysql_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_nome = $linha_ref['nome'];
$txt_ddd_tel = $linha_ref['ddd_tel'];
$txt_tel = $linha_ref['tel'];

if ($txt_ddd_tel==""){$txt_ddd_tel= $linha_ref['ddd_cel'];}
if ($txt_tel==""){$txt_tel= $linha_ref['cel'];}

?>
                <td><div align="center" class="style11 style8"><? echo $cod; ?> </div></td>
                <td height="8"><div align="center" class="style11 style8"><? echo $txt_nome; ?> </div></td>
                <td><div align="center" class="style11 style8">( <? echo $txt_ddd_tel; ?> ) <? echo $txt_tel; ?> </div></td>
                <td><div align="center">
                    <input name="rad_clie" type="radio" value="<?=$cod;?>">
                </div></td>
              </tr>
<?
}
@mysql_close();
?>

              <tr>
                <td height="8" colspan="3">&nbsp;</td>
                <td><div align="center">
                    <input name="Button52" type="button" onClick="fechar_popup_mostra_clie();" value="Fechar">
                </div></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="15" colspan="3" align="center" valign="bottom"><img src="../../../imagens/fundo_cad_baixo.jpg" width="400" height="15"></td>
    </tr>
  </table>
</form>

</body>
</html>