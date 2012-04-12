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
//####################################    CAD ANIMAL  #############################################
//####################################                #############################################
//#################################################################################################



// -------------------------------  CAD ANIMAL  ------------------------------------



function gravar_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_nome_animal.value =="" || document.form.txt_nome_animal.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (NOME).\n\n");
document.form.txt_nome_animal.focus();
return;
}

if (document.form.txt_raca.value =="" || document.form.txt_raca.value ==" "){
alert("                   Atenção!\n\nÉ necessário selecionar o campo (RAÇA).\n\n");
document.form.txt_raca.focus();
return;
}

if (document.form.sel_sexo.value =="" || document.form.sel_sexo.value ==" "){
alert("                   Atenção!\n\nÉ necessário selecionar o campo (SEXO).\n\n");
document.form.sel_sexo.focus();
return;
}

if (document.form.txt_dono.value =="" || document.form.txt_dono.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (PROPRIETÁRIO).\n\n");
document.form.txt_dono.focus();
return;
}

if(ok)
{
document.form.action='checagem/insere_cad_animal.php';
document.form.target="_self";
document.form.submit();
}
}










function alterar_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_nome_animal.value =="" || document.form.txt_nome_animal.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (NOME).\n\n");
document.form.txt_nome_animal.focus();
return;
}

if (document.form.txt_raca.value =="" || document.form.txt_raca.value ==" "){
alert("                   Atenção!\n\nÉ necessário selecionar o campo (RAÇA).\n\n");
document.form.txt_raca.focus();
return;
}

if (document.form.sel_sexo.value =="" || document.form.sel_sexo.value ==" "){
alert("                   Atenção!\n\nÉ necessário selecionar o campo (SEXO).\n\n");
document.form.sel_sexo.focus();
return;
}

if (document.form.txt_dono.value =="" || document.form.txt_dono.value ==" "){
alert("                   Atenção!\n\nÉ necessário preencher o campo (PROPRIETÁRIO).\n\n");
document.form.txt_dono.focus();
return;
}

if(ok)
{
document.form.action='checagem/insere_cad_animal.php';
document.form.target="_self";
document.form.submit();
}
}














function chk_dados_sair_animal()
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












function chk_dados_sair_animal2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../animal/chk_dados_sair.php';
document.form.target="_self";
document.form.submit();
}
}

function popup_consulta_cad_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();


var minhapopup = window.open("busca_cad_animal.php","pop_consulta","width=420,height=150,scrollbars=auto,status=0");
minhapopup.focus();
}

// GRAVA AS VARIÁVEIS EM SESSIONS E FECHA POPUP
function busca_animal()
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
document.frmAjax.action='checagem/fecha_popup_busca_animal.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}



// ABRE A POPUP
function mostra_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


var minhapopup = window.open("mostra_clie.php","pop_mostra_clie","width=440,height=150,scrollbars=yes,status=0");
document.form.target='pop_mostra_clie';
document.form.action='mostra_clie.php';
document.form.submit();
minhapopup.focus();
}


function gera_tela_cliente_animal_antes_de_fechar()
{
document.frmAjax.action='../clie/func_tela_cliente_animal.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}

function fechar_popup_mostra_clie()
{
window.opener.focus();
self.close();
}




























function visualizar_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


document.form.action='cad_animal_ver_alterar.php';
document.form.target="_self";
document.form.submit();
}	



// -------------------------------------------------------------------------------------



function valida_campos_animal(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc.value !=""){

if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}


if(ok)
{
document.form.action='../foto_webcam/upload_animal.php';
document.form.target="_self";
document.form.submit();
}
}
























// ----------------------------  CAD RAÇA  ------------------------------------


function cad_raca()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

var minhapopup = window.open('raca/grava_variaveis_bd.php','pop_raca','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='raca/grava_variaveis_bd.php';
document.form.target="pop_raca";
document.form.submit();
minhapopup.focus();
}

function foto_cad_raca()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

var minhapopup = window.open('../animal/raca/grava_variaveis_bd.php','pop_raca2','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../animal/raca/grava_variaveis_bd.php';
document.form.target="pop_raca2";
document.form.submit();
minhapopup.focus();
}

function gravar_raca()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.frmAjax.txt_raca.value ==""){alert ("Campo Raça sem preenchimento");}
else


