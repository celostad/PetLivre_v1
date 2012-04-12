<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];

// VARIÁVEIS POSTADAS 
$txt_nome_clie = $_POST["txt_nome_clie"];
$sel_sexo = $_POST["sel_sexo"];
$txt_end_clie = $_POST["txt_end_clie"];
$txt_cep_clie = $_POST["txt_cep_clie"];
$txt_bairro_clie = $_POST["txt_bairro_clie"];
$txt_cidade_clie = $_POST["txt_cidade_clie"];
$txt_uf = $_POST["txt_uf"];
$txt_ddd_tel_clie = $_POST["txt_ddd_tel_clie"];
$txt_tel_clie = $_POST["txt_tel_clie"];
$txt_ddd_cel_clie = $_POST["txt_ddd_cel_clie"];
$txt_cel_clie = $_POST["txt_cel_clie"];
$txt_rg_clie = $_POST["txt_rg_clie"];
$txt_data_nasc_clie = $_POST["txt_data_nasc_clie"];
$txt_obs_clie = $_POST["txt_obs_clie"];
$dados_check_clie=0;


include("checagem/checa_cad_temp.php");


$sql_ref3 = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref3 = mysql_fetch_array($sql_ref3)){

$dados_check_clie = $linha_ref3['dados_check'];
}


if ($dados_check_clie ==0){

// APAGA TABELA TEMPORÁRIA CLIENTE

$sql_3 = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha3 = mysql_fetch_array($sql_3)) {

$sql3 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado3 = mysql_query($sql3) or die ("Problema no Delete tab_temp_clie - SQL2");
}

echo '<script>
window.opener.location = "cad_banho.php";
window.opener.focus();
self.close();
</script>';
}else{

echo '<script>
if(confirm("                                     Atenção!\n\nExistem alterações no cadastro anterior que não foram gravados.\nClicando em \"Cancelar\" estes dados serão perdidos.\n\nGostaria de retornar a tela anterior e gravá-los agora?\n\nCaso positivo, clique em \"OK\".\n\n\n")){
window.location = "cad_clie_banho.php";
}else{
window.location = "checagem/func_apaga_tabela.php";
}
</script>';

}
?>