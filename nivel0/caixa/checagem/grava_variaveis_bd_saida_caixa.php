<?
session_start();

include("../../../include/arruma_link.php");
include("func_data.php");
require_once($pontos."conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$rad_sel_visl = $_SESSION["rad_sel_visl"];


// VARIÁVEIS
$txt_cod_material = $_POST["txt_material"];
$txt_qtde = $_POST["txt_qtde"];
$sel_medida = $_POST["sel_medida"];
$txt_valor = $_POST["txt_valor"];
$txt_especie = $_POST["txt_especie"];
$txt_obs_caixa = $_POST["txt_obs_caixa"];
$data_atual = Convert_Data_Port_Ingl($entrada);

// PEGA O NOME DO PRODUTO

$sql_cp = mysql_query("SELECT * FROM `tab_material` WHERE codigo='$txt_cod_material'") or die("Erro ao selecionar   -  PRODUTO  sql_cp");

if ($linha_cp = mysql_fetch_array($sql_cp)){

$txt_material = $linha_cp['material'];
}
// FINAL DA INSTRUÇÃO



$sql = mysql_query("SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_caixa` SET  cod_material='$txt_cod_material', material='$txt_material', qtde='$txt_qtde', medida='$sel_medida', valor='$txt_valor', especie='$txt_especie', obs='$txt_obs_caixa', data ='$data_atual' WHERE usuario='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_caixa` (`codigo`, `cod_material`, `material`, `qtde`, `medida`,`valor`, `especie`, `obs`, `usuario`, `data`) VALUES (NULL, '$txt_cod_material', '$txt_material', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}


header("Location: ../entrada_caixa.php");

?>
