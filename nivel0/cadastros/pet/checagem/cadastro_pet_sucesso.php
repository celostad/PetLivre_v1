<?php
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
$check_cad_clie = $_SESSION["check_cad_clie"];
$check_cad_clie = $_SESSION["check_cad_clie"];


$sql_ref = mysqli_query($connection, "SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysqli_fetch_array($sql_ref)) {

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
$txt_caminho_foto_temp = $linha_ref['caminho_foto'];
}

// SOMENTE ENTRA NESSA ROTINA SE HOUVER FOTO NA TABELA TEMP

if (!empty($txt_caminho_foto_temp)){


// APAGA PRIMEIRO A FOTO ORIGINAL ANTERIOR 
$sql_excl_orig = mysqli_query($connection, "SELECT * FROM `tab_pet` WHERE codigo='$rad_sel_visl'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  sql_excl");

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
$sql_atlzfoto = mysqli_query($connection, "UPDATE `tab_pet` SET caminho_foto='$novo_caminho_foto' WHERE codigo='$rad_sel_visl'") or die (mysqli_error($connection));
}
}// fecha if
// FINAL DA INSTRUÇÃO (COPIA A NOVA FOTO PARA LOCAL "UPLOADS")

//APAGA FOTO TEMPORÁRIA TAB_TEMP_CLIE
$sql_ref3= mysqli_query($connection, "SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

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
if ($novo_caminho_foto =="uploads/"){$novo_caminho_foto="";}


$sql_ref1 = mysqli_query($connection, "SELECT * FROM `tab_pet` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar2");

if ($linha_ref1 = mysqli_fetch_array($sql_ref1)) {

// ATUALIZA OS DADOS
$sql1 = mysqli_query($connection, "UPDATE `tab_pet` SET nome='$txt_nome_pet', sexo='$txt_sexo', cor='$txt_cor', dono='$txt_dono', cod_dono='$txt_cod_dono', data_nasc ='$txt_data_nasc', especie='$txt_especie', raca ='$txt_raca', porte ='$txt_porte', mensalista = '$txt_mensal', chip='$txt_chip', rga='$txt_rga', obs= '$txt_obs_pet', data_cadastro  ='$data_atual' WHERE codigo='$rad_sel_visl'") or die (mysqli_error($connection));

}else{

// CASO NÃO EXISTA INSERE O NOVO CLIENTE
$sql2 = mysqli_query($connection, "INSERT INTO `tab_pet` (`codigo`, `nome`, `sexo`,`cor`, `dono`, `cod_dono`, `data_nasc`, `especie`, `raca`, `porte`, `mensalista`, `chip`, `rga`, `obs`, `caminho_foto`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_pet', '$txt_sexo', '$txt_cor',
'$txt_dono', '$txt_cod_dono', '$txt_data_nasc', '$txt_especie', '$txt_raca', '$txt_porte', '$txt_mensal', '$txt_chip', '$txt_rga', '$txt_obs_pet', '$novo_caminho_foto', '$usuario', '$data_atual')") or die (mysqli_error($connection));
}


$sql1 = "DELETE FROM `tab_temp_pet` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysqli_query($connection, $sql1) or die ("Problema no Delete tab_temp_pet - SQL1");


//echo $check_cad_clie;

if (empty($rad_sel_visl)){

if ($check_cad_clie ==1){
$_SESSION["check_cad_clie"] =0;
echo '
<script>
if(confirm("Cadastro de pet gravado gravado com sucesso.\n\nGostaria de Cadastrar outro cliente agora?")){
window.location = "../../clie/cad_clie.php"
}else{
window.location = "../index_cad_pet.php"
}
</script>'; 
}//fecha if

echo '
<script>
alert ("Cadastro de pet gravado com sucesso.\n\n")
window.location = "../index_cad_pet.php"
</script>';
}else{
echo'
<script>
alert ("Cadastro de pet alterado com sucesso.\n\n")
window.location = "../index_cad_pet.php"
</script>';
}
?>