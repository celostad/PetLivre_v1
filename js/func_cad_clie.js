function gravar_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='checagem/insere_cad_clie.php';
document.form.target="_self";
document.form.submit();

}




function checar(pagina,texto) { if (confirm("Apagar este Cliente?")==true) { window.location=pagina; } }


function sair_form()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='index_cad_clie.php';
document.form.target="_self";
document.form.submit();
}
}

function sair_form_retorna_vindo_cad_pet()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../pet/index_cad_pet.php';
document.form.target="_self";
document.form.submit();
}
}

function sair_form_retorna_vindo_busca_pet()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../pet/index_resultado_busca_pet.php';
document.form.target="_self";
document.form.submit();
}
}

function sair_form_retorna_vindo_busca_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='index_resultado_busca_clie.php';
document.form.target="_self";
document.form.submit();
}
}

// ---------------------------------    B U S C A S      -------------------------------------

// TELA CAD CLIE TODOS


// ABRE A POPUP
function popup_consulta_cad_clie()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();

var minhapopup = window.open("busca_cad_clie.php","pop_consulta","width=500,height=90,scrollbars=auto,status=0");
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


// ------------------------------------------------------------------------------------
// ----------------------------------  FOTO CAD CLIE   --------------------------------
// ABRE A POPUP
function popup_anexa_foto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();

var minhapopup = window.open("popup_anexa_foto.php","pop_post_anexa_foto","width=240,height=200,scrollbars=no,status=0");
/*
document.form.action='checagem/fecha_popup_busca_clie.php';
document.form.target="_self";
document.form.submit();
*/
minhapopup.focus();
}



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


if(ok)
{
document.form.action='foto/upload.php';
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

var minhapopup = window.open('../clie/bairro/grava_variaveis_bd.php','pop_bairro','width=550,height=220,scrollbars=yes,status=0,top=0,left=100');
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

var minhapopup = window.open('../clie/cidade/grava_variaveis_bd.php','pop_cidade','width=550,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='../clie/cidade/grava_variaveis_bd.php';
document.form.target="pop_cidade";
document.form.submit();
minhapopup.focus();
}

// ------------------------------------------------------------------------------------

// --  BAIRRO

function incluir_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.form.txt_bairro_clie.value =="-- Incluir  /  Alterar --"){
if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

var minhapopup = window.open('bairro/grava_variaveis_bd.php','pop_bairro','width=550,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='bairro/grava_variaveis_bd.php';
document.form.target="pop_bairro";
document.form.submit();
minhapopup.focus();

}
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



// CIDADE




function incluir_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.form.txt_cidade_clie.value =="-- Incluir  /  Alterar --"){
if (document.form.txt_data_nasc_clie.value !=""){

if (document.form.txt_data_nasc_clie.value.length <10){
        alert ("                 Atenção!\n\nData de nascimento inválida!\n\n") 
                 document.form.txt_data_nasc_clie.value="";
                 document.form.txt_data_nasc_clie.focus();
                   return;
}
}

var minhapopup = window.open('cidade/grava_variaveis_bd.php','pop_bairro','width=550,height=220,scrollbars=yes,status=0,top=0,left=100');
document.form.action='cidade/grava_variaveis_bd.php';
document.form.target="pop_bairro";
document.form.submit();
minhapopup.focus();

}
}

function gravar_cidade()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.frmAjax.txt_cidade.value ==""){alert ("Campo Cidade sem preenchimento");}
else

document.frmAjax.action='insere_cad_cidade.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
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
minhapopup.focus();

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

if (document.frmAjax.rad_sel.checked=="") {
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

