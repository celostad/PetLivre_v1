<?php
session_start();

include("../../../include/arruma_link.php");
require_once($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

// VARIÁVEIS POSTADAS 

$txt_cod_prod = $_POST["txt_produto"];
$txt_pet = $_POST["txt_pet"];
$txt_qtde = $_POST["txt_qtde"];
$sel_medida = $_POST["sel_medida"];
$txt_valor1 = $_POST["txt_valor"];
$txt_especie = $_POST["txt_especie"];
$txt_obs_caixa = $_POST["txt_obs_caixa"];


//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])

$data_atual = Convert_Data_Port_Ingl($data_atual2);

// converte em FLOAT
$txt_valor = str_replace(",", ".",$txt_valor1);

// PEGA O NOME DO PRODUTO

$sql_cp = mysqli_query($connection, "SELECT * FROM `tab_produto` WHERE codigo='$txt_cod_prod'") or die("Erro ao selecionar   -  PRODUTO  sql_cp");

if ($linha_cp = mysqli_fetch_array($sql_cp)){

$txt_produto = $linha_cp['produto'];
}

// FINAL DA INSTRUÇÃO

$sql = mysqli_query($connection, "SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysqli_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysqli_query($connection, "UPDATE `tab_temp_caixa` SET  cod_produto='$txt_cod_prod', produto='$txt_produto', pet='$txt_pet', qtde='$txt_qtde', medida='$sel_medida',
 valor='$txt_valor', especie='$txt_especie', obs='$txt_obs_caixa', data ='$data_atual' WHERE usuario='$usuario'") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------

}else{
//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysqli_query($connection, "INSERT INTO `tab_temp_caixa` (`codigo`, `cod_produto`, `produto`, `pet`, `qtde`, `medida`,`valor`, `especie`, `obs`, 
`usuario`, `data`) VALUES (NULL, '$txt_cod_prod', '$txt_produto', '$txt_pet', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa',
 '$usuario','$data_atual')") or die (mysqli_error($connection));

//  -------------------------------------------------------------------------------------------

}
/*
echo "Cod_produto: ".$txt_cod_prod;
echo "<br>Produto: ".$txt_produto;
*/
@mysql_close();

if (empty($txt_produto)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (PRODUTO).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}

if ($txt_cod_prod <=10 and empty($txt_pet)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (PET).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}

if (empty($txt_qtde)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (QUANTIDADE).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}

if (empty($sel_medida)){echo '<script>alert("                   Atenção!\n\nÉ necessário selecionar o campo (MEDIDA).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}

if (empty($txt_valor)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (VALOR).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}

if (empty($txt_especie)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (ESPÉCIE).\n\n");</script>';
echo '<script>window.location = "../entrada_caixa.php";</script>';}


header ("location: cadastro_caixa_sucesso.php");

?>