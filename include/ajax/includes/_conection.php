<?php include('_GLOBALS.php'); ?>
<?
//Seta variaveis de conexao com banco
$host		= "localhost";
$database	= "maypet_petlivre";
$user		= "maypet_marcelo";
$pwd		= "12340980";

//Cria conexao com o banco MySQL
$conexao = mysql_connect($host, $user, $pwd) or die ("Não foi possível estabelecer conexão com o Banco de Dados");
mysql_select_db($database,$conexao);
?>