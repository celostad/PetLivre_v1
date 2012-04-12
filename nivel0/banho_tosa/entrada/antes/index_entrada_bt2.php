<?
session_start();

require_once("../conexao.php");
include("../../barra.php");

$usuario = $_SESSION["sessao_login"];
$rad_alterar = $_SESSION["rad_alterar"];

if ($rad_alterar != ""){header("Location: altera_cad_clie2.php");}
else

$sql = mysql_query("SELECT * FROM `tab_temp_clie` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha = mysql_fetch_array($sql)) {

$sql1 = "DELETE FROM `tab_temp_clie` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_clie - SQL1");
}
else

$sql_2 = mysql_query("SELECT * FROM `tab_temp_animal` WHERE user_cadastro='$usuario'") or die("erro ao selecionar");

if ($linha2 = mysql_fetch_array($sql_2)) {

$sql2 = "DELETE FROM `tab_temp_animal` WHERE `user_cadastro` = '$usuario'";
$resultado2 = mysql_query($sql2) or die ("Problema no Delete tab_temp_animal - SQL2");
}
else
?>
<html>
<head>
<script type="text/javascript" src="../../js/doiMenuDOM.js"></script>
<script type="text/javascript" src="../../js/functions.js"></script>
<script type="text/javascript" src="../../js/outros.js"></script>
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
<title>Pet Livre - Sistema de gerenciamento PetShop  (Cadastro de Cliente) </title>
<BODY bgcolor="#FFFFFF">
<table border="0" cellpadding="1" cellspacing="1" width="630" align="center" height="300">
  <tr> 
    <td align="center" height="506" width="635"> 
      <form name="frmAjax"  method="post">
        <div align="center"> 
          <script type="text/javascript">
<!--

function deep1(no,deep)
{
  if(deep == 10)
    return;
  for(var i=0;i<5;i++)
  {
	switch(no)
	{
      case 2:
        eval("pmL"+no+""+deep+""+i+"=new TPopMenu('Menu "+i+"','0','','',' Menu "+deep+" "+i+"');"); 
	    break;
 	  default:
		eval("pmL"+no+""+deep+""+i+"=new TPopMenu('Menu "+i+"','','','',' Menu "+deep+" "+i+"');"); 
	}
       
  }
  deep1(no,++deep);
}
function deep2(par,no,deep)
{ 
  if(deep == 10)
    return;
  var j = Math.round(Math.random()*4);
  for(var i=0;i<5;i++)
  {
    eval(par+".Add(pmL"+no+""+deep+""+i+");");
    if(i== j)
    {  
      var d = deep+1;  
      deep2("pmL"+no+""+deep+""+i,no,d);
    }
  }
}

//doi style
  var mm1 = new TMainMenu('mm1','horizontal');
        var pmSep10 = new TPopMenu('-','','','','');
  
  var pmDemo10 = new TPopMenu('Cadastros','0','','','Cadastros de clientes, animais, fornecedores');
    var pm_clie10 = new TPopMenu('Cliente','','a','index_cad_clie.php','Cadastra e altera cliente');
    var pm_animal10 = new TPopMenu('Animal','','a','../animal/index_cad_animal.php','Cadastra e altera Animal');
    var pm_fornec10 = new TPopMenu('Fornecedor','','','','Cadastra e altera Fornecedor');
  
  var pm_banho10 = new TPopMenu('Banho e Tosa','0','','','Movimento do Banho e Tosa');
      var pm_banho_agenda = new TPopMenu('Agenda','','','','Agenda do Banho e Tosa');
      var pm_banho_entrada = new TPopMenu('Entrada','','a','../../banho_tosa/index_bt.php','Entrada do Banho e Tosa');
      var pm_banho_pesquisa = new TPopMenu('Pesquisa','','','','Pesquisa');

  var pm_estoque10 = new TPopMenu('Estoque','0','','','Controle de entrada e saída do Estoque');

  var pm_vendas10 = new TPopMenu('Vendas','0','','','Inicia o terminal de Vendas');

  var pm_financeiro10 = new TPopMenu('Financeiro','0','','','Movimento de contas a pagar - receber');

  var pm_relatorios10 = new TPopMenu('Relatórios','0','','','Imprime relatórios em geral');

  var pm_utilitarios10 = new TPopMenu('Utilitários','0','','','Backup, calculadora, etc');
  var pmAbout10 = new TPopMenu('Sobre...','','f',"alert('      Pet Livre v.1.0\\nTodos os direitos reservados\\n      &copy; 2007 - 2008\\n www.livresys.com.br')",'Sobre este programa');

  var pm_sair10 = new TPopMenu('Sair','0','a','../../logout.php','Saida do Sistema Pet Livre');

  mm1.Add(pmDemo10);
  pmDemo10.Add(pm_clie10);
  pmDemo10.Add(pm_animal10);
  pmDemo10.Add(pm_fornec10);
  
  mm1.Add(pm_banho10);
      pm_banho10.Add(pm_banho_agenda);
      pm_banho10.Add(pm_banho_entrada);
      pm_banho10.Add(pm_banho_pesquisa);

  mm1.Add(pm_estoque10);
  
  mm1.Add(pm_vendas10);

  mm1.Add(pm_financeiro10);

  mm1.Add(pm_relatorios10);

  mm1.Add(pm_utilitarios10);
  pm_utilitarios10.Add(pmAbout10);
  
  mm1.Add(pm_sair10);

