<?
session_start();

require_once("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

$txt_cor = $_POST["txt_cor"];
$txt_cor_alta = strtoupper($txt_cor);

$h = getdate(); //variavel recebe a data
$data_atual = $ano = $h['year']."/".$mes = $h['mon']."/".$hoje = $h['mday'];

function Convert_Data_Port_Ingl($entradata){
    $conv1 = explode("/",$entradata);
    $conv2 = array_reverse($conv1);
    $saida_data = implode("-",$conv2);
    return $saida_data;
}

$sql_consulta = mysql_query("SELECT * FROM combo_cor WHERE cor like '$txt_cor' or cor like '$txt_cor_alta'") or die (mysql_error());

if ($linha = mysql_fetch_array($sql_consulta)) { ?>
<script>
alert ("Atenção!\nEssa Cor já está cadastrada.\n\n")
window.location = "cad_cor.php";
</script>
<? }else{

$sql2 = mysql_query("INSERT INTO `combo_cor` (`codigo`, `cor`) VALUES (NULL, '$txt_cor')") or die (mysql_error());

header("Location: cad_cor.php");    
}
//  -------------------------------------------------------------------------------------------
?>
