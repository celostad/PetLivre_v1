<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");
include("func_data.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];


// VARIÁVEIS
$txt_id_clie = $_POST["txt_id_clie"];


$sql_txt_id_clie = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$txt_id_clie'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  sql_txt_id_clie");

if ($linha_txt_id_clie = mysql_fetch_array($sql_txt_id_clie)){

$sql_2 = "DELETE FROM `tab_temp_banho` WHERE `user_cadastro` = '$usuario'";
$resultado2 = mysql_query($sql_2) or die ("Problema no Delete tab_temp_animal - SQL2");

$id_clie = $linha_txt_id_clie['codigo'];
$txt_nome_clie = $linha_txt_id_clie['nome'];
$sel_sexo = $linha_txt_id_clie['sexo'];
$txt_end_clie = $linha_txt_id_clie['endereco'];
$txt_cep_clie = $linha_txt_id_clie['cep'];
$txt_bairro_clie = $linha_txt_id_clie['bairro'];
$txt_cidade_clie = $linha_txt_id_clie['cidade'];
$txt_uf = $linha_txt_id_clie['uf'];
$txt_ddd_tel_clie = $linha_txt_id_clie['ddd_tel'];
$txt_tel_clie = $linha_txt_id_clie['tel'];
$txt_ddd_cel_clie = $linha_txt_id_clie['ddd_cel'];
$txt_cel_clie = $linha_txt_id_clie['cel'];
$txt_rg_clie = $linha_txt_id_clie['rg'];
$txt_obs_clie = $linha_txt_id_clie['obs'];
$txt_caminho_foto = $linha_txt_id_clie['caminho_foto'];
$txt_data_nasc_clie = $linha_txt_id_clie['data_nasc'];
$txt_data_cadastro = $linha_txt_id_clie['data_cadastro'];
}else{
echo '<script>
alert ("                                Atenção!\n\nNão foi encontrado nenhum cliente com o código = '.$txt_id_clie.'  \n\n\n") 
window.location = "../cad_banho.php";
</script>';
}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($data_atual2);
//$txt_data_nasc_clie = Convert_Data_Ingl_Port($linha_sel_nome['data_nasc']);


$sql = mysql_query("SELECT * FROM `tab_temp_banho` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_banho` SET id_clie='$id_clie', nome_clie='$txt_nome_clie', sexo_clie='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', data_nasc_clie ='$txt_data_nasc_clie', obs_clie ='$txt_obs_clie', caminho_foto_clie='$txt_caminho_foto', data_cadastro_clie ='$txt_data_cadastro', data_cad ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());
//  -------------------------------------------------------------------------------------------
}else{



//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_banho` (`codigo`, `id_clie`, `nome_clie`, `sexo_clie`,`endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `data_nasc_clie`,`obs_clie`, `caminho_foto_clie`, `data_cadastro_clie`, `data_cad`, `user_cadastro`) VALUES (NULL, '$id_clie', '$txt_nome_clie', '$sel_sexo', '$txt_end_clie',
'$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_data_nasc_clie', '$txt_obs_clie', '$txt_caminho_foto', '$txt_data_cadastro', '$data_atual', '$usuario')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}

header("Location: ../cad_banho.php");

?>
