function StatesSuggestionProvider() {
	this.controller = null;
	this.typeAhead = true;
}

var _p = StatesSuggestionProvider.prototype;

_p.requestSuggestions = function (oAutoSuggestController, bTypeAhead) {
	this.controller = oAutoSuggestController;
	this.typeAhead = bTypeAhead;
	
	xajax_suggestStates(this.controller.textbox.value,this.typeAhead);
}


_p.onLoad = function (resposta, typeAhead) {
	this.controller.autoSuggest(resposta, typeAhead);
}
