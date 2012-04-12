<?php
session_start();

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>';

include("../../../include/arruma_link.php");
include($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];
$Dados_post = $_SESSION["Dados_post"];



if (!empty($Dados_post)){
foreach ($Dados_post as $key => $row) {

$txt_cod_prod = $row['cod_produto'];
$txt_produto = $row['produto'];
$txt_cod_pet = $row['cod_pet'];
$txt_pet = $row['pet'];
$txt_qtde = $row['qtde'];
$sel_medida = $row['medida'];
$txt_valor = $row['valor'];
$txt_obs_mensal = $row['obs'];

}// fecha foreach
}
// PEGA O CÓDIGO DO DONO
$sql_cdono = mysql_query("SELECT * FROM `tab_pet` WHERE codigo='$txt_cod_pet'") or die("Erro ao selecionar   -  CODIGO_DONO  sql_cdono");

if ($linha_cdono = mysql_fetch_array($sql_cdono)){$txt_cod_dono = $linha_cdono['cod_dono'];}

//  *******************  INSERE AS VARIÁVEIS NA TAB CAIXA *****************************************
if (!empty($Dados_post)){

$sql2 = mysql_query("INSERT INTO `tab_mensalista` (`id`, `cod_produto`, `produto`, `cod_pet`, `mensalista`, `cod_dono`, `qtde`, `medida`,`valor`, `status`, `obs`, 
`usuario`, `data_banho`) VALUES (NULL, '$txt_cod_prod', '$txt_produto', '$txt_cod_pet', '$txt_pet', '$txt_cod_dono', '$txt_qtde', '$sel_medida', '$txt_valor', 0, '$txt_obs_mensal',
 '$usuario', '$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------


}

//print_r($Dados_post); die();

unset($_SESSION["Dados_post"]);

echo'
<script>
window.location = "../index_mensalista.php"
</script>';
?>