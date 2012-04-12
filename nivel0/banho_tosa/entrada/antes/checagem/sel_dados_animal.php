<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

// SESSIONS
$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];


// VARIÁVEIS
$sel_nome_animal = $_POST["sel_nome_animal"];


$sql_sel_nome = mysql_query("SELECT * FROM `tab_animal` WHERE nome='$sel_nome_animal'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha_sel_nome = mysql_fetch_array($sql_sel_nome)){

$txt_id_animal = $linha_sel_nome['codigo'];
$txt_nome_animal = $linha_sel_nome['nome'];
$txt_raca = $linha_sel_nome['raca'];
$sel_sexo_animal = $linha_sel_nome['sexo'];
$txt_cor = $linha_sel_nome['cor'];
$sel_porte = $linha_sel_nome['porte'];
$sel_especie = $linha_sel_nome['especie'];
$txt_data_nasc_animal = $linha_sel_nome['data_nasc'];
$sel_mensal = $linha_sel_nome['mensalista'];
$txt_dono = $linha_sel_nome['dono'];
$txt_cod_dono = $linha_sel_nome['cod_dono'];
$txt_obs_animal = $linha_sel_nome['obs'];
$txt_caminho_foto_animal = $linha_sel_nome['caminho_foto'];
$txt_data_cadastro_animal = $linha_sel_nome['data_cadastro'];
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

$sql1 = mysql_query("UPDATE `tab_temp_banho` SET id_animal='$txt_id_animal', nome_animal='$txt_nome_animal', sexo_animal='$sel_sexo_animal', cor='$txt_cor', dono='$txt_dono', cod_dono='$txt_cod_dono', data_nasc_animal='$txt_data_nasc_animal', especie='$sel_especie', raca='$txt_raca', porte='$sel_porte', mensalista='$sel_mensal', obs_animal='$txt_obs_animal', caminho_foto_animal='$txt_caminho_foto_animal', data_cad_animal='$txt_data_cadastro_animal' WHERE user_cadastro='$usuario'") or die (mysql_error());
//  -------------------------------------------------------------------------------------------
}else{



//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_banho` (`codigo`, `id_animal`, `nome_animal`, `sexo_animal`, `cor`, `dono`, `cod_dono`, `data_nasc_animal`, `especie`, `raca`, `porte`, `mensalista`, `obs_animal`, `caminho_foto_animal`, `data_cad_animal`, `user_cadastro`) VALUES (NULL, '$txt_id_animal', '$txt_nome_animal', '$sel_sexo_animal', '$txt_cor', '$txt_dono', '$txt_cod_dono', '$txt_data_nasc_animal', '$sel_especie', '$txt_raca', '$sel_porte', '$sel_mensal', '$txt_obs_animal', '$txt_caminho_foto_animal', '$txt_data_cadastro_animal','$usuario')") or die (mysql_error());
//  -------------------------------------------------------------------------------------------
}

header("Location: ../cad_banho.php");

?>
