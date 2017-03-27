<?php
echo "
<script>
//custom style 2
var mm3 = new TMainMenu('mm3','vertical');

  
var pmhome35 = new TPopMenu('Principal','".$pontos."imagens/botao_menu/home.gif','a','".$pt_lk_pg."index_menu.php','Retorna a tela inicial');


var pmopcao_user = new TPopMenu('Usu&aacute;rios','".$pontos."imagens/botao_menu/usuarios.gif','','','Menu de Usu&aacute;rios');
	var pmopcao_user_caduser = new TPopMenu('Cadastro de usu&aacute;rio','','a','".$pt_lk_pg."caduser/index_caduser.php','Cadastra novo usu&aacute;rio');

var pmcartao30 = new TPopMenu('Cart&atilde;o','".$pontos."imagens/botao_menu/cartao.gif','','','');
    var pmcartao30_lanca = new TPopMenu('Lan&ccedil;ar Movimento','','a','".$pt_lk_pg."relatorios/bt_periodo/index_bt_periodo.php','Lança os movimentos diarios do cartão');
	var pmcartao30_visualizar = new TPopMenu('Visualizar movimentos','','a','".$pt_lk_pg."caixa/movimento/index_movimento.php','Movimento do Caixa por período');    

var pmrelatorios30 = new TPopMenu('Relat&oacute;rios','".$pontos."imagens/botao_menu/ramo.gif','','','');
    var pmrelatorios30_movibanho = new TPopMenu('Banho e Tosa','','a','".$pt_lk_pg."relatorios/bt_periodo/index_bt_periodo.php','Movimento do Banho e Tosa por período');
	var pmrelatorios30_movicaixa = new TPopMenu('Caixa','','a','".$pt_lk_pg."relatorios/movimento/index_movimento.php','Movimento do Caixa por período');
	var pmrelatorios30_mensalista = new TPopMenu('mensalista','','a','".$pt_lk_pg."relatorios/mensalista/index_mensalista.php','Movimento dos Mensalistas');
	





  mm3.Add(pmhome35);
  
  mm3.Add(pmcartao30);
  	pmcartao30.Add(pmcartao30_lanca);
  	pmcartao30.Add(pmcartao30_visualizar);
	
	mm3.Add(pmopcao_user);
  	pmopcao_user.Add(pmopcao_user_caduser);
  
  mm3.Add(pmrelatorios30);
	pmrelatorios30.Add(pmrelatorios30_movibanho);
	pmrelatorios30.Add(pmrelatorios30_movicaixa);
	pmrelatorios30.Add(pmrelatorios30_mensalista);
	
//end of custom style 2
</script>
";

/*

var pmvet30 = new TPopMenu('Veterinário','".$pontos."imagens/botao_menu/veterinaria.gif','','','');



	
	
	
	mm3.Add(pmcadastro30);
    pmcadastro30.Add(pmcadclie30);
    pmcadastro30.Add(pmcadanimal30);
    pmcadastro30.Add(pmcadforn30);
 
  mm3.Add(pmcaixa30);
	pmcaixa30.Add(pmcaixa_incluir30);
    pmcaixa30.Add(pmcaixa_saida30);
    pmcaixa30.Add(pmcaixa_visualizar30);
    pmcaixa30.Add(pmcaixa_fechar30);


  mm3.Add(pmbanho30);
    pmbanho30.Add(pmbanhoagenda30);
    pmbanho30.Add(pmbanhoincluir30);
    pmbanho30.Add(pmbanhopesq30);
	
  mm3.Add(pmvet30);


	
  mm3.Add(pmrelatorios30);
	pmrelatorios30.Add(pmrelatorios30_movimento30);

*/




?>
