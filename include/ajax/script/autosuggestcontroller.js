/*
 * AutoSuggestController based on Nicholas C.Zackas code
 */
function AutoSuggestController(oTextBox, oProvider) {
    this.provider = oProvider;
    this.textbox = oTextBox;
    this.layer = null;

    this.textboxInfo = this.getElementInfo(this.textbox);

    this.init();
}


var _p = AutoSuggestController.prototype;


_p.init = function () {
    var oThis = this;

    this.textbox.onkeyup = function (e) { oThis.handleKeyUp(e); }
    this.textbox.onkeydown = function (e) { oThis.handleKeyDown(e); }
    this.textbox.onblur = function (e) { oThis.hideSuggestions(); }

    this.createDropDown();
}


_p.selectRange = function (iStart, iLength) {
    if (this.textbox.createTextRange) {
        var oRange = this.textbox.createTextRange();
        oRange.moveStart("character", iStart);
        oRange.moveEnd("character", iLength - this.textbox.value.length);
        oRange.select();
    } else if (this.textbox.setSelectionRange)
        this.textbox.setSelectionRange(iStart, iLength);

    this.textbox.focus();
}


_p.typeAhead = function (sSuggestion) {
    if (this.textbox.createTextRange || this.textbox.setSelectionRange) {
        var iLength = this.textbox.value.length;
        this.textbox.value = sSuggestion;
        this.selectRange(iLength, sSuggestion.length);
    }
}


_p.autoSuggest = function (aSuggestions, bTypeAhead) {
    if (aSuggestions.length > 0) {
        if (bTypeAhead)
            this.typeAhead(aSuggestions[0]);
        
        this.showSuggestions(aSuggestions);
    } else this.hideSuggestions();
}


_p.hideSuggestions = function () { this.layer.style.visibility = "hidden"; }


_p.highlightSuggestion = function (oSuggestionNode) {
    for (var i = 0; i < this.layer.childNodes.length; i++) {
        var oNode = this.layer.childNodes[i];

        if (oNode == oSuggestionNode)
            oNode.className = "current";
        else if (oNode.className == "current")
            oNode.className = "";
    }
}


_p.createDropDown = function () {
    this.layer = document.createElement("DIV");
    this.layer.className = "suggestions";
    this.layer.style.visibility = "hidden";
    this.layer.style.width = this.textboxInfo.width - ((/msie/i.test(navigator.userAgent)) ? 2 : 0) + "px";

    document.body.appendChild(this.layer);
    
    var oThis = this;
    
    this.layer.onmousedown = this.layer.onmouseup =
    this.layer.onmouseover = function (e) {
        var oEvent = e || window.event;
        var oTarget = oEvent.target || oEvent.srcElement;
        
        if (oEvent.type == "mousedown") {
            oThis.textbox.value = oTarget.firstChild.nodeValue;
            oThis.hideSuggestions();
        } else if (oEvent.type == "mouseover")
            oThis.highlightSuggestion(oTarget);
        else
            oThis.textbox.focus();
    }
}


_p.showSuggestions = function (aSuggestions) {
    var oDiv = null;
    this.layer.innerHTML = "";
    
    for (var i = 0; i < aSuggestions.length; i++) {
        oDiv = document.createElement("DIV");
        oDiv.appendChild(document.createTextNode(aSuggestions[i]));
        this.layer.appendChild(oDiv);
    }
    
    this.layer.style.left = (this.textboxInfo.left - 2) + "px";
    this.layer.style.top = (this.textboxInfo.top + this.textboxInfo.height - 1) + "px";
    this.layer.style.visibility = "visible";
}


_p.nextSuggestion = function () {
    var cSuggestionNodes = this.layer.childNodes;
    var currentNode = this.getCurrentFocused();

    if (cSuggestionNodes.length > 0 && currentNode < cSuggestionNodes.length - 1) {
        var oNode = cSuggestionNodes[currentNode + 1];
        this.highlightSuggestion(oNode);
        this.textbox.value = oNode.firstChild.nodeValue;
    }
}


_p.previousSuggestion = function () {
    var cSuggestionNodes = this.layer.childNodes;
    var currentNode = this.getCurrentFocused();

    if (cSuggestionNodes.length > 0 && currentNode > 0) {
        var oNode = cSuggestionNodes[currentNode - 1];
        this.highlightSuggestion(oNode);
        this.textbox.value = oNode.firstChild.nodeValue;
    }
}


_p.getCurrentFocused = function () {
    var cSuggestionNodes = this.layer.childNodes;

    if (cSuggestionNodes.length > 0) {
        for (var i = 0; i < cSuggestionNodes.length; i++) {
            if (cSuggestionNodes[i].className == "current")
                return i;
        }
    }
    
    return -1;
}


_p.getElementInfo = function (el) {
    if (el.getBoundingClientRect) {
        var o = el.getBoundingClientRect();

        this.top = o.top;
        this.left = o.left;
        this.width = (o.right - o.left);
        this.height = (o.bottom - o.top);
    } else if (document.getBoxObjectFor) {
        var o = document.getBoxObjectFor(el);

        this.top = o.y;
        this.left = o.x;
        this.width = o.width;
        this.height = o.height;
    }
    
    return this;
}


_p.handleKeyUp = function (e) {
    var oEvent = e || window.event;
    var code = oEvent.keyCode;

    if (!(code < 32 || (code >= 33 && code <= 46) || (code >= 112 && code <= 123)))
        this.provider.requestSuggestions(this, ((code == 8 || code == 46) ? false : true));
}


_p.handleKeyDown = function (e) {
    var oEvent = e || window.event;

    switch (oEvent.keyCode) {
        case 38: // UP Arrow
            this.previousSuggestion();
            break;
        
        case 40: // DOWN Arrow
            this.nextSuggestion();
            break;
        
        case 13: // ENTER
            this.hideSuggestions();
            break;
    }
}
