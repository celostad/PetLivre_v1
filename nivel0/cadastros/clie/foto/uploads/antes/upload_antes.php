<?
session_start();

include("../../../conexao.php");

/*
 ******************************************************************************
 **                                                                          **
 **               MARCELO DE SOUZA TADIM                WebMaster            **
 **                                                                          **
 **                                                                          **
 **                                                                          **
 **                      Data de criação:  Dez 2007                          **
 **										                                     **
 ******************************************************************************
*/

$usuario = $_SESSION["sessao_login"];
$checa_retorno = $_SESSION["checa_retorno"];

// ----------------------------  SELECIONA O CADASTRO TEMP USUÁRIO  -----------------

//cad clie
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
$dados_check =1;

if ($txt_data_nasc_clie ==""){$txt_data_nasc_clie = "00/00/0000";}

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

//$entrada vc mudar por exemplo: Convert_Data_Port_Ingl($_POST[data])
$txt_data_nasc_clie = Convert_Data_Port_Ingl($txt_data_nasc_clie);
$data_atual = Convert_Data_Port_Ingl($data_atual2);




$sql = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){
$user_cadastro = $linha['user_cadastro'];
}

if ($user_cadastro ==""){

//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_clie` (`codigo`, `nome`, `sexo`,`endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `data_nasc`,`obs`, `dados_check`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie',
'$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_data_nasc_clie', '$txt_obs_clie', '$dados_check', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}else{

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', data_nasc ='$txt_data_nasc_clie', obs ='$txt_obs_clie', dados_check ='$dados_check', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}

//  PARTE DA FOTO  

// *********************    APAGA PRIMEIRO A FOTO ANTERIOR  ***************************


$sql_excl = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha_excl = mysql_fetch_array($sql_excl)){
$txt_caminho_foto = $linha_excl['caminho_foto'];
}

if ($txt_caminho_foto<>""){unlink("$txt_caminho_foto");}

// *********************    FINAL DA INSTRUÇÃO ************************************


$config = 262144; //tamanho máximo

// sem imagens

if (!isset($_FILES['balizador']['name']) || empty($_FILES['balizador']['name']))

{ $name = "sem_imagem.jpg"; }

else { //abre else

// verifica tamanho
if (filesize($_FILES['balizador']['tmp_name']) > $config )
{ $erro[] = "Erro[Enviar imagem]: O Tamanho máximo do arquivo de imagem deve ser de 256 Kb."; }
// verifica tipo
if (substr($_FILES['balizador']['type'],-3) !="jpg" && substr($_FILES['balizador']['type'],-3) !="JPG" && substr($_FILES['balizador']['type'],-4) !="jpeg" && substr($_FILES['balizador']['type'],-4) !="JPEG")
{ $erro[] = "Erro[Enviar imagem]: Só são permitidos arquivos de imagem do tipo JPG, JPEG."; }
// validando foto
if (ereg("[][><}{)(:;,!?*%&#@]", $_FILES['balizador']['name']))
{ $erro[] = "Erro[Enviar imagem]: O arquivo contém caracteres inválidos."; }

if(isset($erro))
{ echo "<ul>";
for($i=0;$i<count($erro);$i++) { echo "<li>".$erro[$i]."</li>"; }
echo("<a href=javascript:history.go(-1)><br><br>voltar</a>");
echo "</ul>";
mysql_close();
exit; }

else { $imagemenviada = "1";

//envia o arquivo modificando
$dir_path="uploads/";//Grava na foto 
$dir_mov="uploads/backup/";//caminho para onde vai as imagens 
$num = time();
$file=$_FILES['balizador']['name'];
$f =explode (".", $file);
$ext = end ($f);
$data_foto = $hoje = $h['mday']."_".$mes = $h['mon']."_".$ano = $h['year'];

$name=$dir_mov.$num."_".$data_foto.".".$ext;
$caminho = $dir_mov.$num."_".$data_foto.".".$ext;

$up=move_uploaded_file($_FILES['balizador']['tmp_name'], $name);

}

} //fecha else

/*
echo "<br>Arquivo: ".$file;
echo "<br>Pasta Dir: ".$dir;
echo "<br>Arquivo Completo: ".$name;
*/

$sql_1 = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1 - TELA UPLOAD");

if ($linha = mysql_fetch_array($sql_1)){

$sql_2 = mysql_query("UPDATE `tab_temp_clie` SET caminho_foto ='$caminho' WHERE user_cadastro='$usuario'") or die (mysql_error());

}else{

$sql_3 = mysql_query("INSERT INTO `tab_temp_clie` (`caminho_foto`, `user_cadastro`)VALUES('$caminho', '$usuario')") or die (mysql_error());

}

if ($checa_retorno==1){header ("location: ../clie/cad_clie.php");}
if ($checa_retorno==3){ header ("location: ../clie/cad_clie_ver_alterar_refresh.php");}
if ($checa_retorno==30){ header ("location: ../clie/cad_clie_ver_alterar_refresh.php");}



?>
