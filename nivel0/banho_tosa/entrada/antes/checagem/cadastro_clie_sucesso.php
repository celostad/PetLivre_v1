<?
session_start();

require_once("../../../../conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

$sql_ref = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

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
$txt_data_nasc_clie = $linha_ref['data_nasc'];
$txt_obs_clie = $linha_ref['obs'];
$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="../../foto_webcam/".$txt_caminho_foto1;
$foto_check = $linha_ref['foto_check'];
}


if ($txt_nome_clie =="" or $txt_nome_clie ==" "){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (NOME).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if ($txt_end_clie =="" or $txt_end_clie ==" "){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (ENDEREÇO).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if ($txt_bairro_clie =="" or $txt_bairro_clie ==" "){echo '<script>alert("                   Atenção!\n\nÉ necessário selecionar o campo (BAIRRO).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if ($txt_cidade_clie =="" or $txt_cidade_clie ==" "){echo '<script>alert("                   Atenção!\n\nÉ necessário selecionar o campo (CIDADE).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if (($txt_tel_clie =="" or $txt_tel_clie ==" ") and ($txt_cel_clie =="" or $txt_cel_clie ==" ")){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher pelo menos 01(um) dos Telefones.\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if ($txt_tel_clie <>""){
if ($txt_ddd_tel_clie =="" or $txt_ddd_tel_clie ==" "){
echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if (strlen($txt_tel_clie) < 9){
echo '<script>alert("                   Atenção!\n\nO Telefone inserido é invalido ou tem poucos caracteres.\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}
}

if ($txt_cel_clie <>""){
if ($txt_ddd_cel_clie =="" or $txt_ddd_cel_clie ==" "){
echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}

if (strlen($txt_cel_clie) < 9){
echo '<script>alert("                   Atenção!\n\nO Telefone inserido é invalido ou tem poucos caracteres.\n\n");</script>';
echo '<script>window.location = "../cad_clie_banho.php";</script>';}
}



if ($txt_caminho_foto1<>""){
$img_backup = str_replace("uploads/backup/", "", $txt_caminho_foto1);
$arquivo = $txt_caminho_foto;
$dir_backup = "../../foto_webcam/uploads/".$img_backup;
$novo_caminho_foto = "uploads/".$img_backup;
copy($arquivo, $dir_backup);
}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($data_atual2);


$sql_ref1 = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar2");

if ($linha_ref1 = mysql_fetch_array($sql_ref1)) {

// atualiza os dados

$sql1 = mysql_query("UPDATE `tab_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie',
cidade ='$txt_cidade_clie', uf ='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie', ddd_cel='$txt_ddd_cel_clie', cel='$txt_cel_clie', rg = '$txt_rg_clie',
data_nasc ='$txt_data_nasc_clie', obs='$txt_obs_clie', user_cadastro='$usuario', data_ult_atlz='$data_atual' WHERE codigo='$rad_sel_visl'") or die (mysql_error());

}else{

$sql2 = mysql_query("INSERT INTO `tab_clie` (`codigo`, `nome`, `sexo`, `endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `data_nasc`, `obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie',
'$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_data_nasc_clie', '$txt_obs_clie', '$usuario','$data_atual')") or die (mysql_error());
}



// *********************    APAGA A FOTO TEMPORRIA  ***************************

// PRIMEIRO PEGA A FOTO ANTERIOR NO BD CLIE

$sql_compara = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("Erro ao selecionar   -   Comparacao foto");

if ($linha_compara = mysql_fetch_array($sql_compara)){
$txt_caminho_foto_compara = $linha_compara['caminho_foto'];
$txt_caminho_foto_excl = "../../foto_webcam/".$txt_caminho_foto_compara;
}
// DEPOIS COMPARA E APAGA SE NÃO FOR IGUAL
if ($txt_caminho_foto_compara<>""){
if ($img_backup<>"" and $novo_caminho_foto <> $txt_caminho_foto_compara){unlink("$txt_caminho_foto_excl");}
}
// *********************    FINAL DA INSTRUÇÃO  - APAGA A FOTO TEMPORÁRIA     **********

if ($img_backup<>""){
if ($txt_caminho_foto1<>""){unlink("$txt_caminho_foto");}
}

if ($foto_check==1){unlink("$txt_caminho_foto_excl");}

$sql1 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_clie - SQL1");

$sql_1 = mysql_query("UPDATE `tab_clie` SET caminho_foto ='$novo_caminho_foto' WHERE codigo='$rad_sel_visl'") or die (mysql_error());

/*
echo "txt_caminho_foto_compara: ".$txt_caminho_foto_compara;
echo "<br>txt_caminho_foto_excl: ".$txt_caminho_foto_excl;
echo "<br>Novo caminho foto: ".$novo_caminho_foto;
*/

if ($rad_sel_visl==""){ ?>
<script>
//alert ("Cadastro de cliente gravado com sucesso.\n\n")
window.opener.location = "../cad_banho.php";
window.opener.focus();
self.close();
</script>
<? }else{ ?>
<script>
window.opener.location = "../cad_banho.php";
window.opener.focus();
self.close();
</script>
<? } ?>
