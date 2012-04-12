//MÁSCARA DE VALORES

function txtBoxFormat(objeto, sMask, evtKeyPress) {
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;


if(document.all) { // Internet Explorer
    nTecla = evtKeyPress.keyCode;
} else if(document.layers) { // Nestcape
    nTecla = evtKeyPress.which;
} else {
    nTecla = evtKeyPress.which;
    if (nTecla == 8) {
        return true;
    }
}

    sValue = objeto.value;

    // Limpa todos os caracteres de formatação que
    // já estiverem no campo.
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( " ", "" );
    fldLen = sValue.length;
    mskLen = sMask.length;

    i = 0;
    nCount = 0;
    sCod = "";
    mskLen = fldLen;

    while (i <= mskLen) {
      bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/") || (sMask.charAt(i) == ":"))
      bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

      if (bolMask) {
        sCod += sMask.charAt(i);
        mskLen++; }
      else {
        sCod += sValue.charAt(nCount);
        nCount++;
      }

      i++;
    }

    objeto.value = sCod;

    if (nTecla != 8) { // backspace
      if (sMask.charAt(i-1) == "9") { // apenas números...
        return ((nTecla > 47) && (nTecla < 58)); }
      else { // qualquer caracter...
        return true;
      }
    }
    else {
      return true;
    }
  }
//Telefone:<input type="text" size="20" onkeypress="return txtBoxFormat(this, '(99)9999-9999', event);">


  function Dados(valor) {
      //verifica se o browser tem suporte a ajax
	  try {
         ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch(e) {
         try {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
         }
	     catch(ex) {
            try {
               ajax = new XMLHttpRequest();
            }
	        catch(exc) {
               alert("Esse browser não tem recursos para uso do Ajax");
               ajax = null;
            }
         }
      }
	  //se tiver suporte ajax
	  if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros são excluídos
		 document.forms[0].listCidades.options.length = 1;
	     
		 idOpcao  = document.getElementById("opcoes");
		 
	     ajax.open("POST", "cidades.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOpcao.innerHTML = "Carregando...!";   
	        }
			//após ser processado - chama função processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXML(ajax.responseXML);
			   }
			   else {
			       //caso não seja um arquivo XML emite a mensagem abaixo
				   idOpcao.innerHTML = "--Primeiro selecione o estado--";
			   }
            }
         }
		 //passa o código do estado escolhido
	     var params = "estado="+valor;
         ajax.send(params);
      }
   }
   
   function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        idOpcao.innerHTML = "-- Selecione --";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.forms[0].listCidades.options.add(novo);
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOpcao.innerHTML = "--Primeiro selecione o estado--";
	  }	  
   }



function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
	documento.value += texto.substring(0,1);
  }
  
}

//--------------------------------------  Função SAIR   -------------------------------

function sair(){

if(confirm("           Atenção!\n\nConfirma a saída do sistema?\n\n")){
document.form.action='../logout.php';
document.form.target='_self';
document.form.submit();
}
}

function sair_cad_clie(){

if(confirm("           Atenção!\n\nConfirma a saída do sistema?\n\n")){
document.form.action='../../../logout.php';
document.form.target='_self';
document.form.submit();
}
}

/*
  #################################################################################################
  ####################################                #############################################
  ####################################    CAD CLIE    #############################################
  ####################################                #############################################
  #################################################################################################
*/  



//-------------------------------    Gravar  ---------------------------



function gravar_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_nome_clie.value =="" || document.form.txt_nome_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (NOME).\n\n");
document.form.txt_nome_clie.focus();
return;
}


if (document.form.txt_end_clie.value =="" || document.form.txt_end_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (ENDEREÇO).\n\n");
document.form.txt_end_clie.focus();
return;
}

if (document.form.txt_bairro_clie.value =="" || document.form.txt_bairro_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (BAIRRO).\n\n");
document.form.txt_bairro_clie.focus();
return;
}

if (document.form.txt_cidade_clie.value =="" || document.form.txt_cidade_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (CIDADE).\n\n");
document.form.txt_cidade_clie.focus();
return;
}

if (document.form.txt_tel_clie.value =="" && document.form.txt_cel_clie.value ==""){
alert("                               Atenção!\n\nÉ necessário preencher pelo menos 01(um) dos Telefones.\n\n");
document.form.txt_ddd_tel_clie.focus();
return;
}

if (document.form.txt_tel_clie.value !=""){
if (document.form.txt_ddd_tel_clie.value =="" || document.form.txt_ddd_tel_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");
document.form.txt_ddd_tel_clie.focus();
return;
}
if (document.form.txt_tel_clie.value.length < 9){
alert("                               Atenção!\n\nO Telefone inserido é invalido ou tem poucos caracteres.\n\n");
document.form.txt_tel_clie.focus();
return;
}
}

