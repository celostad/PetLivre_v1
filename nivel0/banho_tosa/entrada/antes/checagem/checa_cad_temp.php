<?
include("func_data.php");

// ---------------------------------------------------

if ($txt_data_nasc_clie ==""){$txt_data_nasc_clie = "00/00/0000";}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc_clie = Convert_Data_Port_Ingl($txt_data_nasc_clie);

$data_atual = Convert_Data_Port_Ingl($data_atual2);



// ROTINA CHECA SE HOUVE ALTERAÇÃO

$sql_check = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar sql_check");

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

$txt_data_nasc_clie = Convert_Data_Ingl_Port($txt_data_nasc_clie);

if ($txt_data_nasc_clie ==""){$txt_data_nasc_clie = "00/00/0000";}
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


$sql_dados_check_clie = mysql_query("UPDATE `tab_temp_clie` SET dados_check  ='$dados_check_clie' WHERE user_cadastro='$usuario'") or die (mysql_error());

}



//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc_clie = Convert_Data_Port_Ingl($txt_data_nasc_clie);

$data_atual = Convert_Data_Port_Ingl($data_atual2);



//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', data_nasc ='$txt_data_nasc_clie', obs ='$txt_obs_clie', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
@mysql_close($sql1, $sql_check,$sql_dados_check_clie);

?>