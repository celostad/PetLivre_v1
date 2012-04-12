//doi style
  var mm1 = new TMainMenu('mm1','horizontal');
        var pmSep10 = new TPopMenu('-','','','','');
  
  var pmDemo10 = new TPopMenu('Cadastros','0','','','Cadastros de clientes, animais, fornecedores');
    var pm_clie10 = new TPopMenu('<u>C</u>lientes','','a','cadastros/clie/cad_clie_todos.php','Cadastra e altera cliente');
    var pm_animal10 = new TPopMenu('<u>A</u>nimal','','a','cadastros/animal/cad_animal_todos.php','Cadastra e altera Animal');
    var pm_fornec10 = new TPopMenu('<u>F</u>ornecedor','','','','Cadastra e altera Fornecedor');
  
  var pm_banho10 = new TPopMenu('Banho e Tosa','0','','','Movimento do Banho e Tosa');
      var pm_banho_agenda = new TPopMenu('Agenda','','','','Agenda do Banho e Tosa');
      var pm_banho_entrada = new TPopMenu('Entrada','','a','banho_tosa/entrada/index_entrada_bt.php','Entrada do Banho e Tosa');
      var pm_banho_pesquisa = new TPopMenu('Pesquisa','','','','Pesquisa');

  var pm_veterinario10 = new TPopMenu('Veterinário','0','','','Controle do Veterinário');
  
  var pm_estoque10 = new TPopMenu('Estoque','0','','','Controle de entrada e sada do Estoque');

  var pm_vendas10 = new TPopMenu('Vendas','0','','','Inicia o terminal de Vendas');

  var pm_financeiro10 = new TPopMenu('Financeiro','0','','','Movimento de contas a pagar - receber');

  var pm_relatorios10 = new TPopMenu('Relatórios','0','','','Imprime relatrios em geral');

  var pm_utilitarios10 = new TPopMenu('Utilitários','0','','','Backup, calculadora, etc');
  var pmAbout10 = new TPopMenu('Sobre...','','f',"alert('      Pet Livre v.1.0\\nTodos os direitos reservados\\n      &copy; 2007 - 2008\\n www.livresys.com.br')",'Sobre este programa');

  var pm_sair10 = new TPopMenu('Sair','0','a','javascript:sair();','Saida do Sistema Pet Livre');
  
  mm1.Add(pmDemo10);
  pmDemo10.Add(pm_clie10);
  pmDemo10.Add(pm_animal10);
  pmDemo10.Add(pm_fornec10);
  
  mm1.Add(pm_banho10);
      pm_banho10.Add(pm_banho_agenda);
      pm_banho10.Add(pm_banho_entrada);
      pm_banho10.Add(pm_banho_pesquisa);
	  
  mm1.Add(pm_veterinario10); 

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