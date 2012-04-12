<?php
$sql_ref = mysql_query("SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_cod_prod = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_pet = $linha_ref['pet'];
$txt_qtde = $linha_ref['qtde'];
$sel_medida = $linha_ref['medida'];
$txt_valor = $linha_ref['valor'];
$txt_cod_especie = $linha_ref['especie'];

// pega o nome da descriчуo da espщcie
$sql_especie = mysql_query("SELECT * FROM `combo_especie` WHERE codigo='$txt_cod_especie'") or die("erro ao selecionar sql_especie");
if ($linha_especie = mysql_fetch_array($sql_especie)) {
$txt_especie = $linha_especie['especie'];
}

$txt_obs_caixa = $linha_ref['obs'];
}

?>