<?
session_start();

require_once("../../../../conexao.php");
include("../../../../barra.php");

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

$txt_bairro = $_POST["txt_bairro"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql4 = mysql_query("UPDATE combo_bairro SET bairro= '$txt_bairro' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_clie_bairro.php");    

?>