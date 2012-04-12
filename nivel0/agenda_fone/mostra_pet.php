<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$id = $_GET["id"];



// PEGA O NOME DO CLIENTE
$sql_ref1 = mysql_query("SELECT * FROM `tab_clie` WHERE codigo='$id'") or die("erro ao selecionar sql_ref1");
$tr = mysql_num_rows($sql_ref1);

if ($tr <2){
echo'<script>
window.opener.location = "../pet/cad_pet.php?id='.$id.'";
window.opener.focus();
self.close();
</script>';}

/*
header("Location: ../pet/cad_pet.php?id=$id");echo '<script>self.close();</script>
*/
if ($linha_ref1 = mysql_fetch_array($sql_ref1)) {

$txt_codigo_clie = $linha_ref1['codigo'];
$txt_nome_clie = $linha_ref1['nome'];
}else{
 echo "Erro: Não existe Nome do Cliente (Mostra Animal.php)";
} 


?>
<html>
<head>
<script type="text/javascript" src="<?=$pontos;?>js/outros.js"></script>
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Clientes)</title>
<body bgcolor="#FFFFFF">
<form name="frmAjax" method="POST">
  <table width="340" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="340" border="0" bordercolor="#cccccc" height="95" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="340" height="20"><div align="left"><span class="style19"><strong>Cliente:</strong></span>&nbsp;<font color="#5F8FBF"><strong><? echo $txt_nome_clie; ?></strong></font>&nbsp;&nbsp;(C&oacute;digo&nbsp;<? echo $txt_codigo_clie; ?>)</span></div></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td height="15" bgcolor="#66CC66"><div align="center" class="style3"><strong>Selecione o Pet </strong></div></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td height="20" nowrap background="../../../imagens/fundo_formulario_popup.jpg"><table width="340" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="80" height="24" class="cabec_style11"><table width="340" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="style19">
                      <tr class="cabec_style11" bgcolor="#FFFFFF">
                        <td width="55" align="center" bgcolor="#66FF66"><div align="center" class="style8"><em><strong>C&oacute;digo</strong></em></div></td>
                        <td width="101" align="center" bgcolor="#66FF66"><div align="center" class="style8"><em><strong>Nome do Pet </strong></em></div></td>
                        <td width="146" align="center" bgcolor="#66FF66"><div align="center" class="style8"><em><strong>Ra&ccedil;a</strong></em></div></td>
                        <td width="18" align="center" bgcolor="#66FF66"><div align="center"></div></td>
                      </tr>
<?		  
    
// PEGA OS DADOS DO ANIMAL

$sql_registros = mysql_query("SELECT * FROM tab_pet WHERE cod_dono='$id' ORDER BY nome");

$cor="#FFFFFF";

while($linha_ref = mysql_fetch_array($sql_registros)) {

$cod = $linha_ref['codigo'];
$txt_nome = $linha_ref['nome'];
$txt_raca = $linha_ref['raca'];

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 

?>
        <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onMouseOver="this.style.backgroundColor='#5F8FBF'" onMouseOut="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
                        <td><div align="center" class="style19"><? echo $cod; ?> </div></td>
                        <td width="101" height="8"><div align="center" class="style19"><? echo $txt_nome; ?> </div></td>
                        <td width="146"><div align="center" class="style19"><? echo $txt_raca; ?></div></td>
                        <td width="18"><div align="center">
                            <? echo '<a href="cad_clie.php?id='.$cod.'"><img src="'.$pontos.'imagens/atualizar.jpg" border="0" alt="Ver ou Alterar registro" title="Ver ou Alterar"></a>';?>
                        </div></td>
                      </tr>
                      <?
}
@mysql_close();
?>
                      
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="15" align="center" valign="bottom">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>