//end of 9x style


var menus=6;
for(var i=0;i<menus;i++)
{
  deep1(i,0);
  deep2('pmL'+i+'0',i,0);
}
//-->
</script>
          <script language="JavaScript" type="text/JavaScript">
	
	//9x style
		mm1.SetPosition('relative',0,0);
		mm1.SetType('float');
		mm1.SetCorrection(0,0);
		mm1.SetCellSpacing(2);
		mm1.SetItemDimension(75,5);
		//mm1.SetBackground('buttonface','','','');
		mm1.SetShadow(true,'#B0B0B0',3);
		mm1.SetItemBorder(1,'buttonface','solid');
		mm1.SetItemText('black','center','','','');
		mm1.SetItemTextHL('black','center','','','');
		mm1.SetItemBackgroundHL('','','','');
		mm1.SetItemBorderTopHL(1,'white','solid');
		mm1.SetItemBorderRightHL(1,'buttonshadow','solid');
		mm1.SetItemBorderBottomHL(1,'buttonshadow','solid');
		mm1.SetItemBorderLeftHL(1,'white','solid');
		mm1.SetItemTextClick('black','center','','','');
		mm1.SetItemBackgroundClick('','','','');
		mm1.SetItemBorderTopClick(1,'buttonshadow','solid');
		mm1.SetItemBorderRightClick(1,'white','solid');
		mm1.SetItemBorderBottomClick(1,'white','solid');
		mm1.SetItemBorderLeftClick(1,'buttonshadow','solid');
		mm1.SetBorderTop(2,'buttonhighlight','outset');
		mm1.SetBorderRight(2,'buttonface','outset');
		mm1.SetBorderBottom(2,'buttonface','outset');
		mm1.SetBorderLeft(2,'buttonhighlight','outset');
		
		mm1._pop.SetCorrection(0,0);
		mm1._pop.SetItemDimension(100,23);
		mm1._pop.SetPaddings(5);
		mm1._pop.SetBackground('buttonface','','','');
		mm1._pop.SetSeparator(100,'center','buttonshadow','white');
		mm1._pop.SetExpandIcon(false,'',1);
		mm1._pop.SetFont('tahoma,verdana,arial','8.5pt');
		mm1._pop.SetBorderTop(2,'buttonhighlight','outset');
		mm1._pop.SetBorderRight(2,'buttonface','outset');
		mm1._pop.SetBorderBottom(2,'buttonface','outset');
		mm1._pop.SetBorderLeft(2,'buttonhighlight','outset');
		mm1._pop.SetDelay(500);
		mm1._pop.SetItemBorder(0,'navy','solid');
		mm1._pop.SetItemBorderHL(0,'#00FF00','solid');
		mm1._pop.SetItemPaddings(0);
		mm1._pop.SetItemPaddingsHL(0);
		mm1._pop.SetItemBackgroundHL('#002266','','','');
		mm1.Build();
	