if (document.form.txt_cel_clie.value !=""){
if (document.form.txt_ddd_cel_clie.value =="" || document.form.txt_ddd_tel_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");
document.form.txt_ddd_cel_clie.focus();
return;
}
if (document.form.txt_cel_clie.value.length < 9){
alert("                               Atenção!\n\nO Celular inserido é invalido ou tem poucos caracteres.\n\n");
document.form.txt_cel_clie.focus();
return;
}
}

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("              Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}


if (document.form.txt_rg_clie.value =="" || document.form.txt_rg_clie.value ==" "){
if(confirm("               Atenção!\n\nConfirma a inclusão do cadastro sem RG?\n\n   Caso positivo, clique em OK.\n\n")){
document.form.action='checagem/insere_cad_clie.php';
document.form.target="_self";
document.form.submit();
}
}else{
document.form.action='checagem/insere_cad_clie.php';
document.form.target="_self";
document.form.submit();
}
}

function chk_dados_sair_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='chk_dados_sair.php';
document.form.target="_self";
document.form.submit();
}
}


//--------------------------------------  ALTERAR  -------------------------------------------------

function alterar_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_nome_clie.value =="" || document.form.txt_nome_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (NOME).\n\n");
document.form.txt_nome_clie.focus();
return;
}

if (document.form.txt_end_clie.value =="" || document.form.txt_end_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (ENDEREÇO).\n\n");
document.form.txt_end_clie.focus();
return;
}

if (document.form.txt_bairro_clie.value =="" || document.form.txt_bairro_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (BAIRRO).\n\n");
document.form.txt_bairro_clie.focus();
return;
}

if (document.form.txt_cidade_clie.value =="" || document.form.txt_cidade_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (CIDADE).\n\n");
document.form.txt_cidade_clie.focus();
return;
}

if (document.form.txt_tel_clie.value =="" && document.form.txt_cel_clie.value ==""){
alert("                               Atenção!\n\nÉ necessário preencher pelo menos 01(um) dos Telefones.\n\n");
document.form.txt_ddd_tel_clie.focus();
return;
}

if (document.form.txt_tel_clie.value !=""){
if (document.form.txt_ddd_tel_clie.value =="" || document.form.txt_ddd_tel_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");
document.form.txt_ddd_tel_clie.focus();
return;
}
if (document.form.txt_tel_clie.value.length < 9){
alert("                               Atenção!\n\nO Telefone inserido é invalido ou tem poucos caracteres.\n\n");
document.form.txt_tel_clie.focus();
return;
}
}

if (document.form.txt_cel_clie.value !=""){
if (document.form.txt_ddd_cel_clie.value =="" || document.form.txt_ddd_tel_clie.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (DDD-TEL).\n\n");
document.form.txt_ddd_cel_clie.focus();
return;
}
if (document.form.txt_cel_clie.value.length < 9){
alert("                               Atenção!\n\nO Celular inserido é invalido ou tem poucos caracteres.\n\n");
document.form.txt_cel_clie.focus();
return;
}
}

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}else{
document.form.action='checagem/insere_cad_clie.php';
document.form.target="_self";
document.form.submit();
}
}

function cad_clie_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='cad_clie_ver_alterar.php';
document.form.target="_self";
document.form.submit();
}	




// ABRE A POPUP
function mostra_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


var minhapopup = window.open("mostra_animal.php","pop_mostra_animal","width=440,height=150,scrollbars=yes,status=0");
document.form.target='pop_mostra_animal';
document.form.action='mostra_animal.php';
document.form.submit();
minhapopup.focus();
}


function gera_tela_animal_cliente_antes_de_fechar()
{
document.frmAjax.action='../animal/func_tela_animal_cliente.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}


function fechar_popup_mostra_animal()
{
window.opener.focus();
self.close();
}

// ---------------------------------------  B U S C A S --------------------------------------------

// TELA CAD CLIE TODOS


// ABRE A POPUP
function popup_consulta_cad_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();


var minhapopup = window.open("busca_cad_clie.php","pop_consulta","width=420,height=150,scrollbars=auto,status=0");
minhapopup.focus();
}

// GRAVA AS VARIÁVEIS EM SESSIONS E FECHA POPUP
function busca_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.frmAjax.sel_tipo_pesq.value =="" || document.frmAjax.sel_tipo_pesq.value ==" "){
alert ("Campo Tipo sem preenchimento");}
else

if (document.frmAjax.txt_descricao_pesq.value =="" || document.frmAjax.txt_descricao_pesq.value ==" "){alert ("Campo Descrição sem preenchimento");}
else

