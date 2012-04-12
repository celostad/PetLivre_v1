<html>
<head>
<script type="text/javascript" src="../../../js/func_cad_pet.js"></script>
<link rel="stylesheet" href="../../../css/config.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<title>Pet Livre - Sistema de gerenciamento PetShop (Cadastro de Animal)</title>
<body bgcolor="#FFFFFF" onLoad="document.frmAjax.Btn_envia.focus()">
<form name="frmAjax" method="POST" action="javascript:busca_animal();">
  <table width="400" border="0" bordercolor="#cccccc" height="110" align="center" cellpadding="0" cellspacing="0">
    
    
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="634" height="20" colspan="3"><div align="center"><img src="../../../imagens/titulos/titulo_animal_popup_buscar.jpg" width="400" height="25"></div></td>
    </tr>
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td height="15" colspan="3"><img src="../../../imagens/fundo_cad_cima.jpg" width="400" height="15" border="0"></td>
    </tr>
    
    <tr>
      <td height="20" colspan="3" nowrap background="../../../imagens/fundo_formulario_popup.jpg"><table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="37" height="24" class="cabec_style11">&nbsp;Tipo:</td>
          <td width="108"><select name="sel_tipo_pesq" id="sel_tipo_pesq">
            <option value="Nome">Nome</option>
            <option value="Ra&ccedil;a">Ra&ccedil;a</option>
            <option value="Porte">Porte</option>
            <option value="Sexo">Sexo</option>
            <option value="codigo">C&oacute;digo</option>
            <option value="Cor">Cor</option>
            <option value="Esp&eacute;cie">Esp&eacute;cie</option>
            <option value="Idade">Idade</option>
            <option value="Mensalista">Mensalista</option>
          </select>          </td>
          <td width="189"> <input name="txt_descricao_pesq" type="text" id="txt_descricao_pesq" size="25"></td>
          <td width="66"><input name="Btn_envia" type="submit" id="Btn_envia" value="Enviar"></td>
        </tr>
      </table></td>
    </tr>
    

    <tr>
      <td height="15" colspan="3" align="center" valign="bottom"><img src="../../../imagens/fundo_cad_baixo.jpg" width="400" height="15"></td>
    </tr>
</table>
</form>

</body>
</html>