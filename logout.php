<?
session_start(); 

unset($_SESSION["sessao_login"]);
unset($_SESSION["sessao_cod"]);
unset($_SESSION["sessao_nivel"]);
unset($_SESSION["rad_sel_visl"]);
unset($_SESSION["nivel"]);


// logout motonet

/*
session_start(); 

include("conexao.php");

$login = $_SESSION["sessao_login"];
$cod_user = $_SESSION["sessao_cod_user"];


//  PEGA A DATA E CONVERTE NO TIPO INGLÊS

$h = getdate(); //variavel recebe a data
$entrada = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];

function Convert_Data_Port_Ingl($data_atual){
    $conv1 = explode("/",$data_atual);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$data_atual = Convert_Data_Port_Ingl($entrada);

//    TERMINA A PARTE DA DATA


$sql_acessos = mysql_query("UPDATE `acesso` SET acesso_atual='$data_atual' WHERE codigo='$cod_user'") or die (mysql_error()); 


//---------------------  APAGA DADOS TEMPORARIOS  ----------------------------------------


// PRIMEIRO APAGA DADOS TEMPORARIOS ANTERIOR NO BD TEMP LOGIN

$sql_sessao_om = mysql_query("SELECT * FROM `bd_temp_login` WHERE temp_login ='$login'") or die("erro ao selecionar: BD_OM_LOGIN");

if ($linha_sessao_om = mysql_fetch_array($sql_sessao_om)){

$sql_sessao_om3 = "DELETE FROM `bd_temp_login` WHERE temp_login ='$login'";
$resultado_sessao_om3 = mysql_query($sql_sessao_om3) or die ("Problema no Delete SESSÃO: bd_temp_login");
}


$sql_bd_temp_acesso = mysql_query("SELECT * FROM `bd_temp_acesso` WHERE user_cadastrou='$login'") or die("erro ao selecionar: BD_TEMP_ACESSO");

if ($linha_bd_temp_acesso = mysql_fetch_array($sql_bd_temp_acesso)){

$sql_bd_temp_acesso1 = "DELETE FROM `bd_temp_acesso` WHERE user_cadastrou='$login'";
$resultado_bd_temp_acesso = mysql_query($sql_bd_temp_acesso1) or die ("Problema no Delete SESSÃO: BD_TEMP_ACESSO2");
}


$sql_bd_vtr_temp = mysql_query("SELECT * FROM `bd_viatura_temp` WHERE usuario='$login'") or die("erro ao selecionar: BD_VIATURA_TEMP");

if ($linha_bd_vtr_temp = mysql_fetch_array($sql_bd_vtr_temp)){

$sql_bd_vtr_temp1 = "DELETE FROM `bd_viatura_temp` WHERE usuario='$login'";
$resultado_bd_viatura_temp = mysql_query($sql_bd_vtr_temp1) or die ("Problema no Delete SESSÃO: BD_VIATURA_TEMP2");
}
else

unset($_SESSION["sessao_login"]);
unset($_SESSION["sessao_om"]);
unset($_SESSION["sessao_om_cadastro"]);
unset($_SESSION["sessao_cod_user"]);
unset($_SESSION["sessao_nivel"]);
unset($_SESSION["om_consulta"]);
unset($_SESSION["chk_volta"]);
unset($_SESSION["rad_sel"]);
*/

?>

<title>Logout !!</title>
<body bgcolor="#FFFFFF">
<p>&nbsp;</p>
<div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="5" color="#000000"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="5" color="#000000"><b></b></font><img src="imagens/titulo_pet_livre.jpg" width="205" height="101"></b></font><br>
  <br>
  <font color="#FF0000"><font size="4" color="#0000FF"><br>
  <font color="#FF0000">Logout realizado com Sucesso!</font></font><b><font size="4"><br>
  <br>
  <br>
</font></b> <font color="#0000FF"><a href="index.php">P&aacute;gina Inicial </a></font></font></div>
