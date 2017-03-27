// -------------------------------  FINALIZA CAIXA  ------------------------------------
function sair_form()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='index_caixa.php';
document.form.target="_self";
document.form.submit();
}
}

function cad_entrada_caixa()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='entrada_caixa.php';
document.form.target="_self";
document.form.submit();
}
}

function cad_saida_caixa()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='saida_caixa.php';
document.form.target="_self";
document.form.submit();
}
}

function gravar_caixa()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


document.form.action='checagem/insere_entrada_caixa.php';
document.form.target="_self";
document.form.submit();

}

function gravar_saida_caixa()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='checagem/insere_saida_caixa.php';
document.form.target="_self";
document.form.submit();

}

function finalizar_caixa()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='checagem/func_finaliza_caixa.php';
document.form.target="_self";
document.form.submit();
}


// FORMATAR MOEDA

function Limpar(valor, validos) {
// retira caracteres invalidos da string
var result = "";
var aux;
for (var i=0; i < valor.length; i++) {
aux = validos.indexOf(valor.substring(i, i+1));
if (aux>=0) {
result += aux;
}
}
return result;
}

//Formata número tipo moeda usando o evento onKeyDown

function Formata(campo,tammax,teclapres,decimal) {
var tecla = teclapres.keyCode;
vr = Limpar(campo.value,"0123456789");
tam = vr.length;
dec=decimal

if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

if (tecla == 8 )
{ tam = tam - 1 ; }

if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )
{

if ( tam <= dec )
{ campo.value = vr ; }

if ( (tam > dec) && (tam <= 5) ){
campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 6) && (tam <= 8) ){
campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
}
if ( (tam >= 9) && (tam <= 11) ){
campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 12) && (tam <= 14) ){
campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 15) && (tam <= 17) ){
campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;}
} 

}
//Fim da Função FormataReais -->
//-------------------------------

// ----------------------------  CAD PRODUTO  ------------------------------------

function cad_produto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_produto.value =="-- Incluir  /  Alterar --"){

var minhapopup = window.open('produto/grava_variaveis_bd.php','pop_produto','width=520,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='produto/grava_variaveis_bd.php';
document.form.target="pop_produto";
document.form.submit();
minhapopup.focus();
}//fecha if	

if (document.form.txt_produto.value < 11){
	document.getElementById('esconde').style.visibility='visible';
	document.getElementById('esconde2').style.visibility='visible';
}else{
	document.getElementById('esconde').style.visibility='hidden';
	document.getElementById('esconde2').style.visibility='hidden';
}//fecha if	
}


function cad_material()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_material.value =="-- Incluir  /  Alterar --"){
var minhapopup = window.open('material/grava_variaveis_bd.php','pop_material','width=520,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='material/grava_variaveis_bd.php';
document.form.target="pop_material";
document.form.submit();
minhapopup.focus();
}//fecha if	

}

function gravar_produto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.frmAjax.txt_produto.value ==""){alert ("Campo PRODUTO sem preenchimento");}
else

if (document.frmAjax.sel_categoria.value ==""){alert ("Campo CATEGORIA sem preenchimento");}
else

document.frmAjax.action='insere_cad_produto.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}

function gravar_material()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.frmAjax.txt_material.value ==""){alert ("Campo MATERIAL sem preenchimento");}
else

if (document.frmAjax.sel_categoria.value ==""){alert ("Campo CATEGORIA sem preenchimento");}
else

document.frmAjax.action='insere_cad_material.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}

function alterar_produto()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='checa_produto.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
minhapopup.focus();

}	

function alterar_material()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='checa_material.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
minhapopup.focus();

}	
function alterar_produto2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_produto.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function alterar_material2()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.frmAjax.action='insere_altera_material.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}	

function excluir_produto()
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
document.frmAjax.action='deleta_produto.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}

function excluir_material()
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
document.frmAjax.action='deleta_material.php';
document.frmAjax.target="_self";
document.frmAjax.submit();
}
}
}

function visualiza_entrada()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='index_caixa.php';
document.form.target="_self";
document.form.submit();
}//fecha if	

function visualiza_saida()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='index_caixa_saida.php';
document.form.target="_self";
document.form.submit();
}//fecha if	


function sel_pet()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

var minhapopup = window.open('sel_pet/grava_variaveis_bd.php','pop_pet','width=490,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='sel_pet/grava_variaveis_bd.php';
document.form.target="pop_pet";
document.form.submit();
minhapopup.focus();
}//fecha if	


function popup_libera_total_caixa()
{
var digits="0123456789"
var temp
var ok = true;
var f = ""
var total_valor = document.form.valor.value;

var minhapopup = window.open('login_visual_total.php','pop_login','width=490,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='login_visual_total.php';
document.form.target="pop_login";
document.form.submit();
minhapopup.focus();

}//fecha function
