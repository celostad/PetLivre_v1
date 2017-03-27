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
 **                      Data de criação:  Dez 2007                          **
 **										                                     **
 ******************************************************************************
*/

$txt_cor = $_POST["txt_cor"];
$txt_rad_sel = $_SESSION["rad_sel"];

$sql_consulta = mysqli_query($connection, "SELECT * FROM combo_cor WHERE cor like '$txt_cor'") or die (mysqli_error($connection));

if ($linha = mysqli_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEssa Cor já existe.\n\n")
window.location = "cad_cor.php";
</script>
<?php }else{

$sql4 = mysqli_query($connection, "UPDATE combo_cor SET cor= '$txt_cor' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_cor.php"); 
}
   

?>