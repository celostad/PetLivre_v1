<?php

// Faz o Select pegando o DIA e STATUS

$sql1 = mysqli_query($connection, "SELECT status, data  FROM tab_caixa WHERE status =0 and data <>'$data_atual'");

	if ($linha1 = mysqli_fetch_array($sql1)) {
	
		$caixa =0;
	
	}else{
	
		$caixa =1;
	}

?>