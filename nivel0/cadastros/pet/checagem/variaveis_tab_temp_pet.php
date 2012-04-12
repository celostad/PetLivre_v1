<?
$sql_ref = mysql_query("SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_nome_pet = $linha_ref['nome'];
$txt_raca = $linha_ref['raca'];
$txt_sexo = $linha_ref['sexo'];
$txt_cor = $linha_ref['cor'];
$txt_dono = $linha_ref['dono'];
$txt_cod_dono = $linha_ref['cod_dono'];
$txt_porte = $linha_ref['porte'];
$txt_especie = $linha_ref['especie'];
$txt_data_nasc = $linha_ref['data_nasc'];
$txt_mensal = $linha_ref['mensalista'];
$txt_chip = $linha_ref['chip'];
$txt_rga = $linha_ref['rga'];
$txt_obs_pet = $linha_ref['obs'];
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}

if ($txt_data_nasc =="0000-00-00"){$txt_data_nasc="";}

$txt_data_nasc = Convert_Data_Ingl_Port($txt_data_nasc);

?>