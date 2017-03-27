<?php
include "sql.php";
$id = $_GET['id'];
$sql = mysqli_query($connection, "SELECT * FROM agenda WHERE id = '$id'");
$linha = mysqli_num_rows($sql);

$sql = mysqli_query($connection, "DELETE FROM agenda WHERE id = '$id'");


if($sql){
    header("location:listagenda.php");
}else{
    print "Não foi possivel deletar o redado. Tente mais tarde!";
}


?>