<? include("../../../include/arruma_link.php");
echo '<script type="text/javascript" src="'.$pontos.'js/func_cad_pet.js"></script>';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
</head>
<title>Pet Livre - Procurar Pet</title>
<body bgcolor="#FFFFFF" onLoad="document.frmAjax.Btn_envia.focus()">
<form name="frmAjax" method="POST" action="javascript:busca_pet();">
  <table width="400" border="1" bordercolor="#cccccc" height="70" align="center" cellpadding="0" cellspacing="0">
    
    <tr>
      <td width="400" height="22" colspan="3" bgcolor="#0099CC">
      <div align="center" class="style3"><strong>Procurar</strong></div></td>
    </tr>
    <tr>
      <td height="15" colspan="3">&nbsp;</td>
    </tr>
    
    <tr>
      <td height="20" colspan="3"><table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="37" height="24" class="cabec_style11">&nbsp;Tipo:</td>
          <td width="91"><select name="sel_tipo_pesq" id="sel_tipo_pesq">
            <option value="Nome">Nome</option>
            <option value="Ra&ccedil;a">Ra&ccedil;a</option>
            <option value="Porte">Porte</option>
            <option value="Sexo">Sexo</option>
            <option value="codigo">C&oacute;digo</option>
            <option value="Cor">Cor</option>
            <option value="Esp&eacute;cie">Esp&eacute;cie</option>
            <option value="Idade">Idade</option>
            <option value="Dono">Dono</option>
            <option value="Mensalista">Mensalista</option>
          </select></td>
          <td width="190"> <input name="txt_descricao_pesq" type="text" id="txt_descricao_pesq" size="25"></td>
          <td width="82"><input name="Btn_envia" type="submit" id="Btn_envia" value="Enviar"></td>
        </tr>
      </table></td>
    </tr>
</table>
</form>

</body>
</html>