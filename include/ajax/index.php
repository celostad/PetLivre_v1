<?php
//==================================================================================================//
//                                                                                                  //
//     Criado por.......................: Flavio Theruo Kaminisse                                   //
//     Site.............................: http://www.japs.etc.br                                    //
//     Contato..........................: flavio@japs.etc.br                                        //
//     Data Criacao.....................: 17/02/2006                                                //
//                                                                                                  //
//==================================================================================================//
?>
<? include("includes/_conection.php"); ?>
<? require_once("includes/xajax/xajax.inc.php"); ?>
<?php
function suggestStates($text,$btype) {
	$sql = "SELECT `produto` FROM `tab_produto` WHERE UPPER(`produto`) LIKE UPPER('".$palavra."%');";
	$rsCidades = mysql_query($sql,$GLOBALS['conexao']);
	while ( $Cidade = mysql_fetch_array($rsCidades) ):
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
    <link  href="estilos/estilos.css" type="text/css" rel="stylesheet" />

    <?php $xajax->printJavascript('includes/xajax/','',''); ?>
    <script type="text/javascript" src="script/autosuggestcontroller.js"></script>
    <script type="text/javascript" src="script/statessuggestionprovider.js"></script>
	<script type="text/javascript" src="script/funcoes_uteis.js"></script>
	<script type="text/javascript">
		var statesSuggestions = new StatesSuggestionProvider();
        window.onload = function () {
            var oTextBox1 = new AutoSuggestController($("cidade"), statesSuggestions);
        }
    </script>
  </head>

  <body>
  <div id="conteudo">Produto: 
    <input name="cidade" type="text" id="cidade" size="40" />
    <br />
  </div>
  </body>
</html>
