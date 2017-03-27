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

$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_pet = $linha_ref['pet'];
$txt_qtde = $linha_ref['qtde'];
$sel_medida = $linha_ref['medida'];
$txt_valor = $linha_ref['valor'];
$txt_especie = $linha_ref['especie'];
$txt_obs_caixa = $linha_ref['obs'];
}

$data_atual = Convert_Data_Port_Ingl($entrada);




$sql4 = mysqli_query($connection, "SELECT * FROM combo_especie WHERE codigo='$txt_especie'") or die("Erro na tabela: combo_especie");

	if ($linha4 = mysqli_fetch_array($sql4)) {
		$txt_cartao = $linha4['especie'];
	}







//  *******************  INSERE AS VARIÁVEIS NA TAB CAIXA *****************************************
if (!empty($linha_ref)){

$sql2 = mysqli_query($connection, "INSERT INTO `tab_caixa` (`codigo`, `cod_produto`, `produto`, `pet`, `qtde`, `medida`,`valor`, `especie`, `obs`, 
`usuario`, `data`) VALUES (NULL, '$txt_cod_produto', '$txt_produto', '$txt_pet', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa',
 '$usuario','$data_atual')") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------
    if ($txt_especie > 1 and $txt_especie < 6){
    $sql3 = mysqli_query($connection, "INSERT INTO `tab_cartao` (`codigo`,  `ref_cartao`, `cartao`, `valor`, `data_venda`, `usuario`) VALUES (NULL, '$txt_especie', '$txt_cartao', '$txt_valor', '$data_atual', '$usuario')") or die (mysqli_error($connection));
    }





$sql1 = "DELETE FROM `tab_temp_caixa` WHERE `usuario` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_clie - SQL1");
}


echo'
<script>
window.location = "../index_caixa.php"
</script>';
?>
