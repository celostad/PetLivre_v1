<?php
session_start();

print_r($_POST);

include("../../../../include/arruma_link.php");
include($pontos."include/mostra_erros.php");
require_once($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

// VARIÁVEIS POSTADAS 
$txt_nome_pet = $_POST["txt_nome_pet"];
$txt_raca = $_POST["txt_raca"];
$txt_sexo = $_POST["txt_sexo"];
$txt_porte = $_POST["txt_porte"];
$txt_cor = $_POST["txt_cor"];
$txt_especie = $_POST["txt_especie"];
$txt_data_nasc = $_POST["txt_data_nasc"];
$txt_mensal = $_POST["txt_mensal"];
$txt_chip = $_POST["txt_chip"];
$txt_rga = $_POST["txt_rga"];
$txt_cod_dono = $_POST["txt_cod_dono"];

$txt_obs_pet = $_POST["txt_obs_pet"];

if(empty($_POST["txt_cod_dono"])){$txt_cod_dono=0;}
if(!isset($_POST["txt_dono"])){$txt_dono='';}



if (empty($txt_data_nasc)){$txt_data_nasc = "01/01/0001";}

echo "<br>txt_cod_dono: ".$txt_cod_dono ;

// PEGA O CODIGO DO DONO
$sql_dono = mysqli_query($connection, "SELECT codigo,nome FROM `tab_clie` WHERE codigo='$txt_cod_dono'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");
if ($linha_dono = mysqli_fetch_array($sql_dono)){$txt_dono = $linha_dono['nome'];}
//---------------------------



//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc = Convert_Data_Port_Ingl($txt_data_nasc);

$data_atual = Convert_Data_Port_Ingl($data_atual2);


$sql = mysqli_query($connection, "SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysqli_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysqli_query($connection, "UPDATE `tab_temp_pet` SET nome='$txt_nome_pet', sexo='$txt_sexo', cor='$txt_cor', dono='$txt_dono', cod_dono='$txt_cod_dono', data_nasc ='$txt_data_nasc', especie='$txt_especie', raca ='$txt_raca', porte ='$txt_porte',
mensalista = '$txt_mensal', chip='$txt_chip', rga='$txt_rga', obs= '$txt_obs_pet', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysqli_query($connection, "INSERT INTO `tab_temp_pet` (`codigo`, `nome`, `sexo`,`cor`, `dono`, `cod_dono`, `data_nasc`, `especie`, `raca`, `porte`, `mensalista`, `chip`, `rga`, `obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_pet', '$txt_sexo', '$txt_cor',
'$txt_dono', '$txt_cod_dono', '$txt_data_nasc', '$txt_especie', '$txt_raca', '$txt_porte', '$txt_mensal', '$txt_chip', '$txt_rga', '$txt_obs_pet', '$usuario', '$data_atual')") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------
}

if (empty($rad_sel_visl)){
	header("Location: ../cad_pet.php");
}else{
	header("Location: ../cad_pet.php?id=$rad_sel_visl");
}
?>