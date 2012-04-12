<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

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

$txt_rad_sel = $_POST["rad_sel"];



$sql = "DELETE FROM `tab_material` WHERE `codigo` = '$txt_rad_sel'";
$resultado = mysql_query($sql) or die ("Problema na Consulta");



header("Location: cad_material.php");    


?>