function go2URL(address,target)
{
	window.open(address,target);
}
function newWindow(address)
{
	var maxW = screen.width;
	var maxH = screen.height;
	var w = 600;
	var h = 480;
	var _top = Math.floor((maxH - h) / 2);
	var _left = Math.floor((maxW - w) / 2);
	
	var win = window.open(address,'doiW',"toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,copyhistory=yes,width="+w+",height="+h);
	win.moveTo(_left,_top);
	win.focus();
}



//*********************** função enter por tab


function addEvent(obj, evType, fn) {
  if (typeof obj == "string") {
    if (null == (obj = document.getElementById(obj))) {
      throw new Error("Cannot add event listener: HTML Element not found.");
    }
  }
  if (obj.attachEvent) {
    return obj.attachEvent(("on" + evType), fn);
  } else if (obj.addEventListener) {
    return obj.addEventListener(evType, fn, true);
  } else {
    throw new Error("Seu browser não suporta: event listeners.");
  }
}



function iniciarMudancaDeEnterPorTab() {
  var i, j, form, element;
  for (i = 0; i < document.forms.length; i++) {
    form = document.forms[i];
    for (j = 0; j < form.elements.length; j++) {
      element = form.elements[j];
      if ((element.tagName.toLowerCase() == "input")
        && (element.getAttribute("type").toLowerCase() == "submit")) {
        form.onsubmit = function() {
          return false;
        };
        element.onclick = function() {
          if (this.form) {
            this.form.submit();
          }
        };
      } else {
        element.onkeypress = mudarEnterPorTab;
      }
    }
  }
}



function mudarEnterPorTab(e) {
  if (typeof e == "undefined") {
    var e = window.event;
  }
  var keyCode = e.keyCode ? e.keyCode : (e.wich ? e.wich : false);
  if (keyCode == 13) {
    if (this.form) {
      var form = this.form, i, element;
      // se o tabindex do campo for maior que zero, irá obrigatoriamente
      // procurar o campo com o próximo tabindex
      if (this.tabIndex > 0) {
        var indexToFind = (this.tabIndex + 1);
        for (i = 0; i < form.elements.length; i++) {
          element = form.elements[i];
          if (element.tabIndex == indexToFind) {
            element.focus();
            break;
          }
        }
      }
      // se o tabindex do campo for igual a zero, irá procurar o campo com tabindex
      // igual a 1. Caso não encontre, colocará o foco no próximo campo do formulário.
      else {
        for (i = 0; i < form.elements.length; i++) {
          element = form.elements[i];
          if (element.tabIndex == 1) {
            element.focus();
            return false;
          }
        }
        // se não encontrou pelo tabIndex, procura o próximo elemento da lista
        for (i = 0; i < form.elements.length; i++) {
          if (form.elements[i] == this) {
            if (++i < form.elements.length) {
              form.elements[i].focus();
            }
            break;
          }
        }
      }
    }
    return false;
  }
}


// quando terminar o carregamento da página, executa a "iniciarMudancaDeEnterPorTab"
addEvent(window, "load", iniciarMudancaDeEnterPorTab);

<!--
function formata_cel(cel) {
    var meucel = '';
    meucel = meucel + cel;
              if (meucel.length == 4){
                  meucel = meucel + '-';
                  document.forms[0].cel.value = meucel;
              }
              if (meucel.length == 9){
              }
}

function somente_numeros(cel) {
    var digitos="0123456789-"
    var campo_temp
    for (var i = 0;i<cel.value.length;i++){
        campo_temp = cel.value.substring(i,i+1)
        if (digitos.indexOf(campo_temp) == -1){
            cel.value = cel.value.substring(0,i);
            break;
            }
        }
}

function formata_tel(telefone) {
    var meutel = '';
    meutel = meutel + telefone;
              if (meutel.length == 4){
                  meutel = meutel + '-';
                  document.forms[0].telefone.value = meutel;
              }
              if (meutel.length == 9){
              }
}

function somente_numeros(telefone) {
    var digitos="0123456789-"
    var campo_temp
    for (var i = 0;i<telefone.value.length;i++){
        campo_temp = telefone.value.substring(i,i+1)
        if (digitos.indexOf(campo_temp) == -1){
            telefone.value = telefone.value.substring(0,i);
            break;
            }
        }
}

function formata_cep(cep) {
    var meucep = '';
    meucep = meucep + cep;
              if (meucep.length == 5){
                  meucep = meucep + '-';
                  document.forms[0].cep.value = meucep;
              }
              if (meucep.length == 9){
              }
}

