<?
$sql_tab_temp = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_foto");

if ($linha_tab_temp = mysql_fetch_array($sql_tab_temp)) {
$txt_nome_clie = $linha_tab_temp['nome'];
$sel_sexo = $linha_tab_temp['sexo'];
$txt_end_clie = $linha_tab_temp['endereco'];
$txt_cep_clie = $linha_tab_temp['cep'];
$txt_bairro_clie = $linha_tab_temp['bairro'];
$txt_cidade_clie = $linha_tab_temp['cidade'];
$txt_uf = $linha_tab_temp['uf'];
$txt_ddd_tel_clie = $linha_tab_temp['ddd_tel'];
$txt_tel_clie = $linha_tab_temp['tel'];
$txt_ddd_cel_clie = $linha_tab_temp['ddd_cel'];
$txt_cel_clie = $linha_tab_temp['cel'];
$txt_rg_clie = $linha_tab_temp['rg'];
$txt_cpf = $linha_tab_temp['cpf'];
$txt_data_nasc_clie = $linha_tab_temp['data_nasc'];
$txt_obs_clie = $linha_tab_temp['obs'];
$txt_caminho_foto1 = $linha_tab_temp['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}


$sql_ref = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_codigo_clie = $linha_ref['codigo'];
if (empty($txt_nome_clie)){$txt_nome_clie = $linha_ref['nome'];}
if (empty($sel_sexo)){$sel_sexo = $linha_ref['sexo'];}
if (empty($txt_end_clie)){$txt_end_clie = $linha_ref['endereco'];}
if (empty($txt_cep_clie)){$txt_cep_clie = $linha_ref['cep'];}
if (empty($txt_bairro_clie) or $txt_bairro_clie=="-- Incluir  /  Alterar --"){$txt_bairro_clie = $linha_ref['bairro'];}
if (empty($txt_cidade_clie) or $txt_cidade_clie=="-- Incluir  /  Alterar --"){$txt_cidade_clie = $linha_ref['cidade'];}
if (empty($txt_uf)){$txt_uf = $linha_ref['uf'];}
if (empty($txt_ddd_tel_clie)){$txt_ddd_tel_clie = $linha_ref['ddd_tel'];}
if (empty($txt_tel_clie)){$txt_tel_clie = $linha_ref['tel'];}
if (empty($txt_ddd_cel_clie)){$txt_ddd_cel_clie = $linha_ref['ddd_cel'];}
if (empty($txt_cel_clie)){$txt_cel_clie = $linha_ref['cel'];}
if (empty($txt_rg_clie)){$txt_rg_clie = $linha_ref['rg'];}
if (empty($txt_cpf)){$txt_cpf = $linha_ref['cpf'];}
if (empty($txt_data_nasc_clie)){$txt_data_nasc_clie = $linha_ref['data_nasc'];}
if (empty($txt_obs_clie)){$txt_obs_clie = $linha_ref['obs'];}
if (empty($txt_caminho_foto1)){
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}


$txt_data_cadastro = $linha_ref['data_cadastro'];
$txt_data_ult_atlz = $linha_ref['data_ult_atlz'];
}


if ($txt_data_nasc_clie =="0000-00-00"){$txt_data_nasc_clie="";}

$txt_data_nasc_clie = Convert_Data_Ingl_Port($txt_data_nasc_clie);

if ($sel_sexo=="feminino"){$sel_sexo_descr="Feminino";}
if ($sel_sexo=="masculino"){$sel_sexo_descr="Masculino";}

?>