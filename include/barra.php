<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if (empty($_SESSION["sessao_login"])) {
header("Location:".$pontos."negado.php");
}

?>