function somente_numeros(cep) {
    var digitos="0123456789-"
    var campo_temp
    for (var i = 0;i<cep.value.length;i++){
        campo_temp = cep.value.substring(i,i+1)
        if (digitos.indexOf(campo_temp) == -1){
            cep.value = cep.value.substring(0,i);
            break;
            }
        }
}

function formata_cpf(cpf) {
    var meucpf = '';
    meucpf = meucpf + cpf;
              if (meucpf.length == 3){
                  meucpf = meucpf + '.';
                  document.forms[0].txt_cpf.value = meucpf;
              }
              if (meucpf.length == 7){
				  meucpf = meucpf + '.';
                  document.forms[0].txt_cpf.value = meucpf;

              }
              if (meucpf.length == 11){
				  meucpf = meucpf + '-';
                  document.forms[0].txt_cpf.value = meucpf;

              }

}

function somente_numeros(cpf) {
    var digitos="0123456789-."
    var campo_temp
    for (var i = 0;i<cpf.value.length;i++){
        campo_temp = cpf.value.substring(i,i+1)
        if (digitos.indexOf(campo_temp) == -1){
            cpf.value = cpf.value.substring(0,i);
            break;
            }
        }
}


function validaData(str) { 

	dia = (str.value.substring(0,2)); 
    mes = (str.value.substring(3,5)); 
	ano = (str.value.substring(6,10)); 

	cons = true; 
	
	// verifica se foram digitados números
	if (isNaN(dia) || isNaN(mes) || isNaN(ano)){
		alert("         Atenção!\n\nPreencha a data de nascimento somente com números.\n\n"); 
		str.value = "";
		str.focus(); 
		return false;
	}
		
    // verifica o dia valido para cada mes 
    if ((dia < 01)||(dia < 01 || dia > 30) && 
		(mes == 4 || mes == 6 || 
		 mes == 9 || mes == 11 ) || 
		 dia > 31) { 
    	cons = false; 
	} 

	// verifica se o mes e valido 
	if (mes < 01 || mes > 12 ) { 
		cons = false; 
	} 

	// verifica se e ano bissexto 
	if (mes == 2 && ( dia < 01 || dia > 29 || 
	   ( dia > 28 && 
	   (parseInt(ano / 4) != ano / 4)))) { 
		cons = false; 
	} 
    
	if (cons == false) { 
		alert("             Atenção!\n\nA data de nascimento inserida não é válida: " + str.value); 
		str.value = "";
		str.focus(); 
		return false;
	} 
}

// colocar no evento onKeyUp passando o objeto como parametro
function formata(val)
{
   	var pass = val.value;
	var expr = /[0123456789]/;
		
	for(i=0; i<pass.length; i++){
		// charAt -> retorna o caractere posicionado no índice especificado
		var lchar = val.value.charAt(i);
		var nchar = val.value.charAt(i+1);
	
		if(i==0){
		   // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
		   // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
		   // instStr.search(expReg);
		   if ((lchar.search(expr) != 0) || (lchar>3)){
			  val.value = "";
		   }
		   
		}else if(i==1){
			   
			   if(lchar.search(expr) != 0){
				  // substring(indice1,indice2)
				  // indice1, indice2 -> será usado para delimitar a string
				  var tst1 = val.value.substring(0,(i));
				  val.value = tst1;				
 				  continue;			
			   }
			   
			   if ((nchar != '/') && (nchar != '')){
				 	var tst1 = val.value.substring(0, (i)+1);
				
					if(nchar.search(expr) != 0) 
						var tst2 = val.value.substring(i+2, pass.length);
					else
						var tst2 = val.value.substring(i+1, pass.length);
	
					val.value = tst1 + '/' + tst2;
			   }

		 }else if(i==4){
			
				if(lchar.search(expr) != 0){
					var tst1 = val.value.substring(0, (i));
					val.value = tst1;
					continue;			
				}
		
				if	((nchar != '/') && (nchar != '')){
					var tst1 = val.value.substring(0, (i)+1);

					if(nchar.search(expr) != 0) 
						var tst2 = val.value.substring(i+2, pass.length);
					else
						var tst2 = val.value.substring(i+1, pass.length);
	
					val.value = tst1 + '/' + tst2;
				}
   		  }
		
		  if(i>=6){
			  if(lchar.search(expr) != 0) {
					var tst1 = val.value.substring(0, (i));
					val.value = tst1;			
			  }
		  }
	 }
	
     if(pass.length>10)
		val.value = val.value.substring(0, 10);
	 	return true;
}
		  
		 