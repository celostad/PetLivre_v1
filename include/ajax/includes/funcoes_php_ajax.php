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
<?php

class String {
	var $texto;
	
	function String() {
		$this->texto = "";
	}
	
	function append($s) {
		$this->texto .= (string) $s;
	}
	
	function toString() {
		return utf8_encode($this->texto);
	}
}

function GravaDados($estado,$cidade,$descricao) {
	$msg = "Dados inseridos com sucesso!!!";
	$sql = "INSERT INTO `japs_cidade_dados` (`estado_fk`,`cidade`,`descricao`) VALUES ('".$estado."','".utf8_decode($cidade)."','".utf8_decode($descricao)."');";
	mysql_query($sql,$GLOBALS['conexao']) or $msg = "Não foi possível inserir os dados!!!";
	$objResponse = new xajaxResponse();
	$objResponse->addScript("$('estado').value = \"\";");
	$objResponse->addScript("$('cidade').value = \"\";");
	$objResponse->addScript("$('descricao').value = \"\";");
	$objResponse->addScript("$('enviando').className = \"desaparece\";");
	$objResponse->addAssign("resposta","innerHTML",utf8_encode($msg));
	return $objResponse;
}

function BuscaDados( $palavra ) {
	$palavra = utf8_decode($palavra);
	$sql = "SELECT `estado`, `cidade`, `descricao`
			FROM `japs_cidade_dados`
			LEFT JOIN `japs_estado_dados` ON ( `estado_pk` = `estado_fk` )
			WHERE UPPER(`cidade`) LIKE UPPER('%".$palavra."%')
			   OR UPPER(`descricao`) LIKE UPPER('%".$palavra."%');";
	$rsCidades = mysql_query($sql,$GLOBALS['conexao']);
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("resposta","innerHTML","");
	if ( mysqli_num_rows($rsCidades) > 0 ):
		$s = new String();
		$s->append("<table cellpadding=\"0\" cellspacing=\"0\" class=\"tabela\">");
		$s->append("<tr>");
		$s->append("<td width=\"60\">Estado</td>");
		$s->append("<td width=\"220\">Cidade</td>");
		$s->append("<td width=\"320\">Descrição</td>");
		$s->append("</tr>");
		$i = 0;
		while ( $Cidade = mysql_fetch_assoc($rsCidades) ):
			$s->append("<tr class=\"" . (($i & 1) ? "linha_par" : "linha_impar") . "\">");
			$s->append("<td>".$Cidade['estado']."</td>");
			$s->append("<td>".$Cidade['cidade']."</td>");
			$s->append("<td>".$Cidade['descricao']."</td>");
			$s->append("</tr>");
			$i++;
		endwhile;
		$s->append("</table>");
		$objResponse->addScript("$('carregando').className = \"desaparece\";");
		$objResponse->addAssign("resposta","innerHTML",$s->toString());
	else:
		$objResponse->addScript("$('carregando').className = \"desaparece\";");
		$objResponse->addAssign("resposta","innerHTML",utf8_encode("Não foi encontrado nenhum resultado"));
	endif;
	return $objResponse;
}

function BuscaCidades( $id ) {
	$sql = "SELECT `cidade_pk`, `cidade` FROM `japs_cidade_dados` WHERE `estado_fk` = '".$id."' ORDER BY `cidade`;";
	$rsCidades = mysql_query($sql,$GLOBALS['conexao']);
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("resposta","innerHTML","");
	$i = 0;
	if ( mysqli_num_rows($rsCidades) > 0 ):
		$objResponse->addScript("$('cidade_dd').options[".$i++."] = new Option(\"Selecione uma Cidade\",\"\",true);");
		while ( $Cidade = mysqli_fetch_array($rsCidades) ):
			$objResponse->addScript("$('cidade_dd').options[".$i++."] = new Option(\"".utf8_encode($Cidade['cidade'])."\",\"".$Cidade['cidade_pk']."\",false);");
		endwhile;
	else:
		$objResponse->addAssign("resposta","innerHTML",utf8_encode("Não foi encontrado nenhum resultado"));
	endif;
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	return $objResponse;
}

