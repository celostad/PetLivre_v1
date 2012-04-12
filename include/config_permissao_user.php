<?php
session_start();

include($pontos."barra.php");
include($pontos."conexao.php");

$cod_user = $_SESSION["sessao_cod"];


// PERMISSÕES
$sql_permissao = mysql_query("SELECT * FROM tab_config_user WHERE id_user='$cod_user'") or die ("Erro na consulta: sql_permissao");

if ($linha_1 = mysql_fetch_array($sql_permissao)){

	$status_caixa_valor = $linha_1['caixa_valor'];
	$status_caixa_total = $linha_1['caixa_total'];	
}// end if ($linha_1 ...

?>
