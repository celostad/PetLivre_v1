<?
session_start();

include("../../../../include/arruma_link.php");
require_once($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

// VARIÁVEIS POSTADAS 
$txt_razao_social = $_POST["txt_razao_social"];
$txt_contato = $_POST["txt_contato"];
$txt_cnpj = $_POST["txt_cnpj"];
$txt_endereco = $_POST["txt_endereco"];
$txt_bairro = $_POST["txt_bairro"];
$txt_cidade = $_POST["txt_cidade"];
$txt_cep = $_POST["txt_cep"];
$txt_uf = $_POST["txt_uf"];
$txt_ddd_tel = $_POST["txt_ddd_tel"];
$txt_tel_com = $_POST["txt_tel_com"];
$txt_email = $_POST["txt_email"];
$txt_ddd_cel = $_POST["txt_ddd_cel"];
$txt_cel = $_POST["txt_cel"];
$txt_obs_forne = $_POST["txt_obs_forne"];


$data_atual = Convert_Data_Port_Ingl($data_atual2);


$sql = mysql_query("SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_fornecedor` SET razao_social='$txt_razao_social', contato='$txt_contato', cnpj='$txt_cnpj', endereco='$txt_endereco', bairro='$txt_bairro', cidade ='$txt_cidade', cep='$txt_cep', uf ='$txt_uf', ddd_tel ='$txt_ddd_tel',
tel_com = '$txt_tel_com', email='$txt_email', ddd_cel='$txt_ddd_cel', cel= '$txt_cel', obs_forne  ='$txt_obs_forne', data_ult_atlz ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_fornecedor` (`codigo`, `razao_social`, `contato`,`cnpj`, `endereco`, `bairro`, `cidade`, `cep`, `uf`, `ddd_tel`, `tel_com`, `email`, `ddd_cel`, `cel`, `obs_forne`,  `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_razao_social', '$txt_contato', '$txt_cnpj', '$txt_endereco', '$txt_bairro', '$txt_cidade', '$txt_cep', '$txt_uf', '$txt_ddd_tel', '$txt_tel_com', '$txt_email', '$txt_ddd_cel', '$txt_cel', '$txt_obs_forne', '$usuario', '$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}

if (empty($rad_sel_visl)){
header("Location: ../cad_forne.php");
}else{
header("Location: ../cad_forne.php?id=$rad_sel_visl");
}
?>