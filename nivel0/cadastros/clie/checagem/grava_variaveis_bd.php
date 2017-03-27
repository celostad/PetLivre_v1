<?php
session_start();

include("../../../../include/arruma_link.php");
include($pontos."include/mostra_erros.php");
include("func_data.php");
require_once($pontos."conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];


// VARIÁVEIS
if(isset($_POST["txt_nome_clie"])){ $txt_nome_clie = $_POST["txt_nome_clie"]; }
$sel_sexo = $_POST["sel_sexo"];
$txt_end_clie = $_POST["txt_end_clie"];
$txt_cep_clie = $_POST["txt_cep_clie"];
$txt_bairro_clie = $_POST["txt_bairro_clie"];
$txt_cidade_clie = $_POST["txt_cidade_clie"];
if(isset($_POST["txt_uf"])){$txt_uf = $_POST["txt_uf"];}
$txt_ddd_tel_clie = $_POST["txt_ddd_tel_clie"];
$txt_tel_clie = $_POST["txt_tel_clie"];
$txt_ddd_cel_clie = $_POST["txt_ddd_cel_clie"];
$txt_cel_clie = $_POST["txt_cel_clie"];
$txt_rg_clie = $_POST["txt_rg_clie"];
$txt_cpf = $_POST["txt_cpf"];
$txt_data_nasc_clie = $_POST["txt_data_nasc_clie"];
$txt_obs_clie = $_POST["txt_obs_clie"];

if ($txt_data_nasc_clie ==""){$txt_data_nasc_clie = "01/01/0001";}

if(!isset($_POST["txt_uf"])){$txt_uf = '';}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc_clie = Convert_Data_Port_Ingl($txt_data_nasc_clie);

$data_atual = Convert_Data_Port_Ingl($data_atual2);



$sql = mysqli_query($connection, "SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysqli_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysqli_query($connection, "UPDATE `tab_temp_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', cpf = '$txt_cpf', data_nasc ='$txt_data_nasc_clie', obs ='$txt_obs_clie', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysqli_query($connection, "INSERT INTO `tab_temp_clie` (`codigo`, `nome`, `sexo`,`endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `cpf`, `data_nasc`,`obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie',
'$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_cpf', '$txt_data_nasc_clie', '$txt_obs_clie', '$usuario','$data_atual')") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------

// $query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error($myConnection));

}

/*
if ($checa_retorno==1){ header("Location: ../popup_anexa_foto.php");
header("Location: ../cad_clie.php");
*/

if (!empty($rad_sel_visl)){
header("Location: ../cad_clie.php?id=$rad_sel_visl");
}else{
header("Location: ../cad_clie.php");
}
?>