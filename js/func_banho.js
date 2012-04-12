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




function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
	documento.value += texto.substring(0,1);
  }
  
}

//#################################################################################################
//####################################                #############################################
//####################################    CAD BANHO   #############################################
//####################################                #############################################
//#################################################################################################


// CADASTRO DE BANHO E TOSA INICIAL
// COMBO SEL NOME CLIE
function combo_sel_dados_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.sel_nome_clie.value =="" || document.form.sel_nome_clie.value ==" "){
alert("               Atenção!\n\nNome do cliente não selecionado.\n\n");
document.form.sel_nome_clie.focus();
return;
}


if(ok)
{
document.form.action='checagem/sel_dados_clie.php';
document.form.target="_self";
document.form.submit();
}
}

// COMBO SEL NOME ANIMAL
function combo_sel_dados_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.sel_nome_animal.value =="" || document.form.sel_nome_animal.value ==" "){
alert("               Atenção!\n\nNome do animal não selecionado.\n\n");
document.form.sel_nome_animal.focus();
return;
}


if(ok)
{
document.form.action='checagem/sel_dados_animal.php';
document.form.target="_self";
document.form.submit();
}
}


// TXT CODIGO CLIE BUSCA
function localz_clie_cod()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_id_clie.value =="" || document.form.txt_id_clie.value ==" "){
alert("               Atenção!\n\nCódigo do cliente não foi preenchido.\n\n");
document.form.txt_id_clie.focus();
return;
}


if(ok)
{
document.form.action='checagem/sel_dados_clie_txt_cod.php';
document.form.target="_self";
document.form.submit();
}
}

// POPUP CADASTRAR O CLIENTE


function cad_clie_banho()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


var minhapopup = window.open("cad_clie_banho.php","pop_cad_clie_banho","width=755,height=340,scrollbars=no,status=0");
document.form.target='pop_cad_clie_banho';
document.form.action='cad_clie_banho.php';
document.form.submit();
minhapopup.focus();
}























// CAD CLIE BANHO  ----   BAIRRO

function cad_bairro_cad_clie_banho()
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

var minhapopup = window.open('../../cadastros/clie/bairro/grava_variaveis_bd.php','pop_bairro','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../../cadastros/clie/bairro/grava_variaveis_bd.php';
document.form.target="pop_bairro";
document.form.submit();
minhapopup.focus();

}

// CAD CLIE BANHO  ----   CIDADE

function cad_cidade_cad_clie_banho()
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


var minhapopup = window.open('../../cadastros/clie/cidade/grava_variaveis_bd.php','pop_cidade','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../../cadastros/clie/cidade/grava_variaveis_bd.php';
document.form.target="pop_cidade";
document.form.submit();
minhapopup.focus();
}

function chk_dados_sair_cad_banho_clie()
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

function gravar_clie_cad_banho_clie()
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



//BTN_VOLTAR CAD BANHO E TOSA
function voltar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../banho_todos.php';
document.form.target="_self";
document.form.submit();
}
}


