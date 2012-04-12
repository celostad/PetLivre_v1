<?php

$ddd = 11;
$telefone = 89685158;
$operadora = 'clarotorpedo.com.br';
$celular = $ddd.$telefone.'@'.$operadora;
$valor_db =120;
$valor = number_format($valor_db, 2, ',','.');

$h = getdate(); //variavel recebe a data
$data_atual_2 = $h['mday']."/".$h['mon']."/".$h['year'];


$assunto1 ="Credito em conta\r\n";
$mensagem1 = "(Cartao Debito) - R$ $valor em $data_atual_2\r\n";
$header1 = "From: petLivre@maypet.com.br\r\n";

mail($celular, $assunto1, $mensagem1, $header1);

if (mail) echo "Foi.";
?>