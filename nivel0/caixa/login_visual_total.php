<?php
session_start();

include("../../include/arruma_link.php");
include($pontos."conexao.php");

$nivel = $_SESSION["sessao_nivel"];
$valor_postado = $_GET['valor'];
//print_r($valor_postado);die();
//print_r($_POST);

if (!empty($_GET['ENVIAR_ADM'])){

$login_postado = $_POST['login'];
$senha_postada = $_POST['senha'];

$sql = mysqli_query($connection, "SELECT * FROM acesso WHERE login='$login_postado' AND senha=md5('$senha_postada')") or die("erro ao selecionar");

if( $linha = mysqli_fetch_array($sql)) {
 
  $nivel_bd = $linha['nivel'];
}


if ($nivel_bd >1){

// MOSTRA O VALOR TOTAL
   echo "Total: ". number_format($valor_postado, 2, ',','.');
   
}else{

   header("Location: ".$pontos."negado.php");
}

 
} // if (!empty(...





if ($nivel <2){

}




















?>
