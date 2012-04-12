<?php

$host  = "localhost"; //endere�o do seu servidor MySQL
$database = "bd"; //preencha com o nome do BD que contem a tabela que criamos
$login_db = "root"; //login usado para acessar seu BD
$senha_db = ""; //senha usada para acessar seu BD

// n�o altere mais nada abixo desta linha

$connection = mysql_connect("$host","$login_db","$senha_db") 
    or die ("N�o foi possivel conectar ao servidor.");
    
$db = mysql_select_db("$database", $connection)
    or die("N�o foi possivel selecionar o banco de dados.");
?>