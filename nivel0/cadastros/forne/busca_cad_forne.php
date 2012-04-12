<html>
<head>
<script type="text/javascript" src="../../../js/func_cad_forne.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Animal)</title>
<body bgcolor="#FFFFFF" onLoad="document.frmAjax.Btn_envia.focus()">
<form name="frmAjax" method="POST" action="javascript:busca_forne();">
  <table width="400" border="1" bordercolor="#cccccc" height="70" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="400" height="22" colspan="3" bgcolor="#FF9933"><div align="center" class="style3"><strong>Procurar</strong></div></td>
    </tr>
    <tr>
      <td height="15" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" colspan="3"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="37" height="24" class="cabec_style11">&nbsp;Tipo:</td>
            <td width="91"><select name="sel_tipo_pesq" id="sel_tipo_pesq">
                <option value="razao_social">Razão Social</option>
                <option value="tel_com">Telefone</option>
                <option value="cel">Celular</option>
                <option value="cnpj">Cnpj</option>
                <option value="codigo">C&oacute;digo</option>
                <option value="endereco">Endere&ccedil;o</option>
              </select>
            </td>
            <td width="190"><input name="txt_descricao_pesq" type="text" id="txt_descricao_pesq" size="25"></td>
            <td width="82"><input name="Btn_envia" type="submit" id="Btn_envia" value="Enviar"></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>

</body>
</html>