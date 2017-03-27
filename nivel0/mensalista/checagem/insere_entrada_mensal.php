<?php
session_start();

include("../../../include/arruma_link.php");
require_once($pontos."conexao.php");
include("func_data.php");

$usuario = $_SESSION["sessao_login"];

// VARIÁVEIS POSTADAS 
// VARIÁVEIS
$txt_cod_pet = $_POST["txt_cod_pet"];
$txt_cod_prod = $_POST["txt_cod_prod"];
$txt_qtde = $_POST["txt_qtde"];
$sel_medida = $_POST["sel_medida"];
$txt_valor1 = $_POST["txt_valor"];
$txt_obs_mensal = $_POST["txt_obs_mensal"];
$data_atual = Convert_Data_Port_Ingl($data_atual2);

// PEGA O NOME DO PRODUTO
$sql_cp = mysqli_query($connection, "SELECT * FROM `tab_produto` WHERE codigo='$txt_cod_prod'") or die("Erro ao selecionar   -  PRODUTO  sql_cp");

if ($linha_cp = mysqli_fetch_array($sql_cp)){$txt_produto = $linha_cp['produto'];}

// PEGA O NOME DO PET
$sql_cpet = mysqli_query($connection, "SELECT * FROM `tab_pet` WHERE codigo='$txt_cod_pet'") or die("Erro ao selecionar   -  tab_PET  sql_cpet");

if ($linha_cpet = mysqli_fetch_array($sql_cpet)){$txt_pet = $linha_cpet['nome'];}


// converte em FLOAT
$txt_valor = str_replace(",", ".",$txt_valor1);


unset($_SESSION["Dados_post"]);

$Dados_post[] = array(
						   'cod_produto' => $txt_cod_prod,
						   'produto' => $txt_produto,
						   'cod_pet' => $txt_cod_pet,
							'pet' => $txt_pet,
							'qtde' => $txt_qtde,
							'medida' => $sel_medida,
							'valor' => $txt_valor,
							'obs' => $txt_obs_mensal
							);

$_SESSION["Dados_post"] = $Dados_post; 





if (empty($txt_produto)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (PRODUTO).\n\n");</script>';
echo '<script>window.location = "../entrada_mensalista.php";</script>';}

if (empty($txt_pet)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (PET).\n\n");</script>';
echo '<script>window.location = "../entrada_mensalista.php";</script>';}

if (empty($txt_qtde)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (QUANTIDADE).\n\n");</script>';
echo '<script>window.location = "../entrada_mensalista.php";</script>';}

if (empty($sel_medida)){echo '<script>alert("                   Atenção!\n\nÉ necessário selecionar o campo (MEDIDA).\n\n");</script>';
echo '<script>window.location = "../entrada_mensalista.php";</script>';}

if (empty($txt_valor)){echo '<script>alert("                   Atenção!\n\nÉ necessário preencher o campo (VALOR).\n\n");</script>';
echo '<script>window.location = "../entrada_mensalista.php";</script>';}


header ("location: cadastro_mensal_sucesso.php");

?>