if(ok)
{
document.frmAjax.action='checagem/fecha_popup_busca_clie.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}

// MOSTRA O RESULTADO DA BUSCA 
function mostra_descricao_pesq() {

if (document.frmAjax.sel_tipo_pesq.value =="cpf") {
    document.frmAjax.txt_descricao_pesq.value="formatar('##/##/####', this)";
	
}
}


function busca_cad_clie_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();


var minhapopup = window.open("busca_clie_animal.php","pop","width=590,height=200,scrollbars=yes,status=0");
minhapopup.focus();
}

// -------------------------------  CAD BAIRRO  ------------------------------------


function cad_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

var minhapopup = window.open('bairro/grava_variaveis_bd.php','pop_bairro','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='bairro/grava_variaveis_bd.php';
document.form.target="pop_bairro";
document.form.submit();
minhapopup.focus();

}

function gravar_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.frmAjax.txt_bairro.value ==""){alert ("Campo Bairro sem preenchimento");}
else

document.frmAjax.action='insere_cad_bairro.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}

function alterar_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='checa_bairro.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
minhapopup.focus();

}	

function alterar_bairro2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_bairro.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function excluir_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.frmAjax.rad_sel.checked=="") {
alert("            Atenção!\n\n Não há item selecionado!\n");
document.frmAjax.rad_sel.focus();
}else{

if(confirm("               Atenção!\n\nConfirma a exclusão deste item?\n\n   Caso positivo, clique em OK.\n\n")){
document.frmAjax.action='deleta_bairro.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}

// -------------------------------  CAD CIDADE  ------------------------------------


function cad_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}


var minhapopup = window.open('cidade/grava_variaveis_bd.php','pop_cidade','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='cidade/grava_variaveis_bd.php';
document.form.target="pop_cidade";
document.form.submit();
minhapopup.focus();
}

function gravar_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.frmAjax.txt_cidade.value ==""){alert ("Campo Cidade sem preenchimento");}
else


if(ok)
{
document.frmAjax.action='insere_cad_cidade.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}

function alterar_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


document.frmAjax.action='checa_cidade.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	



function alterar_cidade2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_cidade.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function excluir_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.frmAjax.rad_sel.checked =="") {
alert("            Atenção!\n\n Não há item selecionado!\n");
document.frmAjax.rad_sel.focus();
}else{

if(confirm("               Atenção!\n\nConfirma a exclusão deste item?\n\n   Caso positivo, clique em OK.\n\n")){
document.frmAjax.action='deleta_cidade.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}

// ------------------------------------------------------------------------------------
// ----------------------------------  FOTO CAD CLIE   --------------------------------
function valida_campos(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}


if(ok)
{
document.form.action='../foto_webcam/upload.php';
document.form.target="_self";
document.form.submit();
}
}


function voltar_cad_clie_foto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

document.form.action='../clie/checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

function alterar_foto_ver_altera_cad_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

document.form.action='../clie/checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

function altera_foto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

function altera_foto_cad_clie_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

function volta_para_alterar_foto_ver_altera_cad_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}


function altera_foto2(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

if(ok)
{
document.form.action='alterar_foto.php';
document.form.target="_self";
document.form.submit();
}
}



function exclui_foto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return false;
}
}

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}

function exclui_foto_cad_clie_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}

function anexa_foto_cad_clie_ver_alterar(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

if(ok)
{
document.form.action='../foto_webcam/upload.php';
document.form.target="_self";
document.form.submit();
}
}

function foto_cad_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

var minhapopup = window.open('../clie/bairro/grava_variaveis_bd.php','pop_bairro','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../clie/bairro/grava_variaveis_bd.php';
document.form.target="pop_bairro";
document.form.submit();
minhapopup.focus();

}


function foto_cad_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc_clie.value !=""){
if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

var minhapopup = window.open('../clie/cidade/grava_variaveis_bd.php','pop_cidade','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../clie/cidade/grava_variaveis_bd.php';
document.form.target="pop_cidade";
document.form.submit();
minhapopup.focus();
}

// ------------------------------------------------------------------------------------


function Impressao( preVisualizar ) 
{
	var CorpoMensagem = document.body.innerHTML;
	document.body.innerHTML = ImprimirConteudo.innerHTML;
	if( preVisualizar ) 
	{
		PreVisualizar();
	} 
	else 
	{
		window.print();
	}
	document.body.innerHTML = CorpoMensagem;
}

function PreVisualizar() 
{
	try 
	{
		 //Utilizando o componente WebBrowser1 registrado no MS Windows Server 2000/2003 ou XP/Vista
		 var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
		 document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
		 WebBrowser1.ExecWB( 7, 1 ); 
		 WebBrowser1.outerHTML = ""; 
	} 
	catch(e) 
	{
		alert("Para visualizar a impressão você precisa habilitar o uso de controles ActiveX na página.");
		return;
	}
}
