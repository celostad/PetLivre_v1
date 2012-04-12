<?php

include($pontos."include/conexao.php");
include($pontos."include/barra.php");
require($pontos."include/configure.php");
include($pontos."include/func_data.php");
include($pontos."include/configure.php");





$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

?>