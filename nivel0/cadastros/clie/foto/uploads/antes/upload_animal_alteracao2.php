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

$txt_nome_animal = $_POST["txt_nome_animal"];
$txt_raca = $_POST["txt_raca"];
$sel_sexo = $_POST["sel_sexo"];
$txt_cor = $_POST["txt_cor"];
$sel_porte = $_POST["sel_porte"];
$sel_especie = $_POST["sel_especie"];
$txt_idade = $_POST["txt_idade"];
$sel_tipo_idade = $_POST["sel_tipo_idade"];
$sel_mensal = $_POST["sel_mensal"];
$txt_dono = $_POST["txt_dono"];
$txt_obs = $_POST["txt_obs"];


$sql_dono = mysql_query("SELECT * FROM `tab_clie` WHERE nome='$txt_dono'") or die("Erro ao selecionar   -   PEGA O CÓDIGO DO DONO");

if ($linha_cod_dono = mysql_fetch_array($sql_dono)){
$txt_cod_dono = $linha_cod_dono['codigo'];
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



$sql = mysql_query("SELECT * FROM `tab_temp_animal` WHERE user_cadastro='$usuario'") or die("Erro ao selecionar   -   Selecionar User_cadastro inicial  SQL");

if ($linha = mysql_fetch_array($sql)){
$user_cadastro = $linha['user_cadastro'];
}

if ($user_cadastro ==""){

//  *******************  INSERE AS VARIÁVEIS NO BD TEMP *****************************************

$sql2 = mysql_query("INSERT INTO `tab_temp_animal` (`codigo`, `nome`, `sexo`, `cor`, `dono`, `cod_dono`, `idade`, `tipo_idade`, `especie`, `raca`, `porte`, `mensalista`, `obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_animal', '$sel_sexo',
'$txt_cor', '$txt_dono', '$txt_cod_dono', '$txt_idade', '$sel_tipo_idade', '$sel_especie', '$txt_raca', '$sel_porte', '$sel_mensal', '$txt_obs', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}else{

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_animal` SET nome='$txt_nome_animal', sexo='$sel_sexo', cor='$txt_cor', dono='$txt_dono', cod_dono='$txt_cod_dono', idade='$txt_idade', tipo_idade='$sel_tipo_idade', especie='$sel_especie', raca='$txt_raca', porte='$sel_porte', mensalista='$sel_mensal', obs='$txt_obs', data_cadastro='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}



//  PARTE DA FOTO  




// *********************    INCLUI A NOVA FOTO NO BD DO ANIMAL TEMP   ***************


$dir="uploads/";//caminho para onde vai as imagens 

$ball=$_FILES['ball']['name'];
$num = time();
$data_foto = $hoje = $h['mday']."_".$mes = $h['mon']."_".$ano = $h['year'];


//recebendo a imagem

$caminho1=$dir.$num."_".$data_foto."_".$ball;

//caminho com nome da imagem e local para guardar

if(move_uploaded_file($_FILES['ball']['tmp_name'],$caminho1))
{
list($largura,$altura,$tipo)=getimagesize($caminho1);
$imagem = $caminho1;
}

$caminho=$caminho1;


if(move_uploaded_file($tmpname,$caminho)){

}
//primeiro if fechado

$sql = mysql_query("SELECT * FROM `tab_temp_animal` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1 - TELA UPLOAD");

if ($linha = mysql_fetch_array($sql)){

$sql1 = mysql_query("UPDATE `tab_temp_animal` SET caminho_foto ='$caminho' WHERE user_cadastro='$usuario'") or die (mysql_error());

}else{

$sql1 = mysql_query("INSERT INTO `tab_temp_animal` (`caminho_foto`, `user_cadastro`)VALUES('$caminho', '$usuario')") or die (mysql_error());

}

header ("location: ../animal/cad_animal_ver_alterar_refresh.php");

?>
