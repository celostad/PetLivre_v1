<?php

echo'
<script language="JavaScript" src="'.$pontos.'js/doiMenuDOM.js" type="text/javascript"></script>
<script language="JavaScript" src="'.$pontos.'js/functions.js" type="text/javascript"></script>
<script language="JavaScript" src="'.$pontos.'js/menu1.js" type="text/javascript"></script>';

if ($nivel ==1){include($pontos."js/menu_usuario.php");}
//if ($nivel ==2){include($pontos."js/menu_gerente.php");}
if ($nivel ==3){include($pontos."js/menu_gerente.php");}

/*
if ($nivel ==2){echo '<script language="JavaScript" src="'.$pontos.'js/menu_supervisor.js"></script>';} 
if ($nivel ==3){echo '<script language="JavaScript" src="'.$pontos.'js/menu_gerente.js"></script>';} 
*/

echo '<script language="JavaScript" src="'.$pontos.'js/menu3.js" type="text/javascript"></script>';
?>