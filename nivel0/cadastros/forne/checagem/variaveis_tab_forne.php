<?php
$sql_tab_temp = mysqli_query($connection, "SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_tab_temp");

if ($linha_tab_temp = mysqli_fetch_array($sql_tab_temp)) {

	$txt_razao_social = $linha_tab_temp['razao_social'];
	$txt_contato = $linha_tab_temp['contato'];
	$txt_cnpj = $linha_tab_temp['cnpj'];
	$txt_endereco = $linha_tab_temp['endereco'];
	$txt_bairro = $linha_tab_temp['bairro'];
	$txt_cidade = $linha_tab_temp['cidade'];
	$txt_cep = $linha_tab_temp['cep'];
	$txt_uf = $linha_tab_temp['uf'];
	$txt_ddd_tel = $linha_tab_temp['ddd_tel'];
	$txt_tel_com = $linha_tab_temp['tel_com'];
	$txt_email = $linha_tab_temp['email'];
	$txt_ddd_cel = $linha_tab_temp['ddd_cel'];
	$txt_cel = $linha_tab_temp['cel'];
	$txt_obs_forne = $linha_tab_temp['obs_forne'];
	$txt_caminho_foto1 = $linha_tab_temp['caminho_foto'];
	$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}



// PEGA A FOTO
$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_fornecedor` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

	$txt_codigo_pet = $linha_ref['codigo'];
	if (empty($txt_razao_social)){$txt_razao_social = $linha_ref['razao_social'];}
	if (empty($txt_contato)){$txt_contato = $linha_ref['contato'];}
	if (empty($txt_cnpj)){$txt_cnpj = $linha_ref['cnpj'];}
	if (empty($txt_endereco)){$txt_endereco = $linha_ref['endereco'];}
	if (empty($txt_bairro)){$txt_bairro = $linha_ref['bairro'];}
	if (empty($txt_cidade)){$txt_cidade = $linha_ref['cidade'];}
	if (empty($txt_cep)){$txt_cep = $linha_ref['cep'];}
	if (empty($txt_uf)){$txt_uf = $linha_ref['uf'];}
	if (empty($txt_ddd_tel)){$txt_ddd_tel = $linha_ref['ddd_tel'];}
	if (empty($txt_tel_com)){$txt_tel_com = $linha_ref['tel_com'];}
	if (empty($txt_email)){$txt_email = $linha_ref['email'];}
	if (empty($txt_ddd_cel)){$txt_ddd_cel = $linha_ref['ddd_cel'];}
	if (empty($txt_cel)){$txt_cel = $linha_ref['cel'];}
	if (empty($txt_obs_forne)){$txt_obs_forne = $linha_ref['obs_forne'];}
	if (empty($txt_caminho_foto1)){
	$txt_caminho_foto1 = $linha_ref['caminho_foto'];
	$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}


$txt_data_cadastro = $linha_ref['data_cadastro'];
$txt_data_ult_atlz = $linha_ref['data_ult_atlz'];
}

?>