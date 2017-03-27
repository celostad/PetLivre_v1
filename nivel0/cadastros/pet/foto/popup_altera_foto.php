<?php
session_start();

require_once("../../../conexao.php");

$usuario = $_SESSION["sessao_login"];
?>
<html>
<head>
<script type="text/javascript" src="../../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../../js/functions.js"></script>
<script type="text/javascript" src="../../../js/outros.js"></script>
<script language="JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->

</script>
</head>
<title>Pet Livre - (Alterar Foto)</title>
<BODY bgcolor="#FFFFFF">
<table width="180" height="180" border="0" cellpadding="0" cellspacing="0">
  
  <tr> 
    <td> 
<form method="POST" enctype="multipart/form-data" name="form">        <div align="center">
          <table width="180" height="180" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#7F9DB9" bgcolor="#FFFFFF">
            <tr>
              <td><p align="center">
                  <input name="ball" type="file" id="balizador" size="10">
                  <br>
              </p></td>
            </tr>
            <tr>
              <td height="20"><div align="center">
                  <input type="button" name="Button" value="Alterar Foto" onClick="javascript: altera_foto2();">
              </div></td>
            </tr>
          </table>
        </div>
      </form>    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>