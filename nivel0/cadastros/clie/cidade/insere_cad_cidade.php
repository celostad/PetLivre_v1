<?php
session_start();

require_once("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

$txt_cidade = $_POST["txt_cidade"];
$txt_cidade_alta = strtoupper($txt_cidade);

$h = getdate(); //variavel recebe a data
$data_atual = $ano = $h['year']."/".$mes = $h['mon']."/".$hoje = $h['mday'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

$sql_consulta = mysqli_query($connection, "SELECT * FROM combo_cidade WHERE cidade like '$txt_cidade' or cidade like '$txt_cidade_alta'") or die (mysqli_error($connection));

if ($linha = mysqli_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\ncidade já está cadastrada.\n\n")
window.location = "cad_clie_cidade.php";
</script>
<?php }else{

$sql2 = mysqli_query($connection, "INSERT INTO `combo_cidade` (`codigo`, `cidade`) VALUES (NULL, '$txt_cidade')") or die (mysqli_error($connection));

header("Location: cad_clie_cidade.php");    

}
//  -------------------------------------------------------------------------------------------
?>