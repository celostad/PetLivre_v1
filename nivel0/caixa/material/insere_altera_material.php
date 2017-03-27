<?php
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

$txt_material = $_POST["txt_material"];
$sel_categoria = $_POST["sel_categoria"];
$txt_rad_sel = $_SESSION["rad_sel"];


$sql4 = mysqli_query($connection, "UPDATE tab_material SET material= '$txt_material', categoria= '$sel_categoria'  WHERE codigo = '$txt_rad_sel'");


header("Location: cad_material.php");    

?>