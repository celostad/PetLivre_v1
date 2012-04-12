<?
session_start();

include("conexao.php");
include("include/func_data.php");

$login = $_POST['login'];
$senha_postada = $_POST['senha'];


$sql = mysql_query("SELECT * FROM acesso WHERE login='$login' AND senha=md5('$senha_postada')") or die("erro ao selecionar");

if( $linha = mysql_fetch_array($sql)) {
 
  $cod = $linha['codigo'];
  $nome = $linha['nome'];
  $login = $linha['login'];
  $senha = $linha['senha'];
  $nivel = $linha['nivel'];
  $url_db = $linha['pag_inicial'];

  $_SESSION["sessao_login"] = $login;
  $_SESSION["sessao_cod"] = $cod;
  $_SESSION["sessao_nivel"] = $nivel;
  $_SESSION["envia_email"] = 0;


$h_H=date("H");
$h_H = $h_H+1;

if ($h_H == 25){$h_H = 01;}

$date1 =date("$h_H:i");



if(date("w") ==0){

// VERIFICA SE USUARIO TEM PERMISSÃO DE ACESSO AOS DOMINGOS
$sql_config_dias = mysql_query("SELECT login_dia_semana FROM tab_config_user WHERE id_user='$cod'") or die("erro ao selecionar: tab_config_user");

	if($linha_config_dias = mysql_fetch_array($sql_config_dias)){

	$login_dia_semana_db = $linha_config_dias['login_dia_semana'];
	}


if(empty($login_dia_semana_db)){

echo '<script>
alert ("                             Atenção !\n\nAcesso não autorizado!\n\nContate o administrador do sistema.\n\n") 
window.location = "negado.php";

</script>';

}// fecha if(!empty($login_dia_semana_db ...

}// fecha if(date("w") ==0)) ...

// ENVIA SMS QUANDO USUÁRIO SE LOGA NO SITE

// ---  ENVIA SMS  -------
/*
$ddd = 11;
$telefone = 89685158;
$operadora = 'clarotorpedo.com.br';
$celular = $ddd.$telefone.'@'.$operadora;

$assunto1 ="Usuario Logado\r\n";
$mensagem1 = "O usuario: $login, acabou de acessar o sistema as $date1\r\n";
$header1 = "From: petlivre@maypet.com.br\r\n";

mail($celular, $assunto1, $mensagem1, $header1);
// ------------------------------------------
*/
header("Location: $url_db");


}else {
 header("Location: negado.php");
} 


?>