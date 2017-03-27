<?php
//==================================================================================================//
//                                                                                                  //
//     Criado por.......................: Flavio Theruo Kaminisse                                   //
//     Site.............................: http://www.japs.etc.br                                    //
//     Contato..........................: flavio@japs.etc.br                                        //
//     Data Criacao.....................: 17/02/2006                                                //
//                                                                                                  //
//==================================================================================================//

session_start();

include("../../include/arruma_link.php");
//include($pontos."conexao.php");
include("../../include/ajax/includes/_conection.php");
require($pontos."barra.php");
require("checagem/check_finaliza_caixa.php"); 




$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];
$checa_retorno = $_SESSION["checa_retorno"];

if ($nivel ==1){$nivel_conv="Usuário";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// APAGA OS DADOS DAS VARIÁVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

//APAGA DADOS TAB_TEMP_CAIXA
$sql_apaga_temp_caixa = mysqli_query($connection, "SELECT * FROM `tab_temp_caixa` WHERE usuario='$usuario'") or die("erro ao selecionar1: sql_apaga_temp_caixa");

if ($linha_apaga_temp_caixa = mysqli_fetch_array($sql_apaga_temp_caixa)) {
//APAGA DADOS TEMPORARIOS TABELA CLIENTE
$sql1 = "DELETE FROM `tab_temp_caixa` WHERE `usuario` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete TAB_TEMP_CAIXA - SQL1");
}

?>
<?php //include("../../include/ajax/includes/_conection.php"); ?>
<?php require_once("../../include/ajax/includes/xajax/xajax.inc.php"); ?>
<?php
function suggestStates($text,$btype) {
	$sql = "SELECT `produto` FROM `tab_produto` WHERE UPPER(`produto`) LIKE UPPER('".$palavra."%');";
	$rsCidades = mysql_query($sql,$GLOBALS['conexao']);
	while ( $Cidade = mysqli_fetch_array($rsCidades) ):
		$database[] = utf8_encode($Cidade['produto']);
	endwhile;

    return suggestions($text, $database, $btype);
}

function suggestions($text, $database, $btype) {
    $objResponse = new xajaxResponse();
	$objResponse->addScript("var dados = new Array;");
	$j = 0;
	for ( $i = 0; $i < count($database); $i++ ):
        if (strtolower($text) == strtolower(substr($database[$i], 0, strlen($text)))):
			$objResponse->addScript("dados[".$j."] = \"".$database[$i]."\";");
			$j++;
		endif;
    endfor;
	$objResponse->addScript("ExibeSuggestions(dados,".$btype.");");
	return $objResponse;
}

$xajax = new xajax();
$xajax->registerFunction("suggestStates");
$xajax->statusMessagesOn();
$xajax->processRequests();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <title>Ajax</title>
    <link  href="../../include/ajax/estilos/estilos.css" type="text/css" rel="stylesheet" />

    <?php $xajax->printJavascript('../../include/ajax/includes/xajax/','',''); ?>
    <script type="text/javascript" src="../../include/ajax/script/autosuggestcontroller.js"></script>
    <script type="text/javascript" src="../../include/ajax/script/statessuggestionprovider.js"></script>
	<script type="text/javascript" src="../../include/ajax/script/funcoes_uteis.js"></script>
	<script type="text/javascript">
		var statesSuggestions = new StatesSuggestionProvider();
        window.onload = function () {
            var oTextBox1 = new AutoSuggestController($("cidade"), statesSuggestions);
        }
    </script>
  </head>

  <body>
  <div id="conteudo">
    Produto: 
      <input name="cidade" type="text" id="cidade" size="40" />
  </div>
  <br />
  <table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="102" colspan="2" valign="top"><?php include($pontos."include/titulo_cima.php"); ?></td>
    </tr>
    <tr>
      <td width="150" height="280" valign="top"><?php include ($pontos."include/menu.php"); ?></td>
      <td width="589"  valign="top"><?php //if($caixa==1){ include("lista_caixa.php");}else{include("checagem/msg_finalizar_caixa.php");}
 ?></td>
    </tr>
    <tr>
      <td height="20" colspan="2" valign="top"><div align="center">
          <?php include ($pontos."include/rodape.php"); ?>
      </div></td>
    </tr>
  </table>
  </body>
</html>