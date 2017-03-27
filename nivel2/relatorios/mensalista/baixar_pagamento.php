<?php
session_start();

include("../../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];


if ($nivel ==1){
echo '<script>
alert("                          Atenção!\n\nVocê não tem permissão para visualizar esta página.\n\n")
window.location = "../../index_menu.php"
</script>';
}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

$data_atual = Convert_Data_Port_Ingl($data_atual2);
$txt_cod_pet = $_GET['cod_pet'];

$txt_especie = $_POST['txt_especie'];


if (!empty($txt_cod_pet)){
/*
    $sql = mysqli_query($connection, "SELECT * FROM tab_mensalista WHERE cod_pet='$txt_cod_pet'");
		if($linha = mysqli_fetch_array($sql){
		
			$sql = mysqli_query($connection, "UPDATE tab_mensalista set status=1, user_pag='$usuario', data_pag='$data_atual' WHERE cod_pet='$txt_cod_pet'");
		
		
			$sql2 = mysqli_query($connection, "INSERT INTO `tab_caixa` (`codigo`, `cod_produto`, `produto`, `pet`, `qtde`, `medida`,`valor`, `especie`, `obs`, 
			`usuario`, `data`) VALUES (NULL, '$txt_cod_prod', '$txt_produto', '$txt_pet', '$txt_qtde', '$sel_medida', '$txt_valor', '$txt_especie', '$txt_obs_caixa',
			'$usuario','$data_atual')") or die (mysqli_error($connection));


}
*/		
		






}// fecha if (!empty($txt_cod_pet)







	 	
?>
<html>
<head>
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="<?=$pontos;?>js/outros.js"></script>
</head></html>