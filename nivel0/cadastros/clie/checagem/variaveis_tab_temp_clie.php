<?php

include("../../../include/arruma_link.php");
include($pontos."include/mostra_erros.php");

$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

$txt_codigo_clie = $linha_ref['codigo'];
$txt_nome_clie = $linha_ref['nome'];
$sel_sexo = $linha_ref['sexo'];
$txt_end_clie = $linha_ref['endereco'];
$txt_cep_clie = $linha_ref['cep'];
$txt_bairro_clie = $linha_ref['bairro'];
$txt_cidade_clie = $linha_ref['cidade'];
$txt_uf = $linha_ref['uf'];
$txt_ddd_tel_clie = $linha_ref['ddd_tel'];
$txt_tel_clie = $linha_ref['tel'];
$txt_ddd_cel_clie = $linha_ref['ddd_cel'];
$txt_cel_clie = $linha_ref['cel'];
$txt_rg_clie = $linha_ref['rg'];
$txt_cpf = $linha_ref['cpf'];
$txt_data_nasc_clie = $linha_ref['data_nasc'];
$txt_obs_clie = $linha_ref['obs'];
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
$txt_data_cadastro = $linha_ref['data_cadastro'];
$txt_data_ult_atlz = $linha_ref['data_ult_atlz'];
}

if (!isset($txt_data_nasc_clie) || $txt_data_nasc_clie =="0000-00-00") {$txt_data_nasc_clie = '';}
if (!isset($sel_sexo)) {$sel_sexo = '';}

$txt_data_nasc_clie = Convert_Data_Ingl_Port($txt_data_nasc_clie);

if ($sel_sexo=="feminino"){$sel_sexo_descr="Feminino";}
if ($sel_sexo=="masculino"){$sel_sexo_descr="Masculino";}

?>