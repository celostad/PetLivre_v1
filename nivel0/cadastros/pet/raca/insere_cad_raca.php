<?
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

$sql_consulta = mysql_query("SELECT * FROM combo_raca WHERE raca like '$txt_raca' or raca like '$txt_raca_alta'") or die (mysql_error());

if ($linha = mysql_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEsta raça já está cadastrada.\n\n")
window.location = "cad_raca.php";
</script>
<? }else{

$sql2 = mysql_query("INSERT INTO `combo_raca` (`codigo`, `raca`) VALUES (NULL, '$txt_raca')") or die (mysql_error());

header("Location: cad_raca.php");    
}
//  -------------------------------------------------------------------------------------------
?>
