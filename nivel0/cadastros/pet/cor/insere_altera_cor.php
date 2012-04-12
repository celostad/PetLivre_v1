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
 **                      Data de criação:  Dez 2007                          **
 **										                                     **
 ******************************************************************************
*/

$txt_cor = $_POST["txt_cor"];
$txt_rad_sel = $_SESSION["rad_sel"];

$sql_consulta = mysql_query("SELECT * FROM combo_cor WHERE cor like '$txt_cor'") or die (mysql_error());

if ($linha = mysql_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEssa Cor já existe.\n\n")
window.location = "cad_cor.php";
</script>
<? }else{

$sql4 = mysql_query("UPDATE combo_cor SET cor= '$txt_cor' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_cor.php"); 
}
   

?>