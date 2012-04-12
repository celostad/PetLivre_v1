<?php

if (empty($_SESSION["sessao_login"])) {
header("Location: negado.php");
}

?>