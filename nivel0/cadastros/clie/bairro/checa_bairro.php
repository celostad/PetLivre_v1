<?php
session_start();

require_once("../../../../conexao.php");

$txt_rad_sel = $_POST["rad_sel"];
$_SESSION["rad_sel"] = $txt_rad_sel;


if ($txt_rad_sel ==""){header("Location: nao_selecionado.php");
}else{
header("Location: alterar_bairro.php");
}

//  -------------------------------------------------------------------------------------------
?>