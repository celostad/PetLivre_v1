<?php

$host  = "localhost"; //endere�o do seu servidor MySQL
$database = "petlivre"; //preencha com o nome do BD que contem a tabela que criamos
$login_db = "root"; //login usado para acessar seu BD
$senha_db = "12340980"; //senha usada para acessar seu BD

// n�o altere mais nada abaixo desta linha
    // 1. Create a database connection
$connection = mysqli_connect($host,$login_db,$senha_db);
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}

// 2. Select a database to use 
$db_select = mysqli_select_db($connection, $database);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

?>