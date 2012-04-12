//==================================================================================================//
//                                                                                                  //
//     Criado por.......................: Flavio Theruo Kaminisse                                   //
//     Site.............................: http://www.japs.etc.br                                    //
//     Contato..........................: flavio@japs.etc.br                                        //
//     Data Criacao.....................: 17/02/2006                                                //
//                                                                                                  //
//==================================================================================================//

function StringBuffer() {
	this.length = 0;
	
	this._cache = null;
	this._data = [];
	this._joiner = (arguments.length == 1) ? arguments[0] : "";
	
	if (arguments.length > 0) {
		for (var i = 0; i < arguments.length; i++) {
			this.append(arguments[i]);
		}
	}
}


var _p = StringBuffer.prototype;


_p.append = function (s) {
	this.length += String(s).length;
	this._data[this._data.length] = String(s);
}


_p.clear = function () {
	this._cache = null;
	
	for (var i = 0; i < this._data.length; i++) {
		this._data[i] = null;
	}
	
	this._data = [];
}


_p.toString = function () {
	if (this._cache != null) {
		return this._cache;
	}
	
	return (this._cache = this._data.join(this._joiner));
}


function $(s) {
	return document.getElementById(s);
}

function LimpaResposta() {
	$('resposta').innerHTML = "";
}

function InserirRegistro() {
	LimpaResposta();
	$('carregando').className = "aparece";
	xajax_ExibeConteudoInserir();
}

function PesquisaRegistro() {
	LimpaResposta();
	$('carregando').className = "aparece";
	xajax_ExibeConteudoBuscar();
}

function DropDown() {
	LimpaResposta();
	$('carregando').className = "aparece";
	xajax_ExibeConteudoDropDown();
}

function SugestaoTexto() {
	url = 'autosuggest.php';
	location=(url);
}

function Votacao(id) {
	LimpaResposta();
	$('carregando').className = "aparece";
	xajax_ExibeConteudoVotacao(id);
}

function Contato() {
	LimpaResposta();
	$('carregando').className = "aparece";
	xajax_ExibeConteudoContato();
}

function limpaDropDown() {
	var qtd_dados = $('cidade_dd').options.length;
	var i;
	for ( i = 0; i < qtd_dados; i++ ) {
		$('cidade_dd').remove(i);
	}
	$('cidade_dd').options[0] = new Option("Primeiro selecione um Estado!","");
}

function GravaDados() {
	if ( $('estado').value == "" ) {
		alert("Favor, informe o estado!");
		$('estado').focus();
		return false;
	}
	if ( $('cidade').value == "" ) {
		alert("Favor, informe a cidade!");
		$('cidade').focus();
		return false;
	}
	if ( $('descricao').value == "" ) {
		alert("Favor, informe a descrição!");
		$('descricao').focus();
		return false;
	}
	$('enviando').className = "aparece";
	xajax_GravaDados($('estado').value,$('cidade').value,$('descricao').value);
	return true;
}

function PesquisaDados() {
	if ( $('palavra').value == "" ) {
		alert("Favor, informe a palavra de busca");
		$('palavra').focus();
		return false;
	}
	$('carregando').className = "aparece";
	xajax_BuscaDados($('palavra').value);
	return true;
}

function ExibeDropDown() {
	$('carregando').className = "aparece";
	limpaDropDown();
	xajax_BuscaCidades($('estado_dd').value);
	return true;
}

function ExibeSuggestions(dados,btype) {
	statesSuggestions.onLoad(dados,btype);
}

function sndReq(voto,votacao,ip) {
	$('enviando').className = "aparece";
	xajax_Votacao(voto,votacao,ip);
//	setTimeout("xajax_Votacao('"+voto+"','"+votacao+"','"+ip+"')",3000);
}

function ValidaEnvio() {
	if ( $('nome').value == "" ) {
		alert("O nome é campo obrigatório");
		$('nome').focus();
		return false;
	}
	if ( $('email').value == "" ) {
		alert("O e-mail é campo obrigatório");
		$('email').focus();
		return false;
	}
	else {
		if ( $('email').value != "" ) {
			//Expressao Regular utilizada para validar o endereco de email
			var ExpReg = /^[a-zA-Z0-9_\.-]{2,}@([A-Za-z0-9_-]{2,}\.)+[A-Za-z]{2,4}$/;
			if ( !ExpReg.test($('email').value) ) {
				alert("E-MAIL inválido!");
				$('email').focus();
				return false;
			}
		}
	}
	if ( $('texto').value == "" ) {
		alert("O texto é campo obrigatório");
		$('texto').focus();
		return false;
	}
	xajax_enviaEmail($('nome').value,$('email').value,$('texto').value);
	return true;
}