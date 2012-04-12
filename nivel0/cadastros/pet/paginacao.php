<?php


// A variavel aux recebe o valor do total de paginas/intervalo
$aux = $tp/$intervalo;
$aux1 = $pc/$intervalo;
$pi = $aux1 * $intervalo;
if ($pi == "0") {
$pi = "1";
}
$pf = $pi + $intervalo -1;
$anterior = $pi-$intervalo;
if($pc<=$intervalo) {
$anterior = 1;
}
$aux2 = $pi + 1;
if($pi>1) {
$aux = $pi - 1;
$aux2 = $pi + 1;
//echo "<hr>";
// Começa a listar a paginação
echo "<<<font size='1' face='Verdana'><a href='".$PHP_SELF."?pagina=$aux'><b> Anterior </b></a></font>&nbsp;";
}
else
{
	 echo "<font size='1' face='Verdana'>";
	 echo "<< Anterior ";
     echo "</font>";
}
// Monta os links da parte central da paginação
for ($pi;$pi<$pf;$pi++) 
{
      if($pi<=$tp) {
          if($pc==$pi) {
		  	 echo "<strong><font size='1' face='Verdana'>";
             echo "<b>[" . $pi . "]</b>&nbsp;";
			 echo "</font></strong>";
          } else {
		     echo "<font size='1' face='Verdana'><b><a href='".$PHP_SELF."?pagina=" . $pi . "'>" . $pi . "</b></a></font>&nbsp;";
          }
      }
}
// faz verificação pra incluir ou não link na palavra próximo
   if($pc != $tp){
   	  echo "<strong><font size='1' face='Verdana'>";
      echo "<a href='".$PHP_SELF."?pagina=$aux2'><b>Pr&oacute;ximo</b></a> >>";
      echo "</font></strong>";
	}
	else
	{ 
	 echo "<font size='1' face='Verdana'>";
	 echo "Pr&oacute;ximo >>";
     echo "</font>";
	}
?>
