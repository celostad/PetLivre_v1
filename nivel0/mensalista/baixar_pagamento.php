<?php
session_start();

include("../../include/arruma_link.php");
require($pontos."barra.php");
include($pontos."conexao.php");
include($pontos."include/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];


if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

$data_atual = Convert_Data_Port_Ingl($data_atual2);

$txt_cod_pet = $_POST['txt_cod_pet'];
$txt_mensalista = $_POST['txt_mensalista'];
$txt_obs_mensal = $_POST['txt_obs_mensal'];
$txt_especie = $_POST['txt_especie'];
$mes_num = date("m"); 
if ($mes_num =1){
$mes_num =13;
}

$mes_num = $mes_num-1; 

// PEGA O CODIGO DO PRODUTO MENSALISTA
$sql_produto = mysqli_query($connection, "SELECT * FROM tab_produto WHERE codigo=6");
if($linha_produto = mysqli_fetch_array($sql_produto)){

$txt_cod_prod = $linha_produto['codigo'];
$txt_produto = $linha_produto['produto'];
}

// PEGA O VALOR DO MENSALISTA
	$sql_soma = mysqli_query($connection, "SELECT cod_pet, valor, SUM(valor) as total FROM tab_mensalista WHERE cod_pet='$txt_cod_pet' and  month(`data_banho`)= '$mes_num' and status=0 GROUP BY cod_pet") or die("erro: ".mysqli_error($connection));

	if($linha_soma = mysqli_fetch_array($sql_soma)){
		$txt_total = $linha_soma['total'];
	}
	
if (!empty($txt_cod_pet)){

    $sql = mysqli_query($connection, "SELECT * FROM tab_mensalista WHERE cod_pet='$txt_cod_pet'");
		if($linha = mysqli_fetch_array($sql)){
		
			$sql1 = mysqli_query($connection, "UPDATE tab_mensalista set status=1, user_pag='$usuario', data_pag='$data_atual' WHERE cod_pet='$txt_cod_pet' && month(`data_banho`)= '$mes_num'");
		
		
			$sql2 = mysqli_query($connection, "INSERT INTO `tab_caixa` (`codigo`, `cod_produto`, `produto`, `pet`, `qtde`, `medida`,`valor`, `especie`, `obs`, 
			`usuario`, `data`) VALUES (NULL, '$txt_cod_prod', '$txt_produto', '$txt_mensalista', 1, 'Unidade', '$txt_total', '$txt_especie', '$txt_obs_mensal',
			'$usuario','$data_atual')") or die (mysqli_error($connection));


		}
		

}// fecha if (!empty($txt_cod_pet)







	 	
?>
<script>
window.opener.location = "index_pag_mensalista.php";
window.opener.reload();
self.close();
//window.opener.focus();
</script>