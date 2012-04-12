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

$txt_produto = $_POST["txt_produto"];
$sel_categoria = $_POST["sel_categoria"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql4 = mysql_query("UPDATE tab_produto SET produto= '$txt_produto', categoria= '$sel_categoria'  WHERE codigo = '$txt_rad_sel'");


header("Location: cad_produto.php");    

?>