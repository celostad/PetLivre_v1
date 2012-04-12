<?php
echo "
<script>
//custom style 2
var mm3 = new TMainMenu('mm3','vertical');
  
var pmhome35 = new TPopMenu('Principal','".$pontos."imagens/botao_menu/home.gif','a','".$pt_lk_pg."index_menu.php','Retorna a tela inicial');

var pmcadastro30 = new TPopMenu('Cadastros','".$pontos."imagens/botao_menu/cadastro.gif','','','');
	var pmcadclie30 = new TPopMenu('Clientes','".$pontos."imagens/botao_menu/cliente.gif','a','".$pt_lk_pg."cadastros/clie/index_cad_clie.php','Cadastro de Clientes'); 
	var pmcadanimal30 = new TPopMenu('Pet','".$pontos."imagens/botao_menu/animal.gif','a','".$pt_lk_pg."cadastros/pet/index_cad_pet.php','Cadastra o Pet');
	var pmcadforn30 = new TPopMenu('Fornecedor','".$pontos."imagens/botao_menu/fornecedor1.gif','a','".$pt_lk_pg."cadastros/forne/index_cad_forne.php','Cadastro Fornecedores');

var pmcaixa30 = new TPopMenu('Caixa','".$pontos."imagens/botao_menu/caixa.gif','','','');
    var pmcaixa_incluir30 = new TPopMenu('Entrada','','a','".$pt_lk_pg."caixa/entrada_caixa.php','Entrada no livro caixa');
	var pmcaixa_saida30 = new TPopMenu('Saída','','a','".$pt_lk_pg."caixa/saida_caixa.php','Saída do livro caixa'); 
	var pmcaixa_visualizar30 = new TPopMenu('Visualizar','','a','".$pt_lk_pg."caixa/index_caixa.php','Visualizar livro caixa'); 
	var pmcaixa_pendentes30 = new TPopMenu('Pendentes','','a','".$pt_lk_pg."caixa/pendentes/index_pendentes.php','Visualiza os pendentes do caixa');
	var pmcaixa_fechar30 = new TPopMenu('Fechamento','','a','".$pt_lk_pg."caixa/index_fechamento.php','Fechar o movimento do livro caixa no dia'); 
 
var pmMensalista = new TPopMenu('Mensalista','".$pontos."imagens/botao_menu/mensalista.gif','','','');
	var pmMensalista_lancar = new TPopMenu('Entrada','','a','".$pt_lk_pg."mensalista/entrada_mensalista.php','Lança os movimentos do Mensalista');
    var pmMensalista_paga = new TPopMenu('Pagamento','','a','".$pt_lk_pg."mensalista/index_pag_mensalista.php','Pagamento do mensalista');
    var pmMensalista_visual = new TPopMenu('Visualizar','','a','".$pt_lk_pg."mensalista/index_mensalista.php','Visualiza os movimentos do dia Mensalista');
    var pmMensalista_relacao = new TPopMenu('Relação','','a','".$pt_lk_pg."mensalista/index_relacao_mensalista.php','Visualiza os mensalistas');


  mm3.Add(pmhome35);
    
  mm3.Add(pmcadastro30);
    pmcadastro30.Add(pmcadclie30);
    pmcadastro30.Add(pmcadanimal30);
    pmcadastro30.Add(pmcadforn30);
 
  mm3.Add(pmcaixa30);
	pmcaixa30.Add(pmcaixa_incluir30);
    pmcaixa30.Add(pmcaixa_saida30);
    pmcaixa30.Add(pmcaixa_visualizar30);
    pmcaixa30.Add(pmcaixa_pendentes30);
    pmcaixa30.Add(pmcaixa_fechar30);

mm3.Add(pmMensalista);
    pmMensalista.Add(pmMensalista_lancar);
	pmMensalista.Add(pmMensalista_paga);
	pmMensalista.Add(pmMensalista_visual);
	pmMensalista.Add(pmMensalista_relacao);
    
    
//end of custom style 2
</script>";


/*
    
	
var pmbanho30 = new TPopMenu('Banho & Tosa','".$pontos."imagens/botao_menu/banho.gif','','','');
    var pmbanhoincluir30 = new TPopMenu('Incluir','','a','".$pt_lk_pg."banho_tosa/entrada/entrada_banho_tosa.php','Entrada do Banho e Tosa');
    var pmbanhopesq30 = new TPopMenu('Pesquisar','','','','Home');

var pmvet30 = new TPopMenu('Veterinário','".$pontos."imagens/botao_menu/veterinaria.gif','','','');



  mm3.Add(pmvet30);
  
  mm3.Add(pmagenda);
    pmagenda.Add(pmagendatel);
    pmagenda.Add(pmagendabt30);

  mm3.Add(pmbanho30);
    pmbanho30.Add(pmbanhoagenda30);
    pmbanho30.Add(pmbanhoincluir30);
    pmbanho30.Add(pmbanhopesq30);
	

*/

?>
