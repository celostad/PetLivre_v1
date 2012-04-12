<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];


// VARIÁVEIS
$sel_nome_clie = $_POST["sel_nome_clie"];


$sql_sel_nome = mysql_query("SELECT * FROM `tab_clie` WHERE nome='$sel_nome_clie'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha_sel_nome = mysql_fetch_array($sql_sel_nome)){

$sql_2 = "DELETE FROM `tab_temp_banho` WHERE `user_cadastro` = '$usuario'";
$resultado2 = mysql_query($sql_2) or die ("Problema no Delete tab_temp_animal - SQL2");

$id_clie = $linha_sel_nome['codigo'];
$txt_nome_clie = $linha_sel_nome['nome'];
$sel_sexo = $linha_sel_nome['sexo'];
$txt_end_clie = $linha_sel_nome['endereco'];
$txt_cep_clie = $linha_sel_nome['cep'];
$txt_bairro_clie = $linha_sel_nome['bairro'];
$txt_cidade_clie = $linha_sel_nome['cidade'];
$txt_uf = $linha_sel_nome['uf'];
$txt_ddd_tel_clie = $linha_sel_nome['ddd_tel'];
$txt_tel_clie = $linha_sel_nome['tel'];
$txt_ddd_cel_clie = $linha_sel_nome['ddd_cel'];
$txt_cel_clie = $linha_sel_nome['cel'];
$txt_rg_clie = $linha_sel_nome['rg'];
$txt_obs_clie = $linha_sel_nome['obs'];
$txt_caminho_foto = $linha_sel_nome['caminho_foto'];
$txt_data_nasc_clie = $linha_sel_nome['data_nasc'];
$txt_data_cadastro = $linha_sel_nome['data_cadastro'];
}



$h = getdate(); //variavel recebe a data
$ha=date("H");
$date =date("$ha:i");
$data_atual2 = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

function Convert_Data_Port_Ingl($txt_data_nasc_clie){
    $conv1 = explode("/",$txt_data_nasc_clie);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

function Convert_Data_Ingl_Port($entradata){
    $conv1 = explode("-",$entradata);
    $conv2 = array_reverse($conv1);
    $saidata = implode("/",$conv2);
    return $saidata;
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
