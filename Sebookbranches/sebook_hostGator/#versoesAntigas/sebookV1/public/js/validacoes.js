
        function mascaraEmail(elemento){
        
        elemento.setAttribute('class','');
        //Padrão para encontrar caracteres não numéricos (NaN)
         var exprRegNaN =/\D/g;
        //retirar qualquer caracter não numérico - troca por vazio ''
         elemento.value = elemento.value.replace(exprRegNaN,''); 
         //verificar a qtde de caracteres
         var qtde = elemento.value.length;
         console.log(qtde)
         if(qtde >= 40){
         var exprRegFixo = /(\w{30})(\w{4})(\w{3})(\w{3})/;
        elemento.value = elemento.value.replace(exprRegFixo, '$1@$2.$3.$4');
         }else if(qtde <= 37){
        var exprRegFixo = /(\w{30})(\w{4})(\w{3})/;
        elemento.value = elemento.value.replace(exprRegFixo, '$1@$2.$3');
         }else{     
             elemento.setAttribute('class','error');
         }              

}


