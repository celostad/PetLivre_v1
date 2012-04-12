<?php

$host  = "mysql.maypet.com.br"; //endereço do seu servidor MySQL
$database = "maypet02"; //preencha com o nome do BD que contem a tabela que criamos
$login_db = "maypet02"; //login usado para acessar seu BD
$senha_db = "12340980"; //senha usada para acessar seu BD

// não altere mais nada abixo desta linha

$connection = mysql_connect("$host","$login_db","$senha_db") 
    or die ("Não foi possivel conectar ao servidor.");
    
$db = mysql_select_db("$database", $connection)
    or die("Não foi possivel selecionar o banco de dados.");
?>