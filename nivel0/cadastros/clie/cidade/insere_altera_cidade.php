<?php
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

$txt_cidade = $_POST["txt_cidade"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql4 = mysqli_query($connection, "UPDATE combo_cidade SET cidade= '$txt_cidade' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_clie_cidade.php");    

?>