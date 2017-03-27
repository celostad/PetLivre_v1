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

$txt_raca = $_POST["txt_raca"];
$txt_rad_sel = $_SESSION["rad_sel"];

$sql_consulta = mysqli_query($connection, "SELECT * FROM combo_raca WHERE raca like '$txt_raca'") or die (mysqli_error($connection));

if ($linha = mysqli_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEssa Raça já existe.\n\n")
window.location = "cad_raca.php";
</script>
<?php }else{

$sql4 = mysqli_query($connection, "UPDATE combo_raca SET raca= '$txt_raca' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_raca.php");   
} 

?>