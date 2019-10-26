function gID(id) {
  return document.getElementById(id);
}


function mascaraEmail(inputText) {
  inputText.setAttribute('class', '');
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (inputText.value.match(mailformat)) {
    return true;
  }
  else {
    inputText.value=""
    inputText.setAttribute('class', 'error');
    return false;
  }
}


function mascaraDataNasc(inputText) {
  inputText.setAttribute('class', '');
  var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
  // Match the date format through regular expression
  if (inputText.value.match(dateformat)) {
    //Test which seperator is used '/' or '-'
    var opera1 = inputText.value.split('/');
    var opera2 = inputText.value.split('-');
    lopera1 = opera1.length;
    lopera2 = opera2.length;
    // Extract the string into month, date and year
    if (lopera1 > 1) {
      var pdate = inputText.value.split('/');
    }
    else if (lopera2 > 1) {
      var pdate = inputText.value.split('-');
    }
    var dd = parseInt(pdate[0]);
    var mm = parseInt(pdate[1]);
    var yy = parseInt(pdate[2]);
    // Create list of days of a month [assume there is no leap year by default]
    var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (mm == 1 || mm > 2) {
      if (dd > ListofDays[mm - 1]) {
        inputText.value=""
        inputText.setAttribute('class', 'error');
        return false;
      }
    }
    if (mm == 2) {
      var lyear = false;
      if ((!(yy % 4) && yy % 100) || !(yy % 400)) {
        lyear = true;
      }
      if ((lyear == false) && (dd >= 29)) {
        inputText.value=""
        inputText.setAttribute('class', 'error');
        return false;
      }
      if ((lyear == true) && (dd > 29)) {
        inputText.value=""
        inputText.setAttribute('class', 'error');
        return false;
      }
    }
  }
  else {
    inputText.value=""
    inputText.setAttribute('class', 'error');
    return false;
  }
}




function valida() {

  if (valida_cpf(document.getElementById('cpfCliente').value))
    cpfCliente.setAttribute('class', '');
  else

    cpfCliente.setAttribute('class', 'error');
}

function valida_cpf(cpf) {

  cpf = cpf.replace(/[^\d]+/g, '');

  if (cpf == '') return false;

  var numeros, digitos, soma, i, resultado, digitos_iguais;
  digitos_iguais = 1;
  if (cpf.length < 11 || cpf.length > 11)
    return false;
  for (i = 0; i < cpf.length - 1; i++)
    if (cpf.charAt(i) != cpf.charAt(i + 1)) {
      digitos_iguais = 0;
      break;
    }
  if (!digitos_iguais) {
    numeros = cpf.substring(0, 9);
    digitos = cpf.substring(9);
    soma = 0;
    for (i = 10; i > 1; i--)
      soma += numeros.charAt(10 - i) * i;
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
      return false;
    numeros = cpf.substring(0, 10);
    soma = 0;
    for (i = 11; i > 1; i--)
      soma += numeros.charAt(11 - i) * i;
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
      return false;
    return true;
  }
  else
    return false;
}

// function limpa_formulário_cep() {
//         //Limpa valores do formulário de cep.
//         // document.getElementById('rua').value=("");
//         // document.getElementById('bairro').value=("");
//         // document.getElementById('cidade').value=("");
//         // document.getElementById('uf').value=("");
//         // document.getElementById('ibge').value=("");
// }

function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    gID(cepCliente)
    cepCliente.setAttribute('class', '');
    //Atualiza os campos com os valores.
    // document.getElementById('rua').value=(conteudo.logradouro);
    // document.getElementById('bairro').value=(conteudo.bairro);
    // document.getElementById('cidade').value=(conteudo.localidade);
    // document.getElementById('uf').value=(conteudo.uf);
    // document.getElementById('ibge').value=(conteudo.ibge);
  } //end if.
  else {
    //CEP não Encontrado.
    // limpa_formulário_cep();
    gID(cepCliente)
    cepCliente.value=""
    cepCliente.setAttribute('class', 'error');
  }
}

function pesquisacep(valor) {

  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');

  //Verifica se campo cep possui valor informado.
  if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {

      //Preenche os campos com "..." enquanto consulta webservice.
      // document.getElementById('rua').value="...";
      // document.getElementById('bairro').value="...";
      // document.getElementById('cidade').value="...";
      // document.getElementById('uf').value="...";
      // document.getElementById('ibge').value="...";

      //Cria um elemento javascript.
      var script = document.createElement('script');

      //Sincroniza com o callback.
      script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);

    } //end if.
    else {
      //cep é inválido.
      // limpa_formulário_cep();
      gID(cepCliente)
      cepCliente.value=""
      cepCliente.setAttribute('class', 'error');
    }
  } //end if.
  // else {
  //     //cep sem valor, limpa formulário.
  //     limpa_formulário_cep();
  // }
};

function valida_cnpj() {

  if (validarCNPJ(document.getElementById('cnpjSebo').value))
    cnpjSebo.setAttribute('class', '');
  else
    cnpjSebo.setAttribute('class', 'error');
}

