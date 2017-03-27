<?php
$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_ref");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

$txt_razao_social = $linha_ref['razao_social'];
$txt_contato = $linha_ref['contato'];
$txt_cnpj = $linha_ref['cnpj'];
$txt_endereco = $linha_ref['endereco'];
$txt_bairro = $linha_ref['bairro'];
$txt_cidade = $linha_ref['cidade'];
$txt_cep = $linha_ref['cep'];
$txt_uf = $linha_ref['uf'];
$txt_ddd_tel = $linha_ref['ddd_tel'];
$txt_tel_com = $linha_ref['tel_com'];
$txt_email = $linha_ref['email'];
$txt_ddd_cel = $linha_ref['ddd_cel'];
$txt_cel = $linha_ref['cel'];
$txt_obs_forne = $linha_ref['obs_forne'];
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="foto/".$txt_caminho_foto1;
}



?>