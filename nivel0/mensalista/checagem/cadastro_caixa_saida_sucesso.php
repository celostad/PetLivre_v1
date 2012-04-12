<?
session_start();

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>';

include("../../../include/arruma_link.php");
include($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

$sql_ref = mysql_query("SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_cod_material = $linha_ref['cod_material'];
$txt_material = $linha_ref['material'];
$txt_qtde = $linha_ref['qtde'];
$sel_medida = $linha_ref['medida'];
$txt_valor = $linha_ref['valor'];
$txt_especie = $linha_ref['especie'];
$txt_obs_caixa = $linha_ref['obs'];
}

$data_atual = Convert_Data_Port_Ingl($entrada);




//  *******************  INSERE AS VARIÁVEIS NA TAB CAIXA *****************************************

$sql2 = mysql_query("INSERT INTO `tab_caixa` (`codigo`, `cod_material`, `material`, `qtde`, `medida`, `valor`, `especie`, `obs`, 
`status`, `usuario`, `data`) VALUES (NULL, '$txt_cod_material', '$txt_material', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa',
 0,'$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------


$sql1 = "DELETE FROM `tab_temp_caixa` WHERE `usuario` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_clie - SQL1");


echo'
<script>
window.location = "../index_caixa.php"
</script>';

?>