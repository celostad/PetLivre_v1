<?php

$phpself = $_SERVER['PHP_SELF'];
//$url2 = explode("petlivre/", $phpself);
$url = explode("/", $phpself);
$link = sizeof($url);

//echo "link: ".$link."<br>";
switch ($link){

case 4:	$pontos = "../"; $pt_lk_pg=""; break;
case 5:	$pontos = "../../"; $pt_lk_pg="../"; break;
case 6:	$pontos = "../../../"; $pt_lk_pg="../../"; break;
case 7:	$pontos = "../../../../"; $pt_lk_pg="../../../"; break;


}

/*
//aqui cria um log de acesso.		
$arquivo = "./dataatualizada/log.txt";
$linha1 = "[".date("d/m/Y - H:i:s")."]  ";
$linha2 = $_SESSION['REMOTE_ADDR']."  ";
$linha3 = $_SERVER['PHP_SELF']."\n";
$texto  = $linha1.$linha2.$linha3;
$abrindo = fopen($arquivo, 'a+');
fwrite($abrindo, $texto);
fclose($abrindo);
*/	
?>
