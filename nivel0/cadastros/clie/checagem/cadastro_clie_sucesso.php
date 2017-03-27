<?php
session_start();

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>';

include("../../../../include/arruma_link.php");
include($pontos."include/mostra_erros.php");
include($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];

$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

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
	$txt_caminho_foto_temp = $linha_ref['caminho_foto'];
}

// SOMENTE ENTRA NESSA ROTINA SE HOUVET FOTO NA TABELA TEMP

if (!empty($txt_caminho_foto_temp)){


// APAGA PRIMEIRO A FOTO ORIGINAL ANTERIOR 
$sql_excl_orig = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  sql_excl");

if ($linha_excl_orig = mysqli_fetch_array($sql_excl_orig)){
	$txt_caminho_foto_orig = $linha_excl_orig['caminho_foto'];
	$txt_caminho_foto_excl = "../foto/".$txt_caminho_foto_orig;
}

if (!empty($txt_caminho_foto_orig)){
if (file_exists($txt_caminho_foto_excl)){unlink("$txt_caminho_foto_excl");}
}
// FINAL DA INSTRUÇÃO  (APAGA PRIMEIRO A FOTO ORIGINAL ANTERIOR)

// COPIA A NOVA FOTO PARA LOCAL "UPLOADS"
if (!empty($txt_caminho_foto_temp)){

$img_backup = str_replace("uploads/backup/", "", $txt_caminho_foto_temp);
$arquivo = "../foto/".$txt_caminho_foto_temp;
$dir_backup = "../foto/uploads/".$img_backup;
$novo_caminho_foto = "uploads/".$img_backup;
copy($arquivo, $dir_backup);

if (!empty($rad_sel_visl)){
$sql_atlzfoto = mysqli_query($connection, "UPDATE `tab_clie` SET caminho_foto='$novo_caminho_foto' WHERE codigo='$rad_sel_visl'") or die (mysqli_error($connection));
}
}// fecha if
// FINAL DA INSTRUÇÃO (COPIA A NOVA FOTO PARA LOCAL "UPLOADS")

//APAGA FOTO TEMPORÁRIA TAB_TEMP_CLIE
$sql_ref3= mysqli_query($connection, "SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref3 = mysqli_fetch_array($sql_ref3)) {
$txt_caminho_foto_backup ="../foto/".$txt_caminho_foto_temp;
}

if (!empty($txt_caminho_foto_temp)){
if (file_exists($txt_caminho_foto_backup)){unlink("$txt_caminho_foto_backup");}
}

}//FECHA IF PRINCIPAL
// FINAL DA INSTRUÇÃO (APAGA FOTO TEMPORÁRIA TAB_TEMP_CLIE)

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($data_atual2);

if (!isset($novo_caminho_foto)){$novo_caminho_foto='';}
if ($novo_caminho_foto =="uploads/"){$novo_caminho_foto="";}


$sql_ref1 = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar2");

if ($linha_ref1 = mysqli_fetch_array($sql_ref1)) {

// ATUALIZA OS DADOS
$sql1 = mysqli_query($connection, "UPDATE `tab_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie',
cidade ='$txt_cidade_clie', uf ='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie', ddd_cel='$txt_ddd_cel_clie', cel='$txt_cel_clie', rg = '$txt_rg_clie', cpf='$txt_cpf',
data_nasc ='$txt_data_nasc_clie', obs='$txt_obs_clie', user_cadastro='$usuario', data_ult_atlz='$data_atual' WHERE codigo='$rad_sel_visl'") or die (mysqli_error($connection));

}else{

// CASO NÃO EXISTA INSERE O NOVO CLIENTE
$sql2 = mysqli_query($connection, "INSERT INTO `tab_clie` (`codigo`, `nome`, `sexo`, `endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `cpf`, `data_nasc`, `obs`, `caminho_foto`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie', '$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_cpf', '$txt_data_nasc_clie', '$txt_obs_clie', '$novo_caminho_foto', '$usuario','$data_atual')") or die (mysqli_error($connection));
}


$sql1 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysqli_query($connection,$sql1) or die ("Problema no Delete tab_temp_clie - SQL1");



if (empty($rad_sel_visl)){


$sql_ref2 = mysqli_query($connection, "SELECT * FROM `tab_clie` WHERE nome='$txt_nome_clie'") or die("erro ao selecionar - sql_ref2");
	if ($linha_ref2 = mysqli_fetch_array($sql_ref2)) {
		$cod_clie_novo = $linha_ref2['codigo'];
	}
	
echo '
<script>
if(confirm("Cadastro de cliente gravado com sucesso.\n\nGostaria de Cadastrar o Pet agora?")){
window.location = "../../pet/cad_pet.php?codigo='.$cod_clie_novo.'&&check_cad_clie=1"
}else{
window.location = "../index_cad_clie.php"
}
</script>';

}else{
echo'
<script>
alert ("Cadastro de cliente alterado com sucesso.\n\n")
window.location = "../index_cad_clie.php"
</script>';
}
?>