</script>
          <table align="center" cellspacing="1" cellpadding="1" width="630" border="0">
            <tr valign="middle"> 
              <td colspan="3" height="59"> 
                <p align="center"><img src="../../imagens/TITULOS/titulo_entrada_banho_tosa.png" width="635" height="25"></p>
              </td>
            </tr>
            <tr> 
              <td colspan="3" height="333"> 
                <table width="630" height="331" cellpadding="0" cellspacing="0" border="0" align="center">
                  <tr> 
                    <td height="25" width="634" valign="bottom"> 
                      <div align="center"><img src="../../imagens/btn_banho_tosa/cab_bt_cliente.jpg" width="635" height="31"></div>
                    </td>
                  </tr>
                  <tr> 
                    <td height="300" width="630"> 
                      <table width="632" height="299" cellpadding="0" cellspacing="0" border="0" background="../../imagens/fundo_cad.jpg">
                        <tr> 
                          <td height="20" colspan="8" valign="bottom"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font></b> 
                            <font size="2"><b></b><font color="#FF0000"><strong>*</strong></font></font> 
                            <font size="2"><b></b></font><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif">Propriet&aacute;rio(a):&nbsp;&nbsp;</font></b></font></font></b> 
                            <input name="txt_proprietario2" type="text" id="txt_proprietario" size="40">
                            <b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif">&nbsp;&nbsp;</font></b></font></font></b> 
                            <a href="javascript:busca_cad_clie_animal();"><img src="../../imagens/localizar.gif" alt="Localizar cliente cadastrado" width="25" height="24" border="0" align="absbottom"></a> 
                            <input type="button" name="Button2" value="Detalhes">
                          </td>
                        </tr>
                        <tr> 
                          <td height="30" colspan="8" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td height="24" colspan="8" valign="bottom"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif">Data 
                            Nascimento:</font></b></font></b></font><font size="1"><b><font face="Times New Roman, Times, serif"> 
                            </font></b></font></font></font> <font size="1"> 
                            <? echo $data_nasc_clie; ?>
                            </font></b></font></font></b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Rg</font><font face="Times New Roman, Times, serif">:</font></b></font></font></font></font><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b> 
                            <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font> <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Cpf:</font></b></font></b></font></font> 
                            <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font> 
                            <font face="Times New Roman, Times, serif" size="1"></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></td>
                        </tr>
                        <tr> 
                          <td height="30" colspan="8" valign="bottom"><b><font face="Times New Roman, Times, serif" size="2"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            </font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1" color="#999999">Endere&ccedil;o:</font> 
                            <font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font face="Times New Roman, Times, serif" color="#999999">Compl.:</font> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font><font size="2" face="Times New Roman, Times, serif"><b><font size="1"></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></td>
                        </tr>
                        <tr> 
                          <td height="30" colspan="8" valign="bottom"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            </font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font size="2" face="Times New Roman, Times, serif"><b><font size="1" color="#999999">Cep:</font></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" face="Times New Roman, Times, serif" color="#999999">Bairro:</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font><font face="Times New Roman, Times, serif" size="2" color="#999999"><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" face="Times New Roman, Times, serif">Estado:</font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></b></font></b></font></b></font></b></font></font></b></font></font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            </b></font><font size="2" face="Times New Roman, Times, serif"><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><b><font size="2"><font size="2"><b><font size="1"><b><b><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font></b></b></b></b></font></b></font></font> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" color="#999999">Cidade</font><font size="1">:</font></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></td>
                        </tr>
                        <tr> 
                          <td height="30" colspan="8" valign="bottom"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            </font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font size="2" face="Times New Roman, Times, serif"><b><b><font size="2" color="#999999"><font size="1">Telefone:</font></font></b></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font><font size="2" face="Times New Roman, Times, serif"><b><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            <font size="1" color="#999999"><b><font face="Times New Roman, Times, serif"><b><font face="Times New Roman, Times, serif"></font></b></font></b></font></font></font></b></font></font><font size="1" color="#999999">Tipo:</font></b></b></font><font face="Arial, Helvetica, sans-serif"><b> 
                            <font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b> 
                            <? echo $data_nasc_clie; ?>
                            </b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font face="Times New Roman, Times, serif" size="2"><b><font size="1"></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font><font size="2"> 
                            </font></b><font size="2" face="Times New Roman, Times, serif"></font></td>
                        </tr>
                        <tr> 
                          <td height="77" colspan="8"><font size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1"><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font face="Arial, Helvetica, sans-serif"><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2"><b><font face="Times New Roman, Times, serif" size="1">&nbsp;&nbsp;</font></b> 
                            </font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font></b></font></b></font></b></font></font></b></font></font></b></font><font face="Times New Roman, Times, serif" size="2"><b>Observa&ccedil;&atilde;o: 
                            <textarea name="txt_obs_clie" rows="2" cols="63"></textarea>
                            </b></font></td>
                        </tr>
                        <tr> 
                          <td width="100" height="54"><font size="2"><b></b><font color="#FF0000"><strong><b><font size="2" face="Times New Roman, Times, serif">&nbsp;&nbsp;</font></b> 
                            *</strong></font></font><font size="1"> campo obrigat&oacute;rio</font></td>
                          <td height="54" width="113">&nbsp;</td>
                          <td height="54" width="53">&nbsp;</td>
                          <td height="54" width="42" valign="top">&nbsp;</td>
                          <td width="136" valign="top">&nbsp;</td>
                          <td width="78" height="54" valign="top"> 
                            <div align="center"><a href="index_cad_clie.php"><img src="../../imagens/botao_limpar.gif" width="47" height="47" border="0"></a></div>
                          </td>
                          <td width="48" height="54" valign="top"> 
                            <div align="right"><a href="javascript:gravar()"><img src="../../imagens/btn_gravar.gif" width="47" height="48" border="0"></a></div>
                          </td>
                          <td height="54" width="62" valign="middle"> 
                            <div align="center"><a href="../../index_menu.php"><img src="../../imagens/botao_sair.gif" width="30" height="39" border="0"></a></div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr bordercolor="#cccccc"> 
              <td valign="bottom" align="center" width="130" height="41"> 
                <div align="left"><font size="1"><a href="http://www.livresys.com.br" target="_blank"><img src="../../imagens/logo_livresys_peq.jpg" width="116" height="52" border="0" alt="Acessa o site da Livresys"></a><br>
                  <font color="#999999">&copy; Todos os direitos reservados</font></font> 
                </div>
              </td>
              <td valign="bottom" align="center" width="398" height="41"> 
                <div align="center"><font size="1" color="#999999">Usu&aacute;rio 
                  Logado</font><font size="1"><font color="#000000"> 
                  <? echo $usuario; ?>
                  <font color="#999999">|</font> </font><font color="#FFFFFF"><font color="#999999">IP 
                  da M&aacute;quina:</font></font><font color="#666666"><font color="#000000"> 
                  <? echo $ip = getenv("REMOTE_ADDR")?>
                  <font color="#999999">| Data:</font></font></font></font><font size="1"><font color="#FFFFFF"> 
                  <font color="#999999"> <font color="#000000"> </font><font size="1"><font color="#FFFFFF"><font color="#999999"><font color="#000000"> 
                  <? $h = getdate(); //variavel recebe a data
$data_atual = $hoje = $h['mday']."/".$mes = $h['mon']."/".$ano = $h['year'];
echo $data_atual;
?>
                  </font></font></font></font><font color="#000000"><font color="#999999">|</font></font></font></font><font color="#999999"> 
                  Hor&aacute;rio:</font><font color="#666666"> <font color="#000000"> 
                  <? $ha=date("H");
               echo $date =date("$ha:i"); ?>
                  </font></font></font></div>
              </td>
              <td valign="bottom" align="center" width="120" height="41"> 
                <div align="right"><a href="../../index_menu.php"><img src="../../imagens/titulo_pet_livre_peq.jpg" width="120" height="59" alt="Volta ao menu inicial" border="0"></a> 
                </div>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </td>
  </tr>
</table>
  
</body>
</html>