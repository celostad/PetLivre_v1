<table width="180" height="60" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="60"><div align="center">
<?
 if ($txt_cod_dono<>""){echo "<a href=\"javascript:mostra_animal();\"><img src=\"../../../imagens/botao_animal_form.gif\" width='37' height='45' border='0' /></a>";}
?>	
</div></td>
    <td width="60"><div align="center"><a href="javascript:alterar_clie();"><img src="../../../imagens/salvar1.gif" alt="Alterar" width="39" height="41" border="0" /></a></div></td>
    <td width="60"><div align="center">
<?
 if ($checa_retorno==3 or $checa_retorno==4){ echo "<a href=\"javascript:chk_dados_sair_clie();\">";}
 if ($checa_retorno==30){ echo "<a href=\"javascript:chk_dados_sair_clie();\">";}
?>	
<img src="../../../imagens/voltar1.gif" alt="Voltar" width="48" height="37" border="0" /></a></div></td>
  </tr>
</table>
