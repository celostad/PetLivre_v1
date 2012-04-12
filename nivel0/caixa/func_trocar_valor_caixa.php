<?

// VERIFICA SE EXISTE SAÍDAS
$sql_troca = mysql_query("SELECT * FROM tab_caixa WHERE valor <>''") or print("Erro ao ler a tabela:
".mysql_error());

while($linha_troca = mysql_fetch_array($sql_troca)){
$txt_cod = $linha_troca['codigo'];
$txt_valor = $linha_troca['valor'];

//aqui a função "str_replace" troca a ","(vírgula) por "."(ponto)
$txt_valor_modificado = str_replace(",", ".",$txt_valor);

$sql_valor_modificado = mysql_query("UPDATE tab_caixa SET valor='$txt_valor_modificado' WHERE codigo ='$txt_cod'");
unset($txt_cod);
unset($txt_valor);
unset($txt_valor_modificado);
}



@mysql_close($sql_sai);


?>
