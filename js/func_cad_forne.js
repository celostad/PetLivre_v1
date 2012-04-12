// MASCARA CNPJ

function FormataCNPJ(Campo, teclapres){

   if(window.event){
    var tecla = teclapres.keyCode;
   }else  tecla = teclapres.which;

   var vr = new String(Campo.value);
   vr = vr.replace(".", "");
   vr = vr.replace(".", "");
   vr = vr.replace("/", "");
   vr = vr.replace("-", "");

   tam = vr.length + 1;

   
   if (tecla != 9 && tecla != 8){
      if (tam > 2 && tam < 6)
         Campo.value = vr.substr(0, 2) + '.' + vr.substr(2, tam);
      if (tam >= 6 && tam < 9)
         Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,tam-5);
      if (tam >= 9 && tam < 13)
         Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,tam-8);
      if (tam >= 13 && tam < 15)
         Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,4)+ '-' + vr.substr(12,tam-12);
      }
}

//--  TÉRMINO


// MASCARAS


function Mascara(tipo, campo, teclaPress) {
	if (window.event)
	{
		var tecla = teclaPress.keyCode;
	} else {
		tecla = teclaPress.which;
	}
 
	var s = new String(campo.value);
	// Remove todos os caracteres à seguir: ( ) / - . e espaço, para tratar a string denovo.
	s = s.replace(/(\.|\(|\)|\/|\-| )+/g,'');
 
	tam = s.length + 1;
 
	if ( tecla != 9 && tecla != 8 ) {
		switch (tipo)
		{
		case 'CPF' :
			if (tam > 3 && tam < 7)
				campo.value = s.substr(0,3) + '.' + s.substr(3, tam);
			if (tam >= 7 && tam < 10)
				campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,tam-6);
			if (tam >= 10 && tam < 12)
				campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,3) + '-' + s.substr(9,tam-9);
		break;
 
		case 'CNPJ' :
 
			if (tam > 2 && tam < 6)
				campo.value = s.substr(0,2) + '.' + s.substr(2, tam);
			if (tam >= 6 && tam < 9)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,tam-5);
			if (tam >= 9 && tam < 13)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,tam-8);
			if (tam >= 13 && tam < 15)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,4)+ '-' + s.substr(12,tam-12);
		break;
 
		case 'TEL' :
			if (tam > 2 && tam < 4)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,tam);
			if (tam >= 7 && tam < 11)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,4) + '-' + s.substr(6,tam-6);
		break;
 
		case 'DATA' :
			if (tam > 2 && tam < 4)
				campo.value = s.substr(0,2) + '/' + s.substr(2, tam);
			if (tam > 4 && tam < 11)
				campo.value = s.substr(0,2) + '/' + s.substr(2,2) + '/' + s.substr(4,tam-4);
		break;
		}
	}
}



// ---  TÉRMINO





function gravar_forne()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

document.form.action='checagem/insere_cad_forne.php';
document.form.target="_self";
document.form.submit();

}




function checar(pagina,texto) { if (confirm("Apagar este Fornecedor?")==true) { window.location=pagina; } }


function sair_form()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='index_cad_forne.php';
document.form.target="_self";
document.form.submit();
}
}

function sair_form_retorna_vindo_cad_forne()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../forne/index_cad_forne.php';
document.form.target="_self";
document.form.submit();
}
}

function sair_form_retorna_vindo_busca_forne()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

if(ok)
{
document.form.action='../forne/index_resultado_busca_forne.php';
document.form.target="_self";
document.form.submit();
}
}

// ---------------------------------    B U S C A S      -------------------------------------

// TELA CAD CLIE TODOS


// ABRE A POPUP
function popup_consulta_cad_forne()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""

//window.opener.location.submit();

var minhapopup = window.open("busca_cad_forne.php","pop_consulta","width=420,height=90,scrollbars=auto,status=0");
minhapopup.focus();
}


// GRAVA AS VARIÁVEIS EM SESSIONS E FECHA POPUP
function busca_forne()
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
document.frmAjax.action='checagem/fecha_popup_busca_forne.php';
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
// ----------------------------------  FOTO --------------------------------

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



// ------------------------------------------------------------------------------------

// --  BAIRRO

function incluir_bairro()
{
var digits="0123456789"
var temp 
var ok = true;
var f = ""


if (document.form.txt_bairro.value =="-- Incluir  /  Alterar --"){

var minhapopup = window.open('bairro/grava_variaveis_bd.php','pop_bairro','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
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


if (document.form.txt_cidade.value =="-- Incluir  /  Alterar --"){

var minhapopup = window.open('cidade/grava_variaveis_bd.php','pop_bairro','width=420,height=220,scrollbars=yes,status=0,top=0,left=100');
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

