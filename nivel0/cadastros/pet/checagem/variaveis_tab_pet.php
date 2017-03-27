<?php
$sql_tab_temp = mysqli_query($connection, "SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_tab_temp = mysqli_fetch_array($sql_tab_temp)) {

$txt_nome_pet = $linha_tab_temp['nome'];
$txt_raca = $linha_tab_temp['raca'];
$txt_sexo = $linha_tab_temp['sexo'];
$txt_cor = $linha_tab_temp['cor'];
$txt_dono = $linha_tab_temp['dono'];
$txt_cod_dono = $linha_tab_temp['cod_dono'];
$txt_porte = $linha_tab_temp['porte'];
$txt_especie = $linha_tab_temp['especie'];
$txt_data_nasc = $linha_tab_temp['data_nasc'];
$txt_mensal = $linha_tab_temp['mensalista'];
$txt_chip = $linha_tab_temp['chip'];
$txt_rga = $linha_tab_temp['rga'];
$txt_obs_pet = $linha_tab_temp['obs'];
$txt_caminho_foto1 = $linha_tab_temp['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}



// PEGA A FOTO
$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_pet` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

$txt_codigo_pet = $linha_ref['codigo'];
if (empty($txt_nome_pet)){$txt_nome_pet = $linha_ref['nome'];}
if (empty($txt_raca)){$txt_raca = $linha_ref['raca'];}
if (empty($txt_sexo)){$txt_sexo = $linha_ref['sexo'];}
if (empty($txt_cor)){$txt_cor = $linha_ref['cor'];}
if (empty($txt_dono)){$txt_dono = $linha_ref['dono'];}
if (empty($txt_cod_dono)){$txt_cod_dono = $linha_ref['cod_dono'];}
if (empty($txt_porte)){$txt_porte = $linha_ref['porte'];}
if (empty($txt_especie)){$txt_especie = $linha_ref['especie'];}
if (empty($txt_data_nasc)){$txt_data_nasc = $linha_ref['data_nasc'];}
if (empty($txt_mensal)){$txt_mensal = $linha_ref['mensalista'];}
if (empty($txt_chip)){$txt_chip = $linha_ref['chip'];}
if (empty($txt_rga)){$txt_rga = $linha_ref['rga'];}
if (empty($txt_obs_pet)){$txt_obs_pet = $linha_ref['obs'];}
if (empty($txt_caminho_foto1)){
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}


$txt_data_cadastro = $linha_ref['data_cadastro'];
$txt_data_ult_atlz = $linha_ref['data_ult_atlz'];
}

if ($txt_data_nasc =="0000-00-00"){$txt_data_nasc="";}

$txt_data_nasc = Convert_Data_Ingl_Port($txt_data_nasc);

?>