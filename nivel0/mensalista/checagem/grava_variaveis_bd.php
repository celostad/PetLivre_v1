<?
session_start();

include("../../../include/arruma_link.php");
include("func_data.php");
require_once($pontos."conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];


// VARIÁVEIS
$txt_cod_prod = $_POST["txt_cod_prod"];
$txt_cod_pet = $_POST["txt_cod_pet"];
$txt_qtde = $_POST["txt_qtde"];
$sel_medida = $_POST["sel_medida"];
$txt_valor = $_POST["txt_valor"];
$txt_obs_mensal = $_POST["txt_obs_mensal"];

// PEGA O NOME DO PRODUTO
$sql_cp = mysql_query("SELECT * FROM `tab_produto` WHERE codigo='$txt_cod_prod'") or die("Erro ao selecionar   -  PRODUTO  sql_cp");

if ($linha_cp = mysql_fetch_array($sql_cp)){$txt_produto = $linha_cp['produto'];}

// PEGA O NOME DO PET
$sql_cpet = mysql_query("SELECT * FROM `tab_pet` WHERE codigo='$txt_cod_pet'") or die("Erro ao selecionar   -  tab_PET  sql_cpet");

if ($linha_cpet = mysql_fetch_array($sql_cpet)){$txt_pet = $linha_cpet['nome'];}

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

header("Location: ../entrada_mensalista.php");

?>
