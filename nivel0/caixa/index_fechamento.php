<?php
include("../../include/arruma_link.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$data_atual = Convert_Data_Port_Ingl($data_atual2);

include("checagem/check_finaliza_caixa.php");

/*
if($caixa==1){

echo "
<script>
alert('      Não há movimento para ser fechado')
window.location = 'index_caixa.php'
</script>";
}else{
*/
echo '
<script>
if(confirm("Gostaria de fechar o movimento do caixa agora?\n\nClique em OK para confirmar.")){
window.location = "checagem/func_finaliza_caixa.php"
}else{
window.location = "index_caixa.php"
}
</script>';
//}
?>