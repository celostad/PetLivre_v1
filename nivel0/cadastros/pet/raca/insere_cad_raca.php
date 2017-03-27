<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();

require_once("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

$txt_raca = $_POST["txt_raca"];
$txt_raca_alta = strtoupper($txt_raca);

$h = getdate(); //variavel recebe a data
$data_atual = $ano = $h['year']."/".$mes = $h['mon']."/".$hoje = $h['mday'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

$sql_consulta = mysqli_query($connection, "SELECT * FROM combo_raca WHERE raca like '$txt_raca' or raca like '$txt_raca_alta'") or die (mysqli_error($connection));

if ($linha = mysqli_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEsta raça já está cadastrada.\n\n")
window.location = "cad_raca.php";
</script>
<?php }else{

$sql2 = mysqli_query($connection, "INSERT INTO `combo_raca` (`codigo`, `raca`) VALUES (NULL, '$txt_raca')") or die (mysqli_error($connection));

	header("Location: cad_raca.php");    
}
//  -------------------------------------------------------------------------------------------
?>