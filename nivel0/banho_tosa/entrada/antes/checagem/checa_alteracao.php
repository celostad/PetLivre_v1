<?
// 1º PEGA O DADOS_CHECK ANTERIOR
$sql_dados_check = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha_dados_check = mysql_fetch_array($sql_dados_check)){
$dados_check_clie = $linha_dados_check['dados_check'];}



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


// ---------------------------------------------------

if ($txt_data_nasc_clie ==""){$txt_data_nasc_clie = "00/00/0000";}


$h = getdate(); //variavel recebe a data
$ha=date("H");
$date =date("$ha:i");
$data_atual2 = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
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


// ROTINA CHECA SE HOUVE ALTERAÇÃO



$sql_check = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$rad_sel_visl'") or die("erro ao selecionar sql_check");

if ($linha_check = mysql_fetch_array($sql_check)) {

$txt_nome_clie1 = $linha_check['nome'];
$sel_sexo1 = $linha_check['sexo'];
$txt_end_clie1 = $linha_check['endereco'];
$txt_cep_clie1 = $linha_check['cep'];
$txt_bairro_clie1 = $linha_check['bairro'];
$txt_cidade_clie1 = $linha_check['cidade'];
$txt_uf1 = $linha_check['uf'];
$txt_ddd_tel_clie1 = $linha_check['ddd_tel'];
$txt_tel_clie1 = $linha_check['tel'];
$txt_ddd_cel_clie1 = $linha_check['ddd_cel'];
$txt_cel_clie1 = $linha_check['cel'];
$txt_rg_clie1 = $linha_check['rg'];
$txt_obs_clie1 = $linha_check['obs'];
$txt_data_nasc_clie1 = Convert_Data_Ingl_Port($linha_check['data_nasc']);
}

if ($txt_data_nasc_clie1 ==""){$txt_data_nasc_clie1 = "00/00/0000";}



if ($txt_nome_clie <> $txt_nome_clie1){$dados_check_clie=1;}
if ($sel_sexo <> $sel_sexo1){$dados_check_clie=1;}
if ($txt_end_clie <> $txt_end_clie1){$dados_check_clie=1;}
if ($txt_cep_clie <> $txt_cep_clie1){$dados_check_clie=1;}
if ($txt_bairro_clie <> $txt_bairro_clie1){$dados_check_clie=1;}
if ($txt_cidade_clie <> $txt_cidade_clie1){$dados_check_clie=1;}
if ($txt_uf <> $txt_uf1){$dados_check_clie=1;}
if ($txt_ddd_tel_clie <> $txt_ddd_tel_clie1){$dados_check_clie=1;}
if ($txt_tel_clie <> $txt_tel_clie1){$dados_check_clie=1;}
if ($txt_ddd_cel_clie <> $txt_ddd_cel_clie1){$dados_check_clie=1;}
if ($txt_cel_clie <> $txt_cel_clie1){$dados_check_clie=1;}
if ($txt_rg_clie <> $txt_rg_clie1){$dados_check_clie=1;}
if ($txt_obs_clie <> $txt_obs_clie1){$dados_check_clie=1;}
if ($txt_data_nasc_clie<>$txt_data_nasc_clie1){$dados_check_clie=1;}



//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc_clie = Convert_Data_Port_Ingl($txt_data_nasc_clie);

$data_atual = Convert_Data_Port_Ingl($data_atual2);


$sql = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', data_nasc ='$txt_data_nasc_clie', obs ='$txt_obs_clie', dados_check ='$dados_check_clie', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------

}else{

//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_clie` (`codigo`, `nome`, `sexo`,`endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `data_nasc`,`obs`, `dados_check`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie', '$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_data_nasc_clie', '$txt_obs_clie', '$dados_check_clie', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}


/*
echo $txt_nome_clie1;
echo "<br>".$sel_sexo1;
echo "<br>".$txt_end_clie1;
echo "<br>".$txt_cep_clie1;
echo "<br>".$txt_bairro_clie1;
echo "<br>".$txt_cidade_clie1;
echo "<br>".$txt_uf1;
echo "<br>".$txt_ddd_tel_clie1;
echo "<br>".$txt_tel_clie1;
echo "<br>".$txt_ddd_cel_clie1;
echo "<br>".$txt_cel_clie1;
echo "<br>".$txt_rg_clie1;
echo "<br>".$txt_obs_clie1;
echo "<br>".$dados_check_clie;
*/
?>
