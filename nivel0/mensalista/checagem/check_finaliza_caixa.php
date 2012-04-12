<?php
include("func_data.php");

$data_atual = Convert_Data_Port_Ingl($entrada);


 // Faz o Select pegando o DIA e STATUS

    $sql1 = mysql_query("SELECT status, data  FROM tab_caixa WHERE status =0 and data <>'$data_atual'");
     
	if ($linha1 = mysql_fetch_array($sql1)) {

	$caixa =0;

	}else{
	
	$caixa =1;
	}

?>