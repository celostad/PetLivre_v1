<?php
include "sql.php";
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM agenda WHERE id = '$id'");
$linha = mysql_num_rows($sql);

$sql = mysql_query("DELETE FROM agenda WHERE id = '$id'");


if($sql){
    header("location:listagenda.php");
}else{
    print "Não foi possivel deletar o redado. Tente mais tarde!";
}


?>