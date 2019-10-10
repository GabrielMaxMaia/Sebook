// function carregaCampo(valor) {
//     var campo = document.getElementById('txtImg');
//     campo.value = valor;
// }

function resultadoUpload(arquivo, codigoErro) {
    var msg = "";

    if (arquivo != '-1') {
        var img = document.getElementById('imgAvatar');
        var campo = document.getElementById('txtImg');
        img.setAttribute("src", arquivo);
        campo.value = arquivo;
        alert("Arquivo carregado com sucesso!");
      
    } else {
        switch (codigoErro) {
            case 1:
                msg = "Tamanho do arquivo maior que o permitido! ";
                break;
            case 2:
                msg = "Tamanho do arquivo maior que o permitido! ";
                break;
            case 3:
                msg = "Falha ao carregar... carregamento incompleto! ";
                break;
            case 4:
                msg = "Falha ao carregar! ";
                break;
            case 6:
                msg = "Falha ao carregar! Não foi possível localizar a pasta temporária! ";
                break;
            case 7:
                msg = "Falha ao carregar! Não foi possível gravar o arquivo! ";
                break;
            case 8:
                msg = "Falha ao carregar! Uma extensão impediu o upload! ";
                break;
            case 9:
                msg = "Arquivo já existe na pasta";
                break;
            case 10:
                msg = "Falha ao carregar! Tipo de arquivo não permitido! ";
                break;
            case 11:
                msg = "Falha ao carregar! Não houve upload! ";
                break;
        }
        if(codigoErro == 9){
            confirm(msg);
        }else{
            alert(msg);
        }
        
    }


}