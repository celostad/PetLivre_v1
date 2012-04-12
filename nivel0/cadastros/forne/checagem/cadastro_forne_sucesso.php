<?
session_start();

echo '
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>';

include("../../../../include/arruma_link.php");
include($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];

$sql_ref = mysql_query("SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

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
$txt_caminho_foto_temp = $linha_ref['caminho_foto'];
}

// SOMENTE ENTRA NESSA ROTINA SE HOUVER FOTO NA TABELA TEMP

if (!empty($txt_caminho_foto_temp)){


// APAGA PRIMEIRO A FOTO ORIGINAL ANTERIOR 
$sql_excl_orig = mysql_query("SELECT * FROM `tab_fornecedor` WHERE codigo='$rad_sel_visl'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  sql_excl");

if ($linha_excl_orig = mysql_fetch_array($sql_excl_orig)){
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
$sql_atlzfoto = mysql_query("UPDATE `tab_fornecedor` SET caminho_foto='$novo_caminho_foto' WHERE codigo='$rad_sel_visl'") or die (mysql_error());
}
}// fecha if
// FINAL DA INSTRUÇÃO (COPIA A NOVA FOTO PARA LOCAL "UPLOADS")

//APAGA FOTO TEMPORÁRIA TAB_TEMP_FORNECEDOR
$sql_ref3= mysql_query("SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref3 = mysql_fetch_array($sql_ref3)) {
$txt_caminho_foto_backup ="../foto/".$txt_caminho_foto_temp;
}

if (!empty($txt_caminho_foto_temp)){
if (file_exists($txt_caminho_foto_backup)){unlink("$txt_caminho_foto_backup");}
}

}//FECHA IF PRINCIPAL
// FINAL DA INSTRUÇÃO (APAGA FOTO TEMPORÁRIA TAB_TEMP_CLIE)

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($data_atual2);
if ($novo_caminho_foto =="uploads/"){$novo_caminho_foto="";}


$sql_ref1 = mysql_query("SELECT * FROM `tab_fornecedor` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar2");

if ($linha_ref1 = mysql_fetch_array($sql_ref1)) {

// ATUALIZA OS DADOS
$sql1 = mysql_query("UPDATE `tab_fornecedor` SET razao_social='$txt_razao_social', contato='$txt_contato', cnpj='$txt_cnpj', endereco='$txt_endereco', bairro='$txt_bairro', cidade ='$txt_cidade', cep='$txt_cep', uf ='$txt_uf', ddd_tel ='$txt_ddd_tel',
tel_com = '$txt_tel_com', email='$txt_email', ddd_cel='$txt_ddd_cel', cel= '$txt_cel', obs_forne  ='$txt_obs_forne', data_ult_atlz ='$data_atual' WHERE codigo='$rad_sel_visl'") or die (mysql_error());

}else{

// CASO NÃO EXISTA INSERE O NOVO CLIENTE
$sql2 = mysql_query("INSERT INTO `tab_fornecedor` (`codigo`, `razao_social`, `contato`,`cnpj`, `endereco`, `bairro`, `cidade`, `cep`, `uf`, `ddd_tel`, `tel_com`, `email`, `ddd_cel`, `cel`, `obs_forne`, `caminho_foto`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_razao_social', '$txt_contato', '$txt_cnpj', '$txt_endereco', '$txt_bairro', '$txt_cidade', '$txt_cep', '$txt_uf', '$txt_ddd_tel', '$txt_tel_com', '$txt_email', '$txt_ddd_cel', '$txt_cel', '$txt_obs_forne', '$novo_caminho_foto', '$usuario', '$data_atual')") or die (mysql_error());
}

/*
$sql1 = "DELETE FROM `tab_temp_fornecedor` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_pet - SQL1");
*/


if (empty($rad_sel_visl)){
echo '
<script>
alert ("Cadastro de fornecedor gravado com sucesso.\n\n")
window.location = "../index_cad_forne.php"
</script>';
}else{
echo'
<script>
alert ("Cadastro de fornecedor alterado com sucesso.\n\n")
window.location = "../index_cad_forne.php"
</script>';
}

?>