function validarCNPJ(cnpj) {

  cnpj = cnpj.replace(/[^\d]+/g, '');
  
  if (cnpj == '') return false;

  //if (cnpj.length < 14 || cnpj.length > 14)
    //return false;

  // Elimina CNPJs invalidos conhecidos
  if (cnpj == "00000000000000" ||
    cnpj == "11111111111111" ||
    cnpj == "22222222222222" ||
    cnpj == "33333333333333" ||
    cnpj == "44444444444444" ||
    cnpj == "55555555555555" ||
    cnpj == "66666666666666" ||
    cnpj == "77777777777777" ||
    cnpj == "88888888888888" ||
    cnpj == "99999999999999")
    return false;

  // Valida DVs
  tamanho = cnpj.length - 2
  numeros = cnpj.substring(0, tamanho);
  digitos = cnpj.substring(tamanho);
  soma = 0;
  pos = tamanho - 7;
  for (i = tamanho; i >= 1; i--) {
    soma += numeros.charAt(tamanho - i) * pos--;
    if (pos < 2)
      pos = 9;
  }
  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
  if (resultado != digitos.charAt(0))
    return false;

  tamanho = tamanho + 1;
  numeros = cnpj.substring(0, tamanho);
  soma = 0;
  pos = tamanho - 7;
  for (i = tamanho; i >= 1; i--) {
    soma += numeros.charAt(tamanho - i) * pos--;
    if (pos < 2)
      pos = 9;
  }
  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
  if (resultado != digitos.charAt(1))
    return false;
    
    document.getElementById("cnpjSebo").value=cnpj;
    return true;

}


// function limpa_formulário_cep() {
//         //Limpa valores do formulário de cep.
//         // document.getElementById('rua').value=("");
//         // document.getElementById('bairro').value=("");
//         // document.getElementById('cidade').value=("");
//         // document.getElementById('uf').value=("");
//         // document.getElementById('ibge').value=("");
// }

function meu_callbacksebo(conteudo) {
  if (!("erro" in conteudo)) {
    gID(cepEndSebo)
    cepEndSebo.setAttribute('class', '');
    //Atualiza os campos com os valores.
    // document.getElementById('rua').value=(conteudo.logradouro);
    // document.getElementById('bairro').value=(conteudo.bairro);
    // document.getElementById('cidade').value=(conteudo.localidade);
    // document.getElementById('uf').value=(conteudo.uf);
    // document.getElementById('ibge').value=(conteudo.ibge);
  } //end if.
  else {
    //CEP não Encontrado.
    // limpa_formulário_cep();
    gID(cepEndSebo)
    cepEndSebo.value=""
    cepEndSebo.setAttribute('class', 'error');
  }
}

function pesquisacepsebo(valor) {

  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');

  //Verifica se campo cep possui valor informado.
  if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {

      //Preenche os campos com "..." enquanto consulta webservice.
      // document.getElementById('rua').value="...";
      // document.getElementById('bairro').value="...";
      // document.getElementById('cidade').value="...";
      // document.getElementById('uf').value="...";
      // document.getElementById('ibge').value="...";

      //Cria um elemento javascript.
      var script = document.createElement('script');

      //Sincroniza com o callback.
      script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callbacksebo';

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);

    } //end if.
    else {
      //cep é inválido.
      // limpa_formulário_cep();
      gID(cepEndSebo)
      cepEndSebo.value=""
      cepEndSebo.setAttribute('class', 'error');
    }
  } //end if.
  // else {
  //     //cep sem valor, limpa formulário.
  //     limpa_formulário_cep();
  // }
};


function mascaraTel(elemento) { 

  if (elemento.value == "(00) 0000-0000" ||
  elemento.value == "(11) 1111-1111" ||
  elemento.value == "(22) 2222-2222" ||
  elemento.value == "(33) 3333-3333" ||
  elemento.value == "(44) 4444-4444" ||
  elemento.value == "(55) 5555-5555" ||
  elemento.value == "(66) 6666-6666" ||
  elemento.value == "(77) 7777-7777" ||
  elemento.value == "(88) 8888-8888" ||
  elemento.value == "(99) 9999-9999" ||
  elemento.value == "(00) 00000-0000" ||
  elemento.value == "(11) 11111-1111" ||
  elemento.value == "(22) 22222-2222" ||
  elemento.value == "(33) 33333-3333" ||
  elemento.value == "(44) 44444-4444" ||
  elemento.value == "(55) 55555-5555" ||
  elemento.value == "(66) 66666-6666" ||
  elemento.value == "(77) 77777-7777" ||
  elemento.value == "(88) 88888-8888" ||
  elemento.value == "(99) 99999-9999"){

  elemento.value=""
  elemento.setAttribute('class', 'error');

  return false;
}
  elemento.setAttribute('class', '');
  //Padrão para encontrar caracteres não numéricos (NaN)
  var exprRegNaN = /\D/g;
  //retirar qualquer caracter não numérico - troca por vazio ''
  elemento.value = elemento.value.replace(exprRegNaN, '');
  //verificar a qtde de caracteres
  var qtde = elemento.value.length;
  if (qtde == 10) {
    // 1º grupo ([\d]{2}) --> $1 2º grupo ([\d]{4}) --> $2  
    var exprRegFixo = /([\d]{2})([\d]{4})([\d]{4})/;
    elemento.value = elemento.value.replace(exprRegFixo, '($1) $2-$3');
  } else if (qtde == 11) {
    var exprRegCel = /([\d]{2})([\d]{5})([\d]{4})/;
    elemento.value = elemento.value.replace(exprRegCel, '($1) $2-$3');
  } else {
    elemento.value=""
    elemento.setAttribute('class', 'error');
  }

}


