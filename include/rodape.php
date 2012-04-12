<link href="<?=$pt_lk_pg;?>css/config.css" rel="stylesheet" type="text/css">
<table width="720" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="149"><font size="1">Desenvolvido por: <a href="http://www.livresys.com.br" target="_blank" class="classe2">LivreSys</a></font></td>
    <td width="430"><div align="center"><font size="1" color="#999999">Usu&aacute;rio Logado:</font><font size="1"><font color="#000000"> <? echo $usuario; ?> </font><font color="#999999">|</font><font color="#000000"> </font><font color="#FFFFFF"><font color="#999999">IP 
      da M&aacute;quina:</font></font><font color="#666666"><font color="#000000"> <? echo $ip = getenv("REMOTE_ADDR")?> <font color="#999999">|</font><font color="#FFFFFF">&nbsp;</font><font color="#999999">Data:</font> </font></font><font color="#FFFFFF"> <font color="#999999"> <font color="#000000">
                  <? $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
                  </font>|</font>&nbsp;</font><font color="#999999">Hor&aacute;rio:</font><font color="#666666"><font color="#000000">
<?php
				  
$h_H=date("H");
$h_H = $h_H+2;

if ($h_H == 24){$h_H = 00;}
if ($h_H == 25){$h_H = 01;}
if ($h_H == 26){$h_H = 02;}

$date =date("$h_H:i");

echo $date;
?>
    </font></font></font></div></td>
    <td width="141"><font size="1">Nivel de acesso: <font color="#FF0000"><? echo $nivel_conv; ?></font></font></td>
  </tr>
</table>

