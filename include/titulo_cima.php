<?php include("execute.php"); ?>

<style type="text/css">

.style7 {font-size: 11px}
.style8 {font-size: 12px; font-weight: bold; color: #F29B18}
.style9 {font-size: 13px; font-weight: bold; color: #336699;}
.style12 {font-size: 15px; font-weight: bold; color: #FFFFFF;}
.style10 {
	color: #000000;
	font-weight: bold;s
	font-style: italic;
	font-size: 14px;
}
#Layer1 {
	position:absolute;
	width:128px;
	top: 20px;
	left: 259px;
	margin-left: 370px;
}


-->
</style>
<table width="720" height="103" border="0" cellpadding="0" cellspacing="1">
  <tr>
    <td width="133" height="20" class="style9"><div align="center" class="style10">Sistema Gerencial </div></td>
    <td width="452" rowspan="2"><div align="center">
      <table width="452" height="98" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
          <td><img src="<?=$pontos;?>imagens/titulo.jpg" width="452" height="96" /></td>
        </tr>
      </table>
    </div></td>
    <td width="120" height="100" rowspan="2" background="<?=$pontos;?>imagens/dir_titulo_cima.jpg"><table width="120" height="98" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td height="52" valign="middle">
              <div align="left"><font class="style9">&nbsp;&nbsp;Olá, &nbsp;</font><font class="style8"><? echo strtoupper($usuario);?></font></div>
	    </td>
        </tr>
        <tr>
          <td height="21" valign="middle"><div align="center">
	      Alterar Cadastro</div></td>
        </tr>
        <tr>
          <td height="21" valign="top">
		  <div align="center"><a href="<?=$pontos;?>logout.php" class="classe1">
		  Sair</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="80" valign="top"><div align="center">
<img src="<?=$pontos;?>imagens/titulo_pet_livre_peq.jpg" width="120" height="59"></div></td>
  </tr>
</table>

