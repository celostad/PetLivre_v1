<?
session_start();

include("../../../barra.php");
include("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$rad_animal_clie = $_POST["rad_animal_clie"];
$_SESSION["checa_rad_vazio2"]="";

if ($rad_animal_clie ==""){
$checa_vazio=1;
$_SESSION["checa_rad_vazio"] = $checa_vazio;
echo '<script>
alert ("            Atenção! \n\nNenhum campo foi selecionado.\n\n") 
window.location = "../clie/mostra_animal.php";
</script>';
}

$_SESSION["rad_animal_clie"] = $rad_animal_clie;


$sql_ref3 = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref3 = mysql_fetch_array($sql_ref3)){

$dados_check_clie = $linha_ref3['dados_check'];
}




if ($dados_check_clie ==0){
echo '<script>
window.opener.location = "cad_animal_ver_alterar.php";
window.opener.focus();
self.close();
</script>';
}else{
echo '<script>
if(confirm("                                     Atenção!\n\nExistem alterações no cadastro anterior que não foram gravados.\nClicando em \"Cancelar\" estes dados serão perdidos.\n\nGostaria de retornar a tela anterior e gravá-los agora?\n\nCaso positivo, clique em \"OK\".\n\n\n")){
window.opener.location = "../clie/cad_clie_ver_alterar_refresh.php";
window.opener.focus();
self.close();
}else{
window.opener.location = "cad_animal_ver_alterar.php";
window.opener.focus();
self.close();
}
</script>';
}

?>