<?php

if (empty($_SESSION["sessao_login"])) {
header("Location:".$pontos."negado.php");
}

?>