if(ok)
{
document.frmAjax.action='insere_cad_raca.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}

function alterar_raca()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='checa_raca.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function alterar_raca2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_raca.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function excluir_raca()
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
document.frmAjax.action='deleta_raca.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}

































// ---------------------------  FOTO ANIMAL  -----------------------------------------

//TEMPLATE FOTO CAD ANIMAL VER ALTERAR

// BOTÃO ANEXAR FOTO

function anexa_foto_cad_animal_ver_alterar(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

if(ok)
{
document.form.action='../foto_webcam/upload_animal.php';
document.form.target="_self";
document.form.submit();
}
}

//BOTÃO ALTERAR

function volta_para_alterar_foto_ver_altera_cad_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

// BOTÃO EXCLUIR

function exclui_foto_cad_animal_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto_animal_alteracao.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}



// TEMPLATE ALTERAR FOTO CAD ANIMAL VER ALTERAR

// BOTAO ANEXAR

function anexa_foto_cad_animal_ver_alterar(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

if(ok)
{
document.form.action='../foto_webcam/upload_animal.php';
document.form.target="_self";
document.form.submit();
}
}

// BOTAO VOLTAR

function alterar_foto_ver_altera_cad_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){

if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

document.form.action='../animal/checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}



























function btn_alterar_foto_cad_animal_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

//----------------------------------------------------------------------------
//BOTAO EXCLUIR FOTO CAD ANIMAL VER ALTERAR

function btn_excluir_foto_cad_animal_ver_alterar()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto_animal_alteracao.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}
//----------------------------------------------------------------------------

//BOTÃO ANEXAR FOTO CAD_ANIMAL_VER_ALTERAR (QUANDO NÃO TINHA FOTO - 1ª VEZ)

function btn_anexar_foto_cad_animal_ver_alterar_1_vez(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if(ok)
{
document.form.action='../foto_webcam/upload_animal.php';
document.form.target="_self";
document.form.submit();
}
}
//---------------------------------------------------------------------------------------
//BOTÃO ANEXAR FOTO CAD ANIMAL VER ALTERAR (QUANDO JÁ EXISTIA FOTO - 2 VEZ)

function btn_anexar_foto_cad_animal_ver_alterar_2_vez(){
var digits="0123456789"
var temp 
var ok = true;
var f = ""

        if (document.form.balizador.value == ""){
        alert ("                 Atenção!\n\nNão se esqueça de anexar a fotografia.\n\n") 
                  form.document.balizador.focus();
                   return false;
}

if(ok)
{
document.form.action='../foto_webcam/upload_animal.php';
document.form.target="_self";
document.form.submit();
}
}
//---------------------------------------------------------------------------------------
















function altera_foto_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){

if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return;
}
}

document.form.action='checagem/grava_variaveis_bd_alt_foto.php';
document.form.target="_self";
document.form.submit();
}

function exclui_foto_animal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_data_nasc.value !=""){
if (document.form.txt_data_nasc.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc.value="";
                 document.form.txt_data_nasc.focus();
                   return false;
}
}

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto_animal.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}

function altera_foto_animal2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='../foto_webcam/index_altera_foto_animal2.php';
document.form.target="_self";
document.form.submit();
}

function voltar_cad_animal_foto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='../animal/cad_animal_refresh.php';
document.form.target="_self";
document.form.submit();
}

function voltar_cad_animal_foto2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='../animal/cad_animal_ver_alterar_refresh.php';
document.form.target="_self";
document.form.submit();
}



function exclui_foto_animal_alteracao_definitiva()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(confirm("                Atenção!\n\nConfirma a exclusão desta fotografia?\n\n      Caso positivo, clique em OK.\n")){
document.form.action='../foto_webcam/deleta_foto_animal_alteracao_tab.php';
document.form.target="_self";
document.form.submit();
}
else{
document.form.btn_excl_foto.focus();

}	
}

// ------------------------------------------------------------------------------------

function voltar_ver_altera_clie()
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

document.form.action='../clie/cad_clie_ver_alterar_refresh.php';
document.form.target="_self";
document.form.submit();
}


// --------------------------------------  CAD COR  -----------------------------------

function cad_cor()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""
var minhapopup = window.open('cor/grava_variaveis_bd.php','pop_cor','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='cor/grava_variaveis_bd.php';
document.form.target="pop_cor";
document.form.submit();
minhapopup.focus();

}


function foto_cad_cor()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""
var minhapopup = window.open('../animal/cor/grava_variaveis_bd.php','pop_cor2','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../animal/cor/grava_variaveis_bd.php';
document.form.target="pop_cor2";
document.form.submit();
minhapopup.focus();

}

function gravar_cor()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.frmAjax.txt_cor.value ==""){alert ("Campo Cor sem preenchimento");}
else

document.frmAjax.action='insere_cad_cor.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}

function alterar_cor()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='checa_cor.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
minhapopup.focus();

}	

function alterar_cor2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_cor.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function excluir_cor()
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
document.frmAjax.action='deleta_cor.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}
// ------------------------------------------------------------------------------------
