<?
session_start();

include("../../../../include/arruma_link.php");
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
$txt_dono = $_POST["txt_dono"];
$txt_obs_pet = $_POST["txt_obs_pet"];

// PEGA O CODIGO DO DONO
$sql_dono = mysql_query("SELECT codigo,nome FROM `tab_clie` WHERE nome='$txt_dono'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");
if ($linha_dono = mysql_fetch_array($sql_dono)){$txt_cod_dono = $linha_dono['codigo'];}
//---------------------------

if (empty($txt_cod_dono)){$txt_cod_dono = 0;}


if (empty($txt_data_nasc)){$txt_data_nasc = "00/00/0000";}


//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc = Convert_Data_Port_Ingl($txt_data_nasc);

$data_atual = Convert_Data_Port_Ingl($data_atual2);


$sql = mysql_query("SELECT * FROM `tab_temp_pet` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_pet` SET nome='$txt_nome_pet', sexo='$txt_sexo', cor='$txt_cor', dono='$txt_dono', cod_dono='$txt_cod_dono', data_nasc ='$txt_data_nasc', especie='$txt_especie', raca ='$txt_raca', porte ='$txt_porte',
mensalista = '$txt_mensal', chip='$txt_chip', rga='$txt_rga', obs= '$txt_obs_pet', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_pet` (`codigo`, `nome`, `sexo`,`cor`, `dono`, `cod_dono`, `data_nasc`, `especie`, `raca`, `porte`, `mensalista`, `chip`, `rga`, `obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_pet', '$txt_sexo', '$txt_cor',
'$txt_dono', '$txt_cod_dono', '$txt_data_nasc', '$txt_especie', '$txt_raca', '$txt_porte', '$txt_mensal', '$txt_chip', '$txt_rga', '$txt_obs_pet', '$usuario', '$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}

if (empty($rad_sel_visl)){
header("Location: ../cad_pet.php");
}else{
header("Location: ../cad_pet.php?id=$rad_sel_visl");
}
?>