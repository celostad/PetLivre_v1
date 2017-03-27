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

$txt_rad_sel = $_POST["rad_sel"];



$sql = "DELETE FROM `combo_cidade` WHERE `codigo` = '$txt_rad_sel'";
$resultado = mysqli_query($connection,$sql) or die ("Problema na Consulta");



header("Location: cad_cidade.php");    


?>