function suggestStates($text,$btype) {
	$sql = "SELECT `cidade` FROM `japs_cidade_dados` WHERE UPPER(`cidade`) LIKE UPPER('".$palavra."%');";
	$rsCidades = mysql_query($sql,$GLOBALS['conexao']);
	while ( $Cidade = mysqli_fetch_array($rsCidades) ):
		$database[] = utf8_encode($Cidade['cidade']);
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

function Votacao($vote_sent, $id_sent, $ip_num) {
	$tableName="ratings";
	
/*	$vote_sent = $_REQUEST['j'];
	$id_sent = $_REQUEST['q'];
	$ip_num = $_REQUEST['t'];*/
	
	$sql = "SELECT total_votes, total_value, used_ips FROM ".$tableName." WHERE id='".$id_sent."';";
	$rsTotais = mysql_query($sql,$GLOBALS['conexao'])or die(" Error: ".mysqli_error($connection));
	$Totais = mysql_fetch_assoc($rsTotais);
	$checkIP = unserialize($Totais['used_ips']);
	$total_votos = $Totais['total_votes'];
	$valor_votos = $Totais['total_value'];
	$sum = $vote_sent + $valor_votos;
	$frase = ( $total_votos == 1 ) ? "voto computado" : "votos computados";
	
	if ( $sum == 0 )
		$added = 0;
	else
		$added = $total_votos + 1;
	
	if ( is_array($checkIP) )
		array_push($checkIP,$ip_num);
	else
		$checkIP = array($ip_num);
	
	$insert = serialize($checkIP);
	
	$sql = "SELECT count(*) FROM ".$tableName." WHERE id = '".$id_sent."';";
	$rsExiste = mysql_query($sql,$GLOBALS['conexao']);
	$existe_id = mysql_result($rsExiste, 0, 0); 
	
	if ( $existe_id == false ):
		$sql = "INSERT INTO ".$tableName." VALUES ('".$id_sent."', 0, 0, 0, '');";
		mysql_query($sql,$GLOBALS['conexao']);
	endif;
	$sql = "UPDATE ".$tableName." SET total_votes = '".$added."', total_value = '".$sum."', used_ips = '".$insert."' WHERE id = '".$id_sent."';";
	mysql_query($sql,$GLOBALS['conexao']);
	
	$sql = "SELECT total_votes, total_value, used_ips FROM ".$tableName." WHERE id='".$id_sent."';";
	$query = mysql_query($sql,$GLOBALS['conexao'])or die(" Error: ".mysqli_error($connection));
	$numbers = mysql_fetch_assoc($query);
	$total_votos = $numbers['total_votes'];//how many votes total
	$valor_votos = $numbers['total_value'];//total number of rating added together and stored
	
	$s = new String();
	$s->append("<ul class=\"unit-rating\">");
	$s->append("<li class=\"current-rating\" style=\"width:". number_format($valor_votos/$total_votos,2)*30 ."px;\">Current rating.</li>");
	$s->append("<li class=\"r1-unit\">1</li>");
	$s->append("<li class=\"r2-unit\">2</li>");
	$s->append("<li class=\"r3-unit\">3</li>");
	$s->append("<li class=\"r4-unit\">4</li>");
	$s->append("<li class=\"r5-unit\">5</li>");
	$s->append("<li class=\"r6-unit\">6</li>");
	$s->append("<li class=\"r7-unit\">7</li>");
	$s->append("<li class=\"r8-unit\">8</li>");
	$s->append("<li class=\"r9-unit\">9</li>");
	$s->append("<li class=\"r10-unit\">10</li>");
	$s->append("</ul>");
	$s->append("<br />Nota: <strong>".number_format($sum/$added,1)."</strong> Total de ".$added." ".$frase.".");
	$s->append("<br />Obrigado pelo seu Voto!</p></div>");
	
	$objResponse = new xajaxResponse();
	$objResponse->addScript("$('enviando').className = \"desaparece\";");
	$objResponse->addAssign("unit_long".$id_sent,"innerHTML",$s->toString());
	return $objResponse;
}

function enviaEmail($nome,$email,$mensagem) {
	$file_name = "envio_contato.htm";
	$comentario = str_replace(chr(10), "<br />",utf8_decode($mensagem));
	$Bodyhtml = "";
	if ( file_exists( $file_name ) ):
		$fd = fopen( $file_name, "r" );
		$ano = date("Y");
		while ( !feof( $fd ) ):
			$strline1 = fgets($fd);
			$strline1 = str_replace("%%NOME%%",utf8_decode($nome),$strline1);
			$strline1 = str_replace("%%EMAIL%%",utf8_decode($email),$strline1);
			$strline1 = str_replace("%%ANO%%",$ano,$strline1);
			$strline1 = str_replace("%%MENSAGEM%%",$comentario,$strline1);
			$strline1 = str_replace("%%END_SITE%%",$GLOBALS['EnderecoSite'],$strline1);
			$Bodyhtml = $Bodyhtml.$strline1;
		endwhile;
		fclose( $fd );
	endif;
	$emaildest = "".$nome." <".$email.">";
	$subject = "Japs.etc.br (Contato AJAX)";
	$header =	"From: Japs.etc.br <flavio@japs.etc.br>\n" .
				"MIME-Version: 1.0\n" .
				"Content-type: text/html; charset=iso-8859-1";
	if ( mail($emaildest, $subject, $Bodyhtml, $header) ):
		$dados = "<p>Sua mensagem foi enviada com sucesso!</p>
				<p>A mensagem deve chegar em breve em sua caixa postal</p>";
	else:
		$dados = "<p>N&atilde;o foi poss&iacute;vel enviar a mensagem!</p>
				<p>Por Favor, tente mais tarde!</p>";
	endif;
	
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("resposta","innerHTML",$dados);
	$objResponse->addScript("$('nome').value = \"\";");
	$objResponse->addScript("$('email').value = \"\";");
	$objResponse->addScript("$('texto').value = \"\";");
	
	return $objResponse;
}

function ExibeConteudoInserir() {
	$s = new String();
	$s->append("Estado:");
	$s->append("<select name=\"estado\" id=\"estado\">");
	$s->append("<option value=\"\">Selecione o Estado</option>");
	$sql = "SELECT * FROM `japs_estado_dados`;";
	$rsEst = mysql_query($sql,$GLOBALS['conexao']);
	while ( $Est = mysqli_fetch_array($rsEst) ):
		$s->append("<option value=\"".$Est['estado_pk']."\">".$Est['estado']."</option>");
	endwhile;
	$s->append("</select><br />");
	$s->append("Cidade: <input type=\"text\" name=\"cidade\" id=\"cidade\" maxlength=\"100\" size=\"20\" /><br />");
	$s->append("Descri&ccedil;&atilde;o: <input type=\"text\" name=\"descricao\" id=\"descricao\" maxlength=\"250\" size=\"20\" /><br />");
	$s->append("<input type=\"button\" name=\"enviar\" id=\"enviar\" value=\"Enviar\" onclick=\"javascrip:GravaDados();\" />");
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("conteudo_ajax","innerHTML","");
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	$objResponse->addAssign("conteudo_ajax","innerHTML",$s->toString());
	return $objResponse;
}

function ExibeConteudoBuscar() {
	$s = new String();
	$s->append("<input type=\"text\" name=\"palavra\" id=\"palavra\" maxlength=\"100\" size=\"20\" /><br />");
	$s->append("<input type=\"button\" name=\"buscar\" id=\"buscar\" value=\"Buscar\" onclick=\"javascript:PesquisaDados();\" />");
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("conteudo_ajax","innerHTML","");
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	$objResponse->addAssign("conteudo_ajax","innerHTML",$s->toString());
	return $objResponse;
}

function ExibeConteudoDropDown() {
	$s = new String();
	$s->append("Estado:");
	$s->append("<select name=\"estado_dd\" id=\"estado_dd\" onchange=\"javascript:ExibeDropDown();\">");
	$s->append("<option value=\"\">Selecione o Estado</option>");
	$sql = "SELECT * FROM `japs_estado_dados`;";
	$rsEst = mysql_query($sql,$GLOBALS['conexao']);
	while ( $Est = mysqli_fetch_array($rsEst) ):
		$s->append("<option value=\"".$Est['estado_pk']."\">".$Est['estado']."</option>");
	endwhile;
	$s->append("</select><br />");
	$s->append("Cidade:");
	$s->append("<select id=\"cidade_dd\" name=\"cidade_dd\">");
	$s->append("<option value=\"\">Primeiro selecione uma Cidade</option>");
	$s->append("</select>");
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("conteudo_ajax","innerHTML","");
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	$objResponse->addAssign("conteudo_ajax","innerHTML",$s->toString());
	return $objResponse;
}

function ExibeConteudoContato() {
	$s = new String();
	$s->append("<table class=\"tabela\">");
	$s->append("<tr>");
	$s->append("<td colspan=\"2\">Formul&aacute;rio de Contato em AJAX</td>");
	$s->append("</tr>");
	$s->append("<tr>");
	$s->append("<td width=\"80\"><div align=\"right\">Nome::</div></td>");
	$s->append("<td width=\"450\"><input type=\"text\" name=\"nome\" id=\"nome\" /></td>");
	$s->append("</tr>");
	$s->append("<tr>");
	$s->append("<td width=\"80\"><div align=\"right\">E-mail::</div></td>");
	$s->append("<td width=\"450\"><input type=\"text\" name=\"email\" id=\"email\" /></td>");
	$s->append("</tr>");
	$s->append("<tr>");
	$s->append("<td width=\"80\"><div align=\"right\">Texto::</div></td>");
	$s->append("<td width=\"450\"><textarea name=\"texto\" id=\"texto\"></textarea></td>");
	$s->append("</tr>");
	$s->append("<tr>");
	$s->append("<td><input type=\"button\" name=\"enviar\" id=\"enviar\" value=\"Enviar\" onClick=\"javascript:ValidaEnvio();\" /></td>");
	$s->append("</tr>");
	$s->append("</table>");
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("conteudo_ajax","innerHTML","");
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	$objResponse->addAssign("conteudo_ajax","innerHTML",$s->toString());
	return $objResponse;
}

function ExibeConteudoVotacao( $id ) {
	$tableName = "ratings";
	
	$sql = "SELECT total_votes, total_value, used_ips FROM ".$tableName." WHERE id='".$id."';";
	$rsTotais = mysql_query($sql,$GLOBALS['conexao']) or die(" Erro: ".mysqli_error($connection));
	$Totais = mysql_fetch_assoc($rsTotais);
	$total_votos = $Totais['total_votes'];
	$valor_votos = $Totais['total_value'];
	$frase = ( $total_votos == 1 ) ? "voto computado" : "votos computados";
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$s = new String();
	$s->append("<p>".$id." - Sistema de Vota&ccedil;&atilde;o</p>");
	$s->append("<div id=\"unit_long".$id."\">");
	$s->append("<ul class=\"unit-rating\">");
	$s->append("<li class=\"current-rating\" style=\"width:".(number_format($valor_votos / $total_votos, 2) * 30)."px;\">Corrente ".(number_format($valor_votos / $total_votos, 2) / 10)."</li>");
	for ( $ncount = 1; $ncount <= 10; $ncount++ ):
		$s->append("<li><a href=\"javascript:;\" title=\"".$ncount." out of 10\" class=\"r".$ncount."-unit\" onclick=\"javascript:sndReq('".$ncount."','".$id."','".$ip."')\">".$ncount."</a></li>");
	endfor;
	$ncount = 0; // resets the count
	$s->append("</ul>");
	$s->append("<p>Nota: <strong>".number_format($valor_votos / $total_votos,1)."</strong> de ".$total_votos." ".$frase."</p>");
	$s->append("</div>");
	$objResponse = new xajaxResponse();
	$objResponse->addAssign("conteudo_ajax","innerHTML","");
	$objResponse->addScript("$('carregando').className = \"desaparece\";");
	$objResponse->addAssign("conteudo_ajax","innerHTML",$s->toString());
	return $objResponse;
}
?>