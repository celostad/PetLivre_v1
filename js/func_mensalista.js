function sair_form()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='index_mensalista.php';
document.form.target="_self";
document.form.submit();
}
}

function cad_produto_mensal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if (document.form.txt_cod_prod.value =="-- Incluir  /  Alterar --"){

var minhapopup = window.open('produto/grava_variaveis_bd.php','pop_produto','width=490,height=300,scrollbars=yes,status=0,top=0,left=100');
document.form.action='produto/grava_variaveis_bd.php';
document.form.target="pop_produto";
document.form.submit();
minhapopup.focus();
}//fecha if	

}


function gravar_mensal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


document.form.action='checagem/insere_entrada_mensal.php';
document.form.target="_self";
document.form.submit();

}

function cad_entrada_mensal()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='entrada_mensalista.php';
document.form.target="_self";
document.form.submit();
}
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
// --------------  fim produto -------------------