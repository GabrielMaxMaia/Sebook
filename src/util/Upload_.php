<?php

namespace Util;


class Upload
{

    //atributos 

    private $listaPermitidos;
    private $caminhoArmazenamento;
    private $arqUpload;


    public function __construct($lista, $caminho)
    {
        $this->listaPermitidos = $lista;
        $this->caminhoArmazenamento = $caminho;
    }

    public function recuperarDados($inputFiles)
    {
        // recurerando os dados do upload e validando o valor 
        // do atributo error
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->arqUpload = isset($_FILES[$inputFiles]) ? $_FILES[$inputFiles] : null;
            if ($this->arqUpload != null) {
                if ($this->arqUpload["error"] > 0) {
                    return $this->arqUpload["error"];
                } else {
                    return true;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function realizarUpload($inputFiles)
    {
        //executando a função para recuperar os dados do upload
        $result = $this->recuperarDados($inputFiles);

        if ($result == true) {
            //recuperar o caminho absoluto do projeto
            $caminho = getcwd();
            //var_dump($caminho);
            //adicionando o caminho para salvar o arquivo

            //Tive que mudar o caminho pois estou usando
            //Xampp, depois colocar esse caminho comentado
            //'G:\sebook\src\view\adm\cadastro\uploadAdm'
            if ($caminho == 'D:\xampp\htdocs\sebook\src\view\adm\cadastro\uploadAdm') {
                $caminho = str_replace('\src\view\adm\cadastro\uploadAdm', '', $caminho);
            } else {
                $caminho = str_replace('\src\view\user\pages', '', $caminho);
            }

            $caminho .= $this->caminhoArmazenamento; 
            //no formato "/pasta/"
            
            //adicionar o nome do arquivo;
            $caminho .= $this->arqUpload["name"];

            //verificando se já existe um arquivo com este nome
            if (!file_exists($caminho)) {
                if (in_array($this->arqUpload['type'], $this->listaPermitidos)) {
                    //Efetuando o upload - mover o arquivo da pasta temporária
                    // para a pasta de destino
                    if (move_uploaded_file($this->arqUpload["tmp_name"], $caminho)) {
                        return true;
                    } else {
                        return 10;
                    }
                } else {
                    return 11;
                }
            } else {
                if (file_exists($caminho)) {
                    unlink($caminho);
                }
                return 9;
            }
        } else {
            return $result;
        }
    }

    public function getArqUpload()
    {
        return $this->arqUpload;
    }

    public function setArqUpload($arqUpload)
    {
        $this->arqUpload = $arqUpload;
    }
}

/*


UPLOAD_ERR_OK
Value: 0; There is no error, the file uploaded with success.

UPLOAD_ERR_INI_SIZE
Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.

UPLOAD_ERR_FORM_SIZE
Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.

UPLOAD_ERR_PARTIAL
Value: 3; The uploaded file was only partially uploaded.

UPLOAD_ERR_NO_FILE
Value: 4; No file was uploaded.

UPLOAD_ERR_NO_TMP_DIR
Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.

UPLOAD_ERR_CANT_WRITE
Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.

UPLOAD_ERR_EXTENSION
Value: 8; A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0.

Personalizado

valor 9:  Arquivo já existe

valor 10:  Falha ao mover o arquivo para o destino final

valor 11:  tipo de arquivo não permitido

valor null: não chegou a realizar o upload

*/