function mascaraTel2(elemento) {

  if (elemento.value == "(00) 0000-0000" ||
  elemento.value == "(11) 1111-1111" ||
  elemento.value == "(22) 2222-2222" ||
  elemento.value == "(33) 3333-3333" ||
  elemento.value == "(44) 4444-4444" ||
  elemento.value == "(55) 5555-5555" ||
  elemento.value == "(66) 6666-6666" ||
  elemento.value == "(77) 7777-7777" ||
  elemento.value == "(88) 8888-8888" ||
  elemento.value == "(99) 9999-9999" ||
  elemento.value == "(00) 00000-0000" ||
  elemento.value == "(11) 11111-1111" ||
  elemento.value == "(22) 22222-2222" ||
  elemento.value == "(33) 33333-3333" ||
  elemento.value == "(44) 44444-4444" ||
  elemento.value == "(55) 55555-5555" ||
  elemento.value == "(66) 66666-6666" ||
  elemento.value == "(77) 77777-7777" ||
  elemento.value == "(88) 88888-8888" ||
  elemento.value == "(99) 99999-9999"){

  elemento.value=""
  elemento.setAttribute('class', 'error');

  return false;
}

  elemento.setAttribute('class', '');
  //Padrão para encontrar caracteres não numéricos (NaN)
  var exprRegNaN = /\D/g;
  //retirar qualquer caracter não numérico - troca por vazio ''
  elemento.value = elemento.value.replace(exprRegNaN, '');
  //verificar a qtde de caracteres
  var qtde = elemento.value.length;
  if (qtde == 10) {
    // 1º grupo ([\d]{2}) --> $1 2º grupo ([\d]{4}) --> $2  
    var exprRegFixo = /([\d]{2})([\d]{4})([\d]{4})/;
    elemento.value = elemento.value.replace(exprRegFixo, '($1) $2-$3');
  } else if (qtde == 11) {
    var exprRegCel = /([\d]{2})([\d]{5})([\d]{4})/;
    elemento.value = elemento.value.replace(exprRegCel, '($1) $2-$3');
  } else {
    elemento.setAttribute('class', '');
  }

}


function CheckIE(ie)
{
   estado = document.getElementById('inscEstadualSebo').value;

   if (ie == '') return false;

        if (ie.length != 12)
           return false;
        var nro = new Array(12);
        for (var i=0; i<=11; i++)
	        nro[i] = parseInt(ie.charAt(i));
        soma = (nro[0] * 1) + (nro[1] * 3) + (nro[2] * 4) + (nro[3] * 5) + (nro[4] * 6) + (nro[5] * 7) + (nro[6] * 8) + (nro[7] * 10);
        dig = soma % 11;
        if (dig >= 10)
	       dig = 0;
        if (dig != nro[8])
           return false;
        soma = (nro[0] * 3) + (nro[1] * 2) + (nro[2] * 10) + (nro[3] * 9) + (nro[4] * 8) + (nro[5] * 7) + (nro[6] * 6)  + (nro[7] * 5) + (nro[8] * 4) + (nro[9] * 3) + (nro[10] * 2);
        dig = soma % 11;
        if (dig >= 10)
	       dig = 0;
        return (dig == nro[11]);
}





function valida_nome(){
if(document.getElementById("nomeUsuario").value.length == null || document.getElementById("nomeUsuario").value.length == "")
nomeUsuario.setAttribute('class', 'error');
  else
nomeUsuario.setAttribute('class', '');
}

function valida_sobrenome(){
if(document.getElementById("sobrenomeUsuario").value.length == null || document.getElementById("sobrenomeUsuario").value.length == "")
  sobrenomeUsuario.setAttribute('class', 'error');
  else
 sobrenomeUsuario.setAttribute('class', '');
}

function valida_numero(){
if(document.getElementById("numComplCliente").value.length == null || document.getElementById("numComplCliente").value.length == "")
numComplCliente.setAttribute('class', 'error');
  else
numComplCliente.setAttribute('class', '');
}

function valida_numerosebo(){
if(document.getElementById("numEndSebo").value.length == null || document.getElementById("numEndSebo").value.length == "")
numEndSebo.setAttribute('class', 'error');
  else
numEndSebo.setAttribute('class', '');
}

  


