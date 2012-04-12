<?
include("../../../include/arruma_link.php");

echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_clie.js"></script>';
?>
<title>PetLivre (Incluir Foto Pet)</title>
<form id="form" name="form" enctype="multipart/form-data" method="post">
  <table width="180" height="170" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#7F9DB9" bgcolor="#FFFFFF">
    <tr>
      <td height="135"><div align="center">
          <input name="balizador" type="file" id="balizador" size="18" />
          <br />
      </div></td>
    </tr>
    <tr>
      <td height="35"><div align="center">
          <input type="button" name="btn_anx_foto" id="btn_anx_foto" value="Incluir" onclick="javascript: valida_campos();" />
      </div></td>
    </tr>
  </table>
</form>
