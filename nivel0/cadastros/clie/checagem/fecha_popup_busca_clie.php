<?php
session_start();
$sel_tipo_pesq = $_POST["sel_tipo_pesq"];
$txt_descricao_pesq = $_POST["txt_descricao_pesq"];

$_SESSION["tipo_pesq"] = $sel_tipo_pesq;
$_SESSION["descricao_pesq"] = $txt_descricao_pesq;
?>
<script>
window.opener.location = "../index_resultado_busca_clie.php";
window.opener.focus();
self.close();
</script>