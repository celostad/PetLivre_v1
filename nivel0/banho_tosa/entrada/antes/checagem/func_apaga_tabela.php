<?
session_start();

include("../../../../barra.php");
include("../../../../conexao.php");

$usuario = $_SESSION["sessao_login"];

// APAGA TABELA TEMPORÁRIA CLIENTE

$sql_3 = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha3 = mysql_fetch_array($sql_3)) {

$sql3 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado3 = mysql_query($sql3) or die ("Problema no Delete tab_temp_clie - SQL2");
}

?>
<script>
window.opener.location = "../cad_banho.php";
window.opener.focus();
self.close();
</script>