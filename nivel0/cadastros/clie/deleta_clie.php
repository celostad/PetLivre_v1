<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include("checagem/func_data.php");

/*
 ******************************************************************************
 **                                                                          **
 **                                                                          **
 **          MARCELO DE SOUZA TADIM           -         WebMaster            **
 **                                                                          **
 **                                                                          **
 **                                                                          **
 **                      Data de criaчуo:  Dez 2007                          **
 **										                                     **
 ******************************************************************************
*/

$txt_rad_sel = $_GET["id"];

$sql = "DELETE FROM `tab_clie` WHERE `codigo` = '$txt_rad_sel'";
$resultado = mysql_query($sql) or die ("Problema na Consulta");

header("Location: index_cad_clie.php");    


?>