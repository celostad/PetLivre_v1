<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

$checa_retorno = $_SESSION["checa_retorno"];

$_SESSION["checa_retorno"]=10;


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

function Convert_Data_Ingl_Port($entradata){
    $conv1 = explode("-",$entradata);
    $conv2 = array_reverse($conv1);
    $saidata = implode("/",$conv2);
    return $saidata;
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

$sql2 = mysql_query("INSERT INTO `tab_temp_clie` (`codigo`, `nome`, `sexo`,`endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `data_nasc`,`obs`, `user_cadastro`, `data_cadastro`) VALUES (NULL, '$txt_nome_clie', '$sel_sexo', '$txt_end_clie',
'$txt_cep_clie', '$txt_bairro_clie', '$txt_cidade_clie', '$txt_uf', '$txt_ddd_tel_clie', '$txt_tel_clie', '$txt_ddd_cel_clie', '$txt_cel_clie', '$txt_rg_clie', '$txt_data_nasc_clie', '$txt_obs_clie', '$usuario','$data_atual')") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}else{

//  *******************  ATUALIZA AS VARIÁVEIS NO BD TEMP *****************************************

$sql1 = mysql_query("UPDATE `tab_temp_clie` SET nome='$txt_nome_clie', sexo='$sel_sexo', endereco='$txt_end_clie', cep='$txt_cep_clie', bairro='$txt_bairro_clie', cidade ='$txt_cidade_clie', uf='$txt_uf', ddd_tel ='$txt_ddd_tel_clie', tel ='$txt_tel_clie',
ddd_cel = '$txt_ddd_cel_clie', cel= '$txt_cel_clie', rg = '$txt_rg_clie', data_nasc ='$txt_data_nasc_clie', obs ='$txt_obs_clie', data_cadastro  ='$data_atual' WHERE user_cadastro='$usuario'") or die (mysql_error());

//  -------------------------------------------------------------------------------------------
}


// PEGA O CAMINHO DA FOTO


$sql_ref = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysql_fetch_array($sql_ref)) {

$txt_caminho_foto1 = $linha_ref['caminho_foto'];
$txt_caminho_foto ="../foto_webcam/".$txt_caminho_foto1;
}

// FIM CAMINHO FOTO

// ACERTA DATA NASCIMENTO 

$txt_data_nasc_clie = Convert_Data_Ingl_Port($txt_data_nasc_clie);


if ($txt_data_nasc_clie =="00/00/0000"){$txt_data_nasc_clie="";}
if ($sel_sexo=="feminino"){$sel_sexo_descr="Feminino";}
if ($sel_sexo=="masculino"){$sel_sexo_descr="Masculino";}
?>
<html>
<head>
<script type="text/javascript" src="../../../js/outros.js"></script>
<script type="text/javascript" src="../../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../../js/functions.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

<!--
if (screen.width == 640) {window.moveTo(0,0); window.resizeTo(screen.availWidth,screen.availHeight);}
if (screen.width == 800) {window.moveTo(0,0); window.resizeTo(screen.availWidth,screen.availHeight);}
if (screen.width == 1024) {window.moveTo(0,0); window.resizeTo(screen.availWidth,screen.availHeight);}

// top.resizeTo(1024,768);}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Clientes)</title>
<BODY bgcolor="#FFFFFF">
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="733" border="0" bordercolor="#cccccc" height="90" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="15"><div align="center">
          <script language="JavaScript" src="../../../js/menu1.js"></script>
          <? if ($nivel ==1){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_usuario.js\"></script>";} ?>
          <? if ($nivel ==2){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_supervisor.js\"></script>";} ?>
          <? if ($nivel ==3){echo "<script language=\"JavaScript\" src=\"../../../js/menu_cad_clie/menu_gerente.js\"></script>";} ?>
          <script language="JavaScript" src="../../../js/menu3.js"></script>
      </div></td>
    </tr>
    <tr>
      <td height="19"><div align="center"></div></td>
    </tr>
    <tr>
      <td height="20"><div align="center"><img src="../../../imagens/titulos/titulo_cad_clie.jpg" width="735" height="25"></div></td>
    </tr>
    <tr>
      <td height="19"></td>
    </tr>
    <tr>
      <td height="90"><? include("../../../foto_webcam/uploads/clie/templates/template_cad_clie.php"); ?></td>
    </tr>
    
    <tr>
      <td height="20" align="center" valign="bottom"><div align="center"><font size="1" color="#999999">Usu&aacute;rio Logado:</font><font size="1"><font color="#000000"> <? echo $usuario; ?> </font><font color="#999999">|</font><font color="#000000"> </font><font color="#FFFFFF"><font color="#999999">IP 
        da M&aacute;quina:</font></font><font color="#666666"><font color="#000000"> <? echo $ip = getenv("REMOTE_ADDR")?> <font color="#999999">|</font><font color="#FFFFFF">&nbsp;</font><font color="#999999">Data:</font> </font></font><font color="#FFFFFF"> <font color="#999999"> <font color="#000000">
                <? $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
                </font>|</font>&nbsp;</font><font color="#999999">Hor&aacute;rio:</font><font color="#666666"><font color="#000000">
                <? $ha=date("H");
               echo $date =date("$ha:i"); ?>
            </font></font></font></div></td>
    </tr>
  </table>
</form>
